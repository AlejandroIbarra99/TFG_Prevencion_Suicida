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
    $imagen = $_FILES['NewImage']['tmp_name'];
      
    

    // Convertir la imagen a un BLOB
    $imagen_blob = file_get_contents($imagen);

    // Preparar consulta preparada y vincular los parámetros
    $stmt = $conn->prepare("INSERT INTO photos (photos, patient_id) VALUES (?, ?)");
    $stmt->bind_param("si", $imagen_blob, $_SESSION['patient_id']);
    $stmt->execute();

    // Ejecutar consulta preparada
    if ($stmt->affected_rows > 0) {
        echo "<div class='pt-4 pb-2'><h5 class='card-title text-center pb-0 fs-4'>Foto añadida correctamente. Redirigiendo...</h5></div>";
        echo "<script>
              setTimeout(function() {
                window.location.href = './safezone.php';
              }, 1000);
            </script>";
    } else {
        echo "Error al guardar la foto: " . $conn->error;
    }
    $stmt->close();
}

// Cerrar la conexión y la consulta preparada
$conn->close();