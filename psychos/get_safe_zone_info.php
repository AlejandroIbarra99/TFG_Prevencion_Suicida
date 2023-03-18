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
  $sql = "SELECT * FROM safe_zone WHERE patient_id = '$id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Muestra la información de la 'safe zone' del paciente seleccionado en una tabla HTML
    echo "<table class='table table-striped table-hover'>
            <thead>
              <tr>
                <th scope='col'>Contacto de emergencia</th>
                <th scope='col'>Teléfono de contacto emergencia</th>
                <th scope='col'>Planes de futuro</th>
                <th scope='col'>Entrada a diario</th>
                <!-- Agrega aquí más encabezados de columna según sea necesario -->
              </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['contact_name']}</td>
              <td>{$row['contact_phone']}</td>
              <td>{$row['plans_definition']}</td>
              <td>{$row['daily_entry']}</td>
              <!-- Agrega aquí más celdas del 'Espacio Seguro' según sea necesario -->
            </tr>";
    }

    echo "  </tbody>
          </table>";
  } else {
    echo "No se encontró información del 'Espacio Seguro' para el paciente seleccionado.";
  }
}

// Cerramos la conexión
$conn->close();
?>
