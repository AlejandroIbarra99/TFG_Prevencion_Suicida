<?php
session_start();

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

// Obtener datos del formulario enviado desde el cliente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plan = "";
  $is_done = 0;

  // Preparar consulta preparada y vincular los parámetros
  $stmt = $conn->prepare("INSERT INTO plans (plans_definition, plans_done, patient_id) VALUES (?, ?, ?)");
  $stmt->bind_param("sii", $plan, $is_done, $_SESSION['patient_id']);

  foreach ($_POST['plan'] as $key => $value) {
      $plan = trim($value);
      // Comprobar si el plan ya existe en la base de datos
      $stmt_check = $conn->prepare("SELECT id FROM plans WHERE plans_definition = ? AND patient_id = ? AND plans_done = 0");
      $stmt_check->bind_param("si", $plan, $_SESSION['patient_id']);
      $stmt_check->execute();
      $stmt_check->store_result();

      if ($stmt_check->num_rows == 0) {
          // El plan no existe en la base de datos, guardarlo
          $is_done = isset($_POST['done'][$key]) && $_POST['done'][$key] == "1" ? 1 : 0;
          $stmt->bind_param("sii", $plan, $is_done, $_SESSION['patient_id']);
          $stmt->execute();
      } else {
          // El plan ya existe en la base de datos, actualizar su estado de realización
          if(isset($_POST['done'][$key]) && $_POST['done'][$key] == "1")
          {
              $stmt_update = $conn->prepare("UPDATE plans SET plans_done = ? WHERE plans_definition = ? AND patient_id = ?");
              $is_done = 1;
              $stmt_update->bind_param("isi", $is_done, $plan, $_SESSION['patient_id']);
              $stmt_update->execute();   
          }

      }
      $stmt_check->close();
  }
  $stmt->close();
    }

    // Guardar los planes que no existen en la base de datos
   /* if (!empty($data)) {
        // Preparar consulta preparada y vincular los parámetros
        $stmt = $conn->prepare("INSERT INTO plans (plans_definition, plans_done, patient_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $plan, $is_done, $_SESSION['patient_id']);

        foreach ($data as $plan) {
            $plan = isset($plan['plan']) ? $plan['plan'] : "";
            $is_done = isset($plan['is_done']) && $plan['is_done'] ? 1 : 0;
            $stmt->bind_param("sii", $plan, $is_done, $_SESSION['patient_id']);
            $stmt->execute();
        }
        $stmt->close();*/

        echo "<div class='pt-4 pb-2'><h5 class='card-title text-center pb-0 fs-4'>Planes registrados correctamente. Redirigiendo...</h5></div>";
        echo "<script>
              setTimeout(function() {
                window.location.href = './safezone';
              }, 2000);
            </script>";
 /*   } else {
        echo "<script>
              setTimeout(function() {
                window.location.href = './safezone';
              }, 2000);
            </script>";
            }*/
// Cerrar la conexión
$conn->close();
?>
