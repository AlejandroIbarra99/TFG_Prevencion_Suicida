<?php
session_start();

// Comprobamos si el usuario ha iniciado sesión
if (!isset($_SESSION["user_id"])) {
    die("No ha iniciado sesión.");
}
// Comprobamos si se han recibido los datos necesarios
if (!isset($_GET["hora"]) || !isset($_GET["dia"])) {
    die("Faltan datos.");
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
$stmt = $conn->prepare("INSERT INTO schedule (schedule_date, schedule_time, patient_id, psychologist_registration_number) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $hora, $dia, $patientid, $psyco);

$hora = $_GET["hora"];
$dia = $_GET["dia"];
?>
<script>alert(<?php $dia . " " . $hora?>)</script>
<?php
// Obtenemos el ID del paciente de la sesión del usuario
$patientid = $_SESSION["patient_id"];
$psyco = $_SESSION["register_number"];

// Establecemos los parámetros y ejecutamos la consulta
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "<div class='pt-4 pb-2'><h5 class='card-title text-center pb-0 fs-4'>Cita registrada correctamente. Redirigiendo...</h5></div>";
        echo "<script>
              setTimeout(function() {
                window.location.href = './safezone';
              }, 1000);
            </script>";
    } else {
        echo "Error al guardar la cita: " . $conn->error;
        echo "<script>
        setTimeout(function() {
          window.location.href = './safezone';
        }, 2000);
      </script>";
    }
// Cerramos la conexión
$stmt->close();
$conn->close();
?>

