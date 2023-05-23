<?php
session_start();

// Comprobamos si el usuario ha iniciado sesión
if (!isset($_SESSION["user_id"])) {
    die("No ha iniciado sesión.");
}
$tipo = $_SESSION["user_type"];
// Conectamos con la base de datos
require '../dbaccess.php';

// Preparamos y vinculamos los parámetros
$stmt = $conn->prepare("INSERT INTO chats (message, patient_id, psychologist_registration_number, shown) VALUES (?, ?, ?, ?)");
if($tipo = "psychologist")
{
  $stmt->bind_param("ssssi", $mensaje, $patientid, $psico, 1); 
}
else
{
  $stmt->bind_param("ssssi", $mensaje, $patientid, $psico, 0); 
}

// Obtenemos el ID del paciente de la sesión del usuario y del colegiado
$patientid = $_SESSION['patient_id'];
$psico = $_SESSION['register_number'];


// Establecemos los parámetros y ejecutamos la consulta
if (isset($_POST['message'])) {
    $mensaje = $_POST['message'];
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "<div class='pt-4 pb-2'><h5 class='card-title text-center pb-0 fs-4'>Mensaje enviado correctamente. Redirigiendo...</h5></div>";
        echo "<script>
              setTimeout(function() {
                window.location.href = './chat_app';
              }, 10);
            </script>";
    } else {
        echo "Error al enviar el mensaje: " . $conn->error;
        echo "<script>
        setTimeout(function() {
          window.location.href = './chat_app';
        }, 2000);
      </script>";
    }

}
// Cerramos la conexión
$stmt->close();
$conn->close();
?>

