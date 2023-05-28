<?php
/*
// Conexión a la base de datos
require '../dbaccess.php';

session_start();

$id = isset($_GET['patient_id']) ? $_GET['patient_id'] : '';

if (isset($_SESSION['register_number'])) {
    $psico = $_SESSION['register_number'];
}
$tipo = isset($_SESSION["user_type"]) ? $_SESSION["user_type"] : '';

// Consulta a la base de datos
$sql = "SELECT * FROM chats WHERE patient_id = $id AND psychologist_registration_number = '$psico' ORDER BY timestamp DESC";
echo $sql;
$resultado = $conn->query($sql);
*/
require '../dbaccess.php';
session_start();

$tipo = $_SESSION["user_type"];
if (isset($_GET["patient_id"])) {
    $id = $_GET["patient_id"];
} else {
    // Manejar el caso cuando no se proporciona el valor de patient_id
    // Por ejemplo, redirigir a una página de error o mostrar un mensaje de error.
    exit("Error: No se proporcionó el ID del paciente.");
}

if (isset($_SESSION['register_number'])) {
    $psico = $_SESSION['register_number'];
}

if ($tipo == "psychologist") {
    $sql = "SELECT * FROM chats WHERE patient_id = '$id' AND psychologist_registration_number = '$psico' ORDER BY timestamp DESC";
} else {
    $sql = "SELECT * FROM chats WHERE patient_id = '$id' ORDER BY timestamp DESC";
}
echo $psico . ' ' . $id;
$resultado = $conn->query($sql);
// Mostrar los mensajes
if ($resultado->num_rows > 0) {
    echo "<li class='clearfix'>";
    while ($fila = $resultado->fetch_assoc()) {
        if ($tipo == "psychologist") {
            if ($fila["shown"] == 1) {
                echo "<div class='message-data text-right'>";
                echo "<span class='message-data-time'>" . $fila["timestamp"] . "</span>";
                echo "</div>";
                echo " <div class='message my-message'>";
                echo $fila["message"];
                echo "</div>";
            } else {
                echo "<div class='message-data'>";
                echo "<img src='../assets/img/favicon.png' alt='Usuario Contigo'/>";
                echo "<span class='message-data-time'>" . $fila["timestamp"] . "</span>";
                echo "</div>";
                echo " <div class='message other-message float-right'>";
                echo $fila["message"];
                echo "</div>";
            }
        } else {
            if ($fila["shown"] == 1) {
                echo "<div class='message-data text-right'>";
                echo "<img src='../assets/img/favicon.png' alt='Usuario Contigo'/>";
                echo "<span class='message-data-time'>" . $fila["timestamp"] . "</span>";
                echo "</div>";
                echo " <div class='message other-message float-right'>";
                echo $fila["message"];
                echo "</div>";
            } else {
                echo "<div class='message-data'>";
                echo "<span class='message-data-time'>" . $fila["timestamp"] . "</span>";
                echo "</div>";
                echo " <div class='message my-message'>";
                echo $fila["message"];
                echo "</div>";
            }
        }
    }
    echo "</li>";
} else {
    echo "No hay mensajes disponibles";
}

// Cierre de la conexión a la base de datos
$conn->close();
?>
