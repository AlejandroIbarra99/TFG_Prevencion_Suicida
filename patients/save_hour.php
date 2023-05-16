<?php
// Conectar a la base de datos y seleccionar la tabla de citas
require '../dbaccess.php';

// Obtener la hora y el día seleccionado desde el formulario enviado
$hora = $_POST['hour'];
$dia = $_POST['schedule_date'];

// Insertar la cita en la base de datos
$sql = "INSERT INTO schedule (patient_id, schedule_date, schedule_time) VALUES ('{$_SESSION['patient_id']}', '$dia', '$hora')";
if ($conn->query($sql) === TRUE) {
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

