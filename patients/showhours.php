<?php
 
 echo "<form method='POST'>";
 echo "<input hidden type='text' name='paciente' value='" . $_SESSION['patient_id'] . "'>";
 echo "<div class='card-header bg-dark'>";
 echo "<div class='mx-0 mb-0 row justify-content-sm-center justify-content-start px-1'>";
 echo "<input type='date' id='schedule_date' name='schedule_date' value='$dia' class='datepicker'>";
 echo "</div></div>";
 echo "<div class='card-body p-3 p-sm-5'>";
 echo "<div class='row text-center mx-0'>"; 
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
   if (isset($_POST['hour'])) {
   $hora_seleccionada = $_POST['hour'];
   $paciente = $_SESSION['patient_id'];
   $fecha_seleccionada = $_POST['schedule_date'];
   $sql = "INSERT INTO schedule (schedule_date, schedule_time, patient_id) VALUES ('$fecha_seleccionada', '$hora_seleccionada', '$paciente')";
   if ($conn->query($sql) === TRUE) {
   echo "<div class='alert alert-success' role='alert'>Cita guardada exitosamente</div>";
   } else {
   echo "<div class='alert alert-danger' role='alert'>Error al guardar la cita: " . $conn->error . "</div>";
   }
   }
   
   // Cerrar la conexión a la base de datos
   $conn->close();
   
   echo "</div></DIV>";
   echo "</form>";





?>