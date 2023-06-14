<?php
                      require '../dbaccess.php';
                      // Conectar a la base de datos y seleccionar la tabla de horas
                    $horas = mysqli_query($conn, "SELECT * FROM hours");
                    
                    // Seleccionar las citas para el día seleccionado
                    if (isset($_POST['schedule_date'])) {
                      $dia = $_POST['schedule_date'];
                      $citas = mysqli_query($conn, "SELECT * FROM schedule WHERE schedule_date = '$dia'");
                    } else {
                      $dia = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');
                      $citas = mysqli_query($conn, "SELECT * FROM schedule WHERE schedule_date = '$dia'");
                    }
                    
                    // Crear un arreglo para almacenar las horas disponibles
                    $disponibles = array();
                    
                    // Iterar a través de las horas y determinar si están disponibles
                    while ($hora = mysqli_fetch_array($horas)) {
                      $disponible = true;
                      mysqli_data_seek($citas, 0);
                      while ($cita = mysqli_fetch_array($citas)) {
                        if ($hora['hour'] == $cita['schedule_time']) {
                          $disponible = false;
                          break;
                        }
                      }
                      if ($disponible) {
                        $disponibles[] = $hora['hour'];
                      }
                    }
                    
                    // Procesar el formulario si se ha seleccionado una hora
                    if (isset($_POST['hour'])) {
                      $hora = $_POST['hour'];
                      $paciente = $_SESSION['patient_id'];
                      $psyco = $_SESSION['register_number'];
                      $sql = "SELECT * FROM schedule WHERE schedule_date = '$dia' AND schedule_time = '$hora' AND  patient_id='$paciente'  AND psychologist_registration_number = '$psyco'";
                      $result = mysqli_query($conn, $sql);
                      
                      if (mysqli_num_rows($result) > 0) {
                          // Si ya existe un registro con la misma fecha y hora de la cita, no hacemos el insert y mostramos un mensaje de error
                         // echo "Ya existe una cita programada con esta fecha y hora.";
                      } else {
                        // Si no existe un registro con la misma fecha y hora de la cita, hacemos el insert
                        $stmt = $conn->prepare("INSERT INTO schedule (schedule_date, schedule_time, patient_id, psychologist_registration_number) VALUES (?, ?, ?, ?)");
                      $stmt->bind_param("ssss", $dia, $hora, $paciente, $psyco);
                      $stmt->execute();
                      $stmt->close();
                        }
/*                        if (mysqli_query($conn, $sql)) {
                            echo "Cita programada exitosamente.";
                        } else {
                            echo "Error al programar la cita: " . mysqli_error($conn);
                        }
*/
                    }
                    // Mostrar el formulario HTML
                      //PETICION AJAX LLAMANDO CODIGO PHP 
                      //LLAMAR METODO AJAX CUANDO CAMBIE EL DIA
                       

                    echo "<div class='card-body p-3 p-sm-5'>";
                    echo "<div class='row text-center mx-0'>"; 
                    $citas = mysqli_query($conn, "SELECT * FROM schedule WHERE schedule_date = '$dia'");
                    mysqli_data_seek($horas, 0);
                    while ($hora = mysqli_fetch_array($horas)) {
                      $ocupada = false;
                      mysqli_data_seek($citas, 0);
                      while ($cita = mysqli_fetch_array($citas)) {
                        if ($hora['hour'] == $cita['schedule_time']) {
                          $ocupada = true;
                          break;
                        }
                      }
                      if (!$ocupada) {
                        echo "<div class='col-md-2 col-4 my-1 px-2'><div class='cell py-1'><button type='submit' name='hour' value='$hora[hour]' class='btn btn-success'>$hora[hour]</button></div></div>";
                      } else {
                        echo "<div class='col-md-2 col-4 my-1 px-2'><div class='cell py-1'><button type='button' disabled class='btn btn-danger'>$hora[hour] (ocupada)</button></div></div>";
                      }
                      }
                      // Si se ha seleccionado una hora, guardar la cita en la base de datos
                      /*if (isset($_POST['hour'])) {
                      $hora_seleccionada = $_POST['hour'];
                      $paciente = $_SESSION['patient_id'];
                      $fecha_seleccionada = $_POST['schedule_date'];
                      $sql = "INSERT INTO schedule (schedule_date, schedule_time, patient_id) VALUES ('$fecha_seleccionada', '$hora_seleccionada', '$paciente')";
                      if ($conn->query($sql) === TRUE) {
                      echo "<div class='alert alert-success' role='alert'>Cita guardada exitosamente</div>";
                      } else {
                      echo "<div class='alert alert-danger' role='alert'>Error al guardar la cita: " . $conn->error . "</div>";
                      }
                      }*/
                    
                      
                      // Cerrar la conexión a la base de datos
                      $conn->close();
                      echo "</div></DIV>";
                      echo "</form>";
?>