<?php
// Conexión a la base de datos
require '../dbaccess.php';

if (isset($_SESSION['patient_id'])) {
    $id = $_SESSION['patient_id'];
}

if (isset($_SESSION['register_number'])) {
    $psico = $_SESSION['register_number'];
}
$tipo = $_SESSION["user_type"];


// Consulta a la base de datos
$sql = "SELECT * FROM chats where patient_id =" . $id . " AND psychologist_registration_number = " . $psico . " ORDER BY timestamp desc";
$resultado = $conn->query($sql);
// Mostrar los planes futuros
if ($resultado->num_rows > 0) {
echo "<li class='clearfix'>";
  while($fila = $resultado->fetch_assoc()) {
    if($tipo = "psychologist")
    {
        if($fila["shown"] = 1)
        {
            echo "<div class='message-data text-right'>";
            echo "<span class='message-data-time'>" . $fila["timestamp"] . "</span>";
            echo "</div>";
            echo " <div class='message my-message'>";
            echo $fila["message"];
            echo "</div>";
        }
        else
        {
            echo "<div class='message-data'>";
            echo "<img src='../assets/img/favicon.png' alt='Usuario Contigo'/>";
            echo "<span class='message-data-time'>" . $fila["timestamp"] . "</span>";
            echo "</div>";
            echo " <div class='message other-message float-right'>";
            echo $fila["message"];
            echo "</div>";
        }
    }
    else
    {
        if($fila["shown"] = 1)
        {
            echo "<div class='message-data text-right'>";
            echo "<img src='../assets/img/favicon.png' alt='Usuario Contigo'/>";
            echo "<span class='message-data-time'>" . $fila["timestamp"] . "</span>";
            echo "</div>";
            echo " <div class='message other-message float-right'>";
            echo $fila["message"];
            echo "</div>";
        }
        else
        {
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