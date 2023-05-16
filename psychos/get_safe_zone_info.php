<?php
// Conectamos con la base de datos
require '../dbaccess.php';


if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Realiza la consulta SQL para obtener la información de la 'safe zone' del paciente seleccionado
  $sql = "SELECT * FROM contacts WHERE patient_id = '$id'";
  $result = $conn->query($sql);
  $sql2 = "SELECT * FROM plans WHERE patient_id = '$id' and plans_done = 0";
  $result2 = $conn->query($sql2);
  $sql3 = "SELECT * FROM photos WHERE patient_id = '$id'";
  $result3 = $conn->query($sql3);
  $sql4 = "SELECT DATE_FORMAT(daily_date, '%d/%m/%Y') AS formatted_date, GROUP_CONCAT(daily_entry SEPARATOR ' ') AS entries 
  FROM dailys 
  WHERE patient_id = '$id' 
  GROUP BY DATE_FORMAT(daily_date, '%d/%m/%Y') 
  ORDER BY daily_date DESC";
  $result4 = $conn->query($sql4);
  echo "<table class='table table-striped table-hover'> <thead>";
  if ($result->num_rows > 0) {
    // Muestra la información de la 'safe zone' del paciente seleccionado en una tabla HTML
    echo "<table class='table table-striped table-hover'>
            <thead>
              <tr>
                <th scope='col'>Contacto de emergencia</th>
                <th scope='col'>Teléfono de contacto emergencia</th>
                <th scope='col'>Planes de futuro</th>
                <th scope='col'>Entrada a diario</th>
              </tr>
            </thead>
            <tbody>";

            while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>{$row['contact_name']}</td>
                      <td>{$row['contact_phone']}</td>";
        
              while ($row2 = $result2->fetch_assoc()) {
                echo "<td>{$row2['plans_definition']}</td>";
              }
        
              echo "<td>";
              while ($row4 = $result4->fetch_assoc()) {
                echo "{$row4['formatted_date']}<br>{$row4['entries']}<br>";
              }
              echo "</td>";
        
              echo "</tr>";
            }
        
            echo "</tbody>
                  </table>";
          } else {
    echo "No se encontró información del 'Espacio Seguro' para el paciente seleccionado.";
  }
}

// Cerramos la conexión
$conn->close();
?>
