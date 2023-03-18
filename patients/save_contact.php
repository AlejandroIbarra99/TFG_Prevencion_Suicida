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
$contactData = json_decode($_POST['contact'], true);

// Validación de datos
if (empty($contactData['name']) || empty($contactData['phone']) || empty($contactData['image'])) {
    echo "Todos los campos son obligatorios.";
    exit();
}

if (!preg_match("/^[a-zA-Z\s]+$/", $contactData['name'])) {
    echo "El nombre solo puede contener letras y espacios.";
    exit();
}

if (!preg_match("/^\d{9}$/", $contactData['phone'])) {
    echo "El número de teléfono debe contener 9 dígitos.";
    exit();
}

// Preparar y vincular
$stmt = $conn->prepare("INSERT INTO safe_zone (contact_name, contact_phone, contact_photo, patient_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $telefono, $imagen, $patientid);

// Establecer parámetros y ejecutar
$nombre = $contactData['name'];
$telefono = $contactData['phone'];
$imagen = $contactData['image'];
$patientid = $_SESSION["user_id"];
$stmt->execute();

// Verificar si la inserción fue exitosa
if ($stmt->affected_rows > 0) {
    echo "Contacto guardado exitosamente";
} else {
    echo "Error al guardar el contacto";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
