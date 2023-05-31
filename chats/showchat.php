<?php
require '../dbaccess.php';
session_start();

// Verificar si la clave de array "user_type" está definida
$tipo = isset($_SESSION["user_type"]) ? $_SESSION["user_type"] : "";

// Verificar si la variable $psico está definida
$psico = isset($_SESSION['register_number']) ? $_SESSION['register_number'] : "";

if (isset($_GET["patient_id"])) {
    $id = $_GET["patient_id"];
} else {
    // Manejar el caso cuando no se proporciona el valor de patient_id
    // Por ejemplo, redirigir a una página de error o mostrar un mensaje de error.
    exit("Error: No se proporcionó el ID del paciente.");
}

    $sql = "SELECT *, DATE_FORMAT(timestamp, '%H:%i') AS time FROM chats WHERE patient_id = '$id' AND psychologist_registration_number = '$psico' ORDER BY timestamp ASC";
echo $psico . ' ' . $id;
$resultado = $conn->query($sql);
// Mostrar los mensajes
if ($resultado->num_rows > 0) {
    echo "<li class='clearfix'>";
    while ($fila = $resultado->fetch_assoc()) {
        if ($tipo == "psychologist") {
            if ($fila["shown"] == 1) {
                echo "<div class='message-data text-right'>";
                echo "<span class='message-data-time' style='font-size: 12px;'>" . $fila["time"] . "</span>";
                echo "<br>";
                echo "</div>";
                echo " <div class='message my-message float-right'>";
                echo $fila["message"];
                echo "</div>";
            } else {
                echo "<div class='message-data '>";
                echo "<img src='../assets/img/favicon.png' alt='Usuario Contigo'/>";
                echo "<span class='message-data-time' style='font-size: 12px;'>" . $fila["time"] . "</span>";
                echo "<br>";
                echo "</div>";
                echo " <div class='message other-message '>";
                echo $fila["message"];
                echo "</div>";
            }
        } else {
            if ($fila["shown"] == 1) {
                echo "<div class='message-data '>";
                echo "<img src='../assets/img/favicon.png' alt='Usuario Contigo'/>";
                echo "<span class='message-data-time' style='font-size: 12px;'>" . $fila["time"] . "</span>";
                echo "<br>";
                echo "</div>";
                echo " <div class='message other-message '>";
                echo $fila["message"];
                echo "</div>";
            } else {
                echo "<div class='message-data text-right'>";
                echo "<span class='message-data-time' style='font-size: 12px;'>" . $fila["time"] . "</span>";
                echo "<br>";
                echo "</div>";
                echo " <div class='message my-message float-right'>";
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
