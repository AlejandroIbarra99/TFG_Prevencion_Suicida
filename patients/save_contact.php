<?php
session_start();
// Conectamos con la base de datos
$servername = "localhost";
$username = "sa";
$password = "1234";
$dbname = "contigo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobamos la conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del contacto enviados desde el cliente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibimos los datos del formulario
    $nombre = $_POST['contactName'];
    $telefono = $_POST['contactPhone'];
    $imagen = $_FILES['NewImage'];
    
    // Creamos la carpeta temporal si no existe
    $temp_folder = 'temp_files/';
    if (!file_exists($temp_folder)) {
        mkdir($temp_folder, 0777, true);
    }

    // Validación de datos
    if (empty($nombre) || empty($telefono) || empty($imagen)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    if (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
        echo "El nombre solo puede contener letras y espacios.";
        exit();
    }

    if (!preg_match("/^\d{9}$/", $telefono)) {
        echo "El número de teléfono debe contener 9 dígitos.";
        exit();
    }

    // Guardar imagen en servidor
    $img_dir = 'contact_photos/';
    $img_name = uniqid() . '_' . $imagen['name'];
    $img_path = $img_dir . $img_name;
    $temp_path = $temp_folder . $imagen['name'];
    
    if (move_uploaded_file($imagen['tmp_name'], $temp_path)) {
        if (rename($temp_path, $img_path)) {
            // Preparar consulta preparada y vincular los parámetros
            $stmt = $conn->prepare("INSERT INTO contacts (contact_name, contact_phone, contact_photo, patient_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $nombre, $telefono, $img_name, $_SESSION['patient_id']);
            $stmt->execute();

// Ejecutar consulta preparada
if ($stmt->execute()) {
    // Obtener el id del contacto insertado
    $contact_id = $conn->insert_id;

    // Mover la imagen a la carpeta compartida
    $img_dir = "../temp_files/";
    $img_name = basename($imagen["name"]);
    $img_path = $img_dir . $img_name;

    if (!move_uploaded_file($imagen["tmp_name"], $img_path)) {
        echo "Error al cargar el archivo de imagen.";
        exit();
    }

    // Renombrar la imagen para evitar conflictos de nombres
    $img_ext = pathinfo($img_path, PATHINFO_EXTENSION);
    $new_img_name = $contact_id . "_" . uniqid() . "." . $img_ext;
    $new_img_path = $img_dir . $new_img_name;

    if (!rename($img_path, $new_img_path)) {
        echo "Error al renombrar la imagen.";
        exit();
    }

    // Actualizar la base de datos con el nuevo nombre de la imagen
    $stmt = $conn->prepare("UPDATE contacts SET contact_photo = ? WHERE contact_id = ?");
    $stmt->bind_param("si", $new_img_name, $contact_id);
    $stmt->execute();

    // Verificar si la actualización fue exitosa
    if ($stmt->affected_rows > 0) {
        echo "<div class='pt-4 pb-2'><h5 class='card-title text-center pb-0 fs-4'>Contacto registrado correctamente. Redirigiendo...</h5></div>";
        echo "<script>
              setTimeout(function() {
                window.location.href = './index.php';
              }, 2000);
            </script>";
    } else {
        echo "Error al actualizar el nombre de la imagen en la base de datos: " . $conn->error;
    }
} else {
    echo "Error al guardar el contacto: " . $conn->error;
}
    
}

}
// Cerrar la conexión y la consulta preparada
$stmt->close();
$conn->close();
}
?>
