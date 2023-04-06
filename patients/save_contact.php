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
    $imagen = $_FILES['NewImage']['tmp_name'];
      
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

    // Convertir la imagen a un BLOB
    $imagen_blob = file_get_contents($imagen);

    // Preparar consulta preparada y vincular los parámetros
    $stmt = $conn->prepare("INSERT INTO contacts (contact_name, contact_phone, contact_photo, patient_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $nombre, $telefono, $imagen_blob, $_SESSION['patient_id']);
    $stmt->execute();

    // Ejecutar consulta preparada
    if ($stmt->affected_rows > 0) {
        echo "<div class='pt-4 pb-2'><h5 class='card-title text-center pb-0 fs-4'>Contacto registrado correctamente. Redirigiendo...</h5></div>";
        echo "<script>
              setTimeout(function() {
                window.location.href = './safezone.php';
              }, 2000);
            </script>";
    } else {
        echo "Error al guardar el contacto: " . $conn->error;
    }
    $stmt->close();
}

// Cerrar la conexión y la consulta preparada
$conn->close();