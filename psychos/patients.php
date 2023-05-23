<?php session_start();
// Conectamos con la base de datos
require '../dbaccess.php';

 // Asegúrate de tener el número de colegiado del profesional logueado
if (isset($_COOKIE["register_number"])) 
{
    $_SESSION['register_number'] = $_COOKIE['register_number'];
}
$colegiado = $_SESSION['register_number'];
$sql = "SELECT * FROM patients WHERE psychologist_registration_number = '$colegiado' AND Active = 0";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dashboard Profesionales</title>
    <meta content="Pagina contacto" name="description" />
    <meta content="telefono, pagina, contacto" name="keywords" />

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon" />
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"/>
    
    <script>
      document.getElementById("formulario").preventDefault();
    </script>
    <script
      type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY"
    ></script>
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"/>
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="index" class="logo d-flex align-items-center">
          <img src="../assets/img/logo.png" alt="" />
          <span class="d-none d-lg-block">Contigo</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
    <div class="ms-auto" style="margin-right: 150px;">
      <b><i class="bi bi-heart-pulse-fill"></i>&nbsp;&nbsp; 
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
      <!-- End Logo -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
          <a class="nav-link" href="patients">
            <i class="bi bi-person-square"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!-- End Login Page Nav -->

        <!--<li class="nav-heading">Pages</li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="../chats/chats.php">
            <i class="bi bi-chat-dots"></i>
            <span>Chats</span>
          </a>
        </li>-->
        <!-- End Register Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="../logout.php">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Cerrar Sesión</span>
          </a>
        </li>
      </ul>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
      <div class="col-12">
        <div class="card top-selling overflow-auto">
          <div class="card-body pb-0">
            <div id="chat" class="chat" width="600" height="450">
              <p>
                <b><i class="bi bi-person"></i> Nuevo paciente</b>
              </p>
              <button class="btn btn-primary me-md-2" onclick="nuevopaciente()">Añadir nuevo paciente</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
  <div class="card top-selling overflow-auto">
    <div class="card-body pb-0">
      <h5 class="card-title text-center pb-0 fs-4">Pacientes</h5>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Chats</th>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Fecha de nacimiento</th>
            <th scope="col">Seleccionar</th>
            <th scope="col">Dar de baja</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td><button class='btn btn-success' onclick='openChat(\"" . $row['id'] . "\")'>Abrir chat</button></td>";
              echo "<td>" . $row["dni"] . "</td>";
              echo "<td>" . $row["name"] . "</td>";
              echo "<td>" . $row["email"] . "</td>";
              echo "<td>" . $row["birthday"] . "</td>";
              echo "<td><input type='radio' name='selected_patient' value='{$row['id']}' onchange='showSafeZone(this.value)'></td>";
              echo "<td><button class='btn btn-danger' onclick='deletePatient(\"" . $row['dni'] . "\")'>Dar de baja</button></td>";
              echo "</tr>";

            }
          } else {
            echo "<tr><td colspan='4'>No se encontraron pacientes.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
      <br/>
    <div class="card top-selling overflow-auto">
        <div class="card-body pb-0">
            <h5 class="card-title text-center pb-0 fs-4">Información de su paciente</h5>
            <div id="safe_zone_info" class="mt-4">
            </div>
        </div>
    </div>
      <br/>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="credits"></div>
    </footer>
    <!-- End Footer -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/map.js"></script>
    <script>function showSafeZone(id) {
    // Realiza una solicitud AJAX para obtener la información de la 'safe zone' del paciente seleccionado
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "get_safe_zone_info.php?id=" + id, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("safe_zone_info").innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  }
  function deletePatient(dni) {
    if (confirm("¿Está seguro de que desea dar de baja a este paciente?")) {
      // Llamar al archivo PHP para eliminar al paciente
      window.location.href = "delete_patient.php?dni=" + dni;
    }
  }
  function openChat(patient_id) {
    if (confirm("¿Desea abrir el chat de este paciente?")) {
      // Llamar al archivo PHP para el chat del paciente
      window.open("../chats/chat_app?patient_id=" + patient_id, "Estamos CONTIGO", "height=500, width=400, top=0, left=0");
    }
  }</script>
  </body>
</html>
