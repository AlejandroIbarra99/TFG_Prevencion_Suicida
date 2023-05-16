<?php
session_start();
// Conectamos con la base de datos
require '../dbaccess.php';

// Obtener datos del formulario enviado desde el cliente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plans = isset($_POST['plan']) ? $_POST['plan'] : array();
    $is_done = isset($_POST['done']) ? $_POST['done'] : array();
    $data = array();
    $i = 0; // inicializar la variable $i antes del ciclo
    foreach ($plans as $key => $plan) {
        $plan = trim($plan);
        // Comprobar si el plan ya existe en la base de datos
        
        if (!empty($plan)) {
        $stmt = $conn->prepare("SELECT id FROM plans WHERE plans_definition = ? AND patient_id = ? ");
        $stmt->bind_param("si", $plan, $_SESSION['patient_id']);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) {
            // El plan no existe en la base de datos, guardarlo
            //$is_done = isset($done[$key]) && $done[$key] ? 1 : 0;
            $is_done = isset($is_done[$key]) && $is_done[$key] == "1" ? 1 : 0;
            $data[] = array('plan' => $plan, 'is_done' => $is_done);
        } else {
               // El plan ya existe en la base de datos, actualizar su estado de realización
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
            }
          }
        }
        $stmt->close();
        $i++; // incrementar la variable $i en cada iteración
    }
    // Guardar los planes que no existen en la base de datos
    if (!empty($data)) {
        // Preparar consulta preparada y vincular los parámetros
        $stmt = $conn->prepare("INSERT INTO plans (plans_definition, plans_done, patient_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $plan, $is_done, $_SESSION['patient_id']);
        foreach ($data as $plan) {
            $plan = isset($plan['plan']) ? $plan['plan'] : "";
            $is_done = isset($plan['is_done']) && $plan['is_done'] ? 1 : 0;
            $stmt->bind_param("sii", $plan, $is_done, $_SESSION['patient_id']);
            $stmt->execute();
        }
        $stmt->close();
        echo "<div class='pt-4 pb-2'><h5 class='card-title text-center pb-0 fs-4'>Planes registrados correctamente. Redirigiendo...</h5></div>";
        echo "<script>
              setTimeout(function() {
                window.location.href = './safezone';
              }, 2000);
            </script>";
    } else {
        echo "<script>
              setTimeout(function() {
                window.location.href = './safezone';
              }, 2000);
            </script>";
    }
// Cerrar la conexión
$conn->close();
?>