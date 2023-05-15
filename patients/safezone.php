<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mi zona segura</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet" >

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
  


  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Contigo</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <div class="ms-auto" style="margin-right: 150px;">
      <b><i class="bi bi-heart-fill"></i>&nbsp;&nbsp; 
        <?php
        if (isset($_COOKIE['username'])) {
          echo $_COOKIE['username'];
        }
        else
        {
          echo "Paciente";
        }
        ?>
      </b>
    </div>
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Mi Espacio Seguro</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="../index">
          <i class="bi bi-chat-square"></i>
          <span>Contacto</span>
        </a>
      </li><!-- End Login Page Nav -->


     <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="register/psyco-register.php">
          <i class="bi bi-card-list"></i>
          <span>Registro</span>
        </a>
      </li> End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Cerrar Sesión</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      
      <h1><i class="bi bi-house-heart-fill"> </i>Mi espacio seguro</h1>
      <span><i>RPC - Respira, Para, Comunica</i></span>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <!-- Personas de confianza -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <button id="btnOpenNewContact" class="btnNewContact" src="../assets/img/anadirimagen.png"><i class="bi bi-plus-circle"></i></button>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Personas en las que confío</h5>

                  <!-- Line Chart -->
                  <div id="reportsChart">
                  		<?php
                        include 'showcontacts.php';
                      ?>
                  <!-- End Line Chart -->
                  </div>

                </div>

              </div>
            </div><!-- End  -->

            <!-- Planes de futuro -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

              <!--  <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-plus-circle"></i></a>
                </div>-->

                <div class="card-body">
                  <h5 class="card-title">Planes de futuro</h5>
                  <form class="checkInfo" action="save_plans.php" method="POST">
                  <table id="plans">
                    <tbody>
                      <?php include 'showplans.php'; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td style="display: d-inline; justify-content: space-between;" style="width: 48%;" colspan="2">
                          <button class="btn btn-primary"  type="button" onclick="addPlan()">Agregar nuevo plan</button>
                        </td>
                      <td style="display: d-inline; justify-content: space-between;" style="width: 48%;" colspan="2">
                          <button class="btn btn-secondary"  type="submit">Guardar planes</button>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </form>
              </div>

              </div>
            </div><!-- End -->

            <!-- Diario -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown">Nueva entrada <i class="bi bi-plus-circle"></i></a>
                </div>-->

                <div class="card-body auto-size">
                <form class="checkInfo" action="save_daily.php" method="POST">
                  <h5 class="card-title">Mi diario</h5>
                  <div style="display: flex; justify-content: space-between;">
                    <textarea id="dailytext" name="dailytext" rows="10" cols="50"></textarea>
                    <div id="dailyentries">
                    <?php

                        include './showdaily.php';
                      ?>
                    </div>
                  </div>
                  <br>
                  <div style="display: flex; justify-content: space-between;">
                    <button id="btnSaveDiary" type="submit" class="btn btn-primary" style="width: 100%;">Guardar entrada</button>
                  </form>
                    <!--<button id="btnShowDiary" class="btn btn-secondary" type="button" style="width: 48%;" onclick="showDiary()">Ver diario</button>-->
                  </div>  
                
                </div>

              </div>
            </div><!-- End  -->

            <!-- Calendario -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Consultas</h5>
                  <!--<form autocomplete="on">
                    <div class="card-header bg-dark">
                      <div class="mx-0 mb-0 row justify-content-sm-center justify-content-start px-1">
                        <input id="date" name="date" type="date" class="datepicker" placeholder="Seleccione un día" required><span class="fa fa-calendar"></span>
                      </div>
                    </div>
                    <div class="card-body p-3 p-sm-5">
                      <div class="row text-center mx-0">
                        <span><b>Mañana</b></span>


                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">8:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">8:30</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">9:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">9:30</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">10:00</button></div></div>
                      </div>
                      <div class="row text-center mx-0">
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">10:30</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">11:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">11:30</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">12:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">12:30</button></div></div>
                      </div>

                      <div class="row text-center mx-0">
                        <span><b>Tarde</b></span>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">13:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">13:30</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">16:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">16:30</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">17:00</button></div></div>
                      </div>
                      <div class="row text-center mx-0">
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">17:30</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">18:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">18:30</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">19:00</button></div></div>                        
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-success" onclick="pickhourdate()">19:30</button></div></div>                        
                      </div>
                    </div>
                    </form>--->
                    <?php
                    // Conectar a la base de datos y seleccionar la tabla de horas
                    $servername = "localhost";
                    $username = "sa";
                    $password = "1234";
                    $dbname = "contigo";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    
                    // Comprobamos la conexión
                    if ($conn->connect_error) {
                      die("Conexión fallida: " . $conn->connect_error);
                    }
                    
                    $horas = mysqli_query($conn, "SELECT * FROM hours");
                    
                    // Seleccionar las citas para el día seleccionado
                    if (isset($_POST['schedule_date'])) {
                      $dia = $_POST['schedule_date'];
                      $citas = mysqli_query($conn, "SELECT * FROM schedule WHERE schedule_date = '$dia'");
                    } else {
                      $dia = date('Y-m-d');
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
                      $paciente = $_POST['paciente'];
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
                       
                    echo "<form method='POST'>";
                    echo "<input hidden type='text' name='paciente' value='" . $_SESSION['patient_id'] . "'>";
                    echo "<div class='card-header bg-dark'>";
                    echo "<div class='mx-0 mb-0 row justify-content-sm-center justify-content-start px-1'>";
                    echo "<input type='date' id='schedule_date' name='schedule_date' value='$dia' class='datepicker' onchange='updateSchedule()'>";
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
                      /*if ($conn->query($sql) === TRUE) {
                      echo "<div class='alert alert-success' role='alert'>Cita guardada exitosamente</div>";
                      } else {
                      echo "<div class='alert alert-danger' role='alert'>Error al guardar la cita: " . $conn->error . "</div>";
                      }*/
                      }
                    
                      
                      // Cerrar la conexión a la base de datos
                      $conn->close();
                      
                      echo "</div></DIV>";
                      echo "</form>";
                      echo "<script>
                      function updateSchedule() {
                        var date = document.getElementById('schedule_date').value;
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                          if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('schedule-container').innerHTML = this.responseText;
                          }
                        };
                        xhttp.open('POST', 'safezone', true);
                        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhttp.send('ajax=true&schedule_date=' + date);
                        header('Location: safezone');
                      }
                      const scheduleDateInput = document.getElementById('schedule_date');

                      scheduleDateInput.addEventListener('change', function() {
                        // código a ejecutar cuando cambia la fecha seleccionada
                        updateSchedule();
                      })
                      </script>";
                      ?>
                  </div>
              </div>
            </div>
            <!-- End  -->

            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Próximas citas</h5>
                    <div id="next_schedule" class="mt-4">
                    </div>
                  </div>
              </div>
            </div>

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Spotify -->
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Mi playlist</h5>

              <div class="activity">
                <iframe style="border-radius:12px" src="https://open.spotify.com/embed/artist/2r5BXI16fTUtLVXqc9qlci?utm_source=generator" width="100%" height="380" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
              </div>

            </div>
          </div>
          <!-- End  -->

          <!-- Imagenes -->
          <div class="card">
            <div class="filter">
              <button class="btnNewContact" src="assets/img/anadirimagen.png" type="button" onclick="photo()"><i class="bi bi-plus-circle"></i></button>
            </div>

            <div class="card-body">
              <h5 class="card-title">Mis Fotos</h5>

              <div id="budgetChart" style="min-height: 400px;" class="echart">
              <?php require 'showphotos.php'; ?>
              
              <div id="photobox">

              </div>
              </div>

            </div>
          </div><!-- End-->



        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File 
  <script></script>
  
  <script src="../assets/js/calendar.js"></script>-->
  <script defer src="js/main.js"></script>  
  <script>function showNextSchedule() {
    // Realiza una solicitud AJAX para obtener la información de las citas del paciente seleccionado
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "get_next_schedule.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("next_schedule").innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  }
    // Llama a la función showNextSchedule() después de que se haya cargado la página
    window.addEventListener("load", function() {
    showNextSchedule();
  });
  function deleteHour(patient_id) {
    if (confirm("¿Estás seguro de que deseas cancelar esta cita?")) {
      // Llamar al archivo PHP para eliminar la cita
      window.location.href = "delete_patient.php?patient_id=" + patient_id;
    }
  }</script>
  <script>function showDiary() {
    // Realiza una solicitud AJAX para obtener la información de la 'safe zone' del paciente seleccionado
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "./showdaily", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        console.log("entra al show");
        document.getElementById("dailyentries").innerHTML = xhr.responseText;
      }
    };
    xhr.send();
    
  }

  function addPlan() {
  let count = 1;
  document.querySelector("#plans tbody").innerHTML = "";
  var table = document.querySelector("#plans tbody");
  var cell0 = document.createElement("th");
  var row = document.createElement("tr");
  var cell1 = document.createElement("td");
  var label = document.createElement("label");
  var input1 = document.createElement("input");
  label.innerHTML = "Introduzca su próximo plan:";
  input1.type = "text";
  input1.name = "plan[]"; 
  input1.classList.add("px-2");
  cell0.appendChild(label);
  cell1.appendChild(input1);
  row.appendChild(cell0);
  row.appendChild(cell1);
  
  
  table.appendChild(row);
}
function pickhourdate() {
  document.getElementById("hour-form").submit();
}



/*
function savePlans() {

var plans = document.getElementsByName("plan[]");
var done = document.getElementsByName("done[]");
var data = [];
for (var i = 0; i < plans.length; i++) {
  var plan = plans[i].value.trim();
  var is_done = done[i].checked ? 1 : 0;
  if (plan != "") {
    data.push({plan: plan, is_done: is_done});
  } else {
    alert("El campo de plan no puede estar en blanco.");
    return false;
  }
}
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
  }
};
xmlhttp.open("POST", "save_plans", true);
xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
xmlhttp.send(JSON.stringify(data));
}*/
function photo(){
    window.location.href = './add-photos';
}




</script>             

</body>

</html>