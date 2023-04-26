<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "sa";
$password = "1234";
$dbname = "contigo";
$id = 0;
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobamos la conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_SESSION['patient_id'])) {
    $id = $_SESSION['patient_id'];
}

// Consulta a la base de datos
$sql = "SELECT plans_definition, plans_done FROM plans where patient_id =" . $id . " AND plans_done = 0";
$resultado = $conn->query($sql);
$cont = 0;
// Mostrar los planes futuros
if ($resultado->num_rows > 0) {
  echo "<table>";
  echo "<thead><tr><th>Plan</th><th class='px-5'>Realizado</th></tr></thead>";
  echo "<tbody>";
  while($fila = $resultado->fetch_assoc()) {
    $cont++;
    echo "<tr>";
    echo "<td><input type='label' hidden name='plan[]".$cont."' value='".$fila["plans_definition"]."'><label>".$fila["plans_definition"]."</label></td>";
    echo "<td class='px-5'><input type='checkbox' name='done".$cont."' value='1'></td>";
    echo "</tr>";
  }
  echo "</tbody></table>";
} else {
  echo "No hay planes futuros disponibles";
}

// Cierre de la conexión a la base de datos
$conn->close();
?>