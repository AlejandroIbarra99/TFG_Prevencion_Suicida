<?php
// Conexión a la base de datos
require '../dbaccess.php';


if (isset($_SESSION['patient_id'])) {
    $id = $_SESSION['patient_id'];
}

// Consulta a la base de datos
$sql = "SELECT photos FROM photos where patient_id =" . $id . ' ORDER BY id desc LIMIT 5';
$resultado = $conn->query($sql);

// Mostrar los contactos
if ($resultado->num_rows > 0) {
  while($fila = $resultado->fetch_assoc()) {
    echo '<div><img style="width:100%" src="data:image/jpeg;base64,'.base64_encode($fila["photos"]).'"></div>';
    echo '<br>';
  }
} else {
  echo "No hay fotografías disponibles";
}

// Cierre de la conexión a la base de datos
$conn->close();
?>
