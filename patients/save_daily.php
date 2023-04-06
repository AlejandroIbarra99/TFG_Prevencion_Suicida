<?php
session_start();

// Comprobamos si el usuario ha iniciado sesión
if (!isset($_SESSION["user_id"])) {
    die("No ha iniciado sesión.");
}

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

// Preparamos y vinculamos los parámetros
$stmt = $conn->prepare("INSERT INTO dailys (daily_entry, patient_id) VALUES (?, ?)");
$stmt->bind_param("ss", $entrada, $patientid);

// Obtenemos el ID del paciente de la sesión del usuario
$patientid = $_SESSION["patient_id"];

// Establecemos los parámetros y ejecutamos la consulta
if (isset($_POST['diaryEntry'])) {
    $entrada = $_POST['diaryEntry'];
    $stmt->execute();
    echo json_encode(array("message" => "Entrada guardada exitosamente"));
} else {
    echo json_encode(array("message" => "Error al guardar la entrada"));
}

// Cerramos la conexión
$stmt->close();
$conn->close();
?>

