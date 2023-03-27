<?php
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

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Realiza la consulta SQL para obtener la información de la 'safe zone' del paciente seleccionado
  $sql = "SELECT * FROM contacts WHERE patient_id = '$id'";
  $result = $conn->query($sql);
  $sql2 = "SELECT * FROM plans WHERE patient_id = '$id' and plans_done = 0";
  $result2 = $conn->query($sql2);
  $sql3 = "SELECT * FROM photos WHERE patient_id = '$id'";
  $result3 = $conn->query($sql3);
  echo "<table class='table table-striped table-hover'> <thead>";
  if ($result->num_rows > 0) {
    // Muestra la información de la 'safe zone' del paciente seleccionado en una tabla HTML
    
            echo "<tr>
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
              <td>{$row['contact_phone']}</td>
    }";
    while ($row2 = $result2->fetch_assoc()) {
              "<td>{$row2['plans_definition']}</td>";
    }
    while ($row3 = $result3->fetch_assoc()) {
              "<td>{$row3['daily_entry']}</td>
              <!-- Agrega aquí más celdas del 'Espacio Seguro' según sea necesario -->
            </tr>";
    }

    echo "  </tbody>
          </table>";
  }
  } else {
    echo "No se encontró información del 'Espacio Seguro' para el paciente seleccionado.";
  }
}

// Cerramos la conexión
$conn->close();
?>
