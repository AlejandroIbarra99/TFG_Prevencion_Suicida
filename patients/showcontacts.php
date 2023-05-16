<?php
// Conexión a la base de datos
require '../dbaccess.php';


if (isset($_SESSION['patient_id'])) {
    $id = $_SESSION['patient_id'];
}

// Consulta a la base de datos
$sql = "SELECT contact_name, contact_phone, contact_photo FROM contacts where patient_id =" . $id;
$resultado = $conn->query($sql);

// Mostrar los contactos
if ($resultado->num_rows > 0) {
  while($fila = $resultado->fetch_assoc()) {
    echo '<div class="column">';
    echo '<a class="card-icon rounded-circle d-flex align-items-center justify-content-center" href="tel:'.$fila["contact_phone"].'"><img class="card-icon" src="data:image/jpeg;base64,'.base64_encode($fila["contact_photo"]).'" alt="Foto de '.$fila["contact_name"].'"></a>';
    echo '<span>'.$fila["contact_name"].'</span>';
    echo '</div>';
  }
} else {
  echo "No hay contactos disponibles";
}

// Cierre de la conexión a la base de datos
$conn->close();
?>
