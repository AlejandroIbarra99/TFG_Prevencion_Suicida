<?php
session_start();
// Conectamos con la base de datos
require '../dbaccess.php';

$id = $_SESSION["patient_id"];
$psyco = $_SESSION["register_number"];

// Realiza la consulta SQL para obtener la información de la 'safe zone' del paciente seleccionado
$sql = "SELECT * FROM schedule WHERE patient_id = '$id' AND psychologist_registration_number = '$psyco' ORDER BY schedule_date DESC LIMIT 5";
$result = $conn->query($sql);

echo "<table class='table table-striped table-hover'> 
        <thead>
          <tr>
            <th scope='col'>Día de la cita</th>
            <th scope='col'>Hora de la cita</th>
            <th scope='col'>Profesional</th>
          </tr>
        </thead>
        <tbody>";

if ($result->num_rows > 0) {
  // Muestra la información de la 'safe zone' del paciente seleccionado en una tabla HTML
  while ($row = $result->fetch_assoc()) {
    $psyco_id = $row['psychologist_registration_number'];
    $sql2 = "SELECT * FROM psychologists WHERE registration_number = '$psyco_id'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
      $row2 = $result2->fetch_assoc();
      $psyco_name = $row2['name'];
    } else {
      $psyco_name = "Desconocido";
    }

    echo "<tr>
            <td>{$row['schedule_date']}</td>
            <td>{$row['schedule_time']}</td>
            <td>{$psyco_name}</td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='3'>No se encontró ninguna cita próximamente</td></tr>";
}

echo "</tbody></table>";

// Cerramos la conexión
$conn->close();
?>
