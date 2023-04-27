<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "sa";
$password = "1234";
$dbname = "contigo";
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobamos la conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
echo var_dump($_POST);
/*if (isset($_POST['submit'])) {
    // Recorremos los checkboxes marcados
    foreach ($_POST as $key => $value) {
        if (strpos($key, "done") !== false) {
          $stmt = $conn->prepare("UPDATE plans SET plans_done = 1 WHERE id = ?");
          $stmt->bind_param("i", $value);
          $stmt->execute();
            if (!$stmt) {
              echo "Error preparando la consulta: " . $conn->error;
            } elseif (!$stmt->execute()) {
                echo "Error ejecutando la consulta: " . $stmt->error;
            }
        }
    }
}*/
foreach ($_POST as $key => $value) {
  if (strpos($key, "done") === 0) {
      $plan_id = substr($key, 4); // obtener el ID del plan desde el nombre de la casilla
      $plan_done = intval($value); // convertir el valor del checkbox a un entero (0 o 1)
      
      // actualizar la base de datos
      $sql = "UPDATE plans SET plans_done = 1 WHERE id = "  . $plan_done;
      if ($conn->query($sql) === false) {
          echo "Error actualizando el plan con ID " . $plan_id . ": " . $conn->error;
      }
  }
}


// Redireccionar al archivo safezone.php
header("Location: safezone");
exit();
?>
