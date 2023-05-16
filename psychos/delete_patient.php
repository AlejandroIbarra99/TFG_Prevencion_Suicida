<?php
// Conexión a la base de datos
require '../dbaccess.php';


// Obtener el DNI del paciente desde la URL
$dni = $_GET['dni'];

// Actualizar el estado del paciente en la base de datos
// Asumiendo que hay un campo 'active' en la tabla 'patients' para almacenar el estado (0 = inactivo, 1 = activo)
$sql = "UPDATE patients SET Active = 1 WHERE dni = '$dni'";

if ($conn->query($sql) === TRUE) {
  // Redirigir de vuelta a la página de pacientes
  header("Location: patients.php");
  exit();
} else {
  echo "Error al dar de baja al paciente: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
