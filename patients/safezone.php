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
      <b><i class="bi bi-heart-fill"></i>&nbsp;&nbsp; Paciente</b>
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
                          <button class="btn btn-secondary"  type="submit" onclick="savePlans()">Guardar planes</button>
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
                  <form autocomplete="on">
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
                  </form>
                  </div>
              </div>
            </div><!-- End  -->



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
  // Obtener la hora y el día seleccionado
  var hora = event.target.innerHTML;
  var dia = document.getElementById("date").value;
  
  // Confirmar si se desea reservar la hora
  var confirmar = confirm("¿Estás seguro de que deseas confirmar la cita el dia " + dia + " a las " + hora + "?");
  
  if (confirmar) {
    // Enviar la hora seleccionada al servidor
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // La hora ha sido guardada exitosamente
        alert("Hora " + hora + " del día " + dia + " reservada correctamente.");
        
        // Cambiar la clase del botón seleccionado
        var botonSeleccionado = hora;
        botonSeleccionado.classList.replace("btn btn-success", "btn btn-danger");
        botonSeleccionado.target.disabled = true;
      }
    };
    xmlhttp.open("GET", "save_hour.php?hora=" + hora + "&dia=" + dia, true);
    xmlhttp.send();
  }
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