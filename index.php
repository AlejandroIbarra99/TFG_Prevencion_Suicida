<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Contacto</title>
    <meta content="Pagina contacto" name="description" />
    <meta content="telefono, pagina, contacto" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />
    <script def src="./assets/js/map.js"></script>
    <script>
      document.getElementById("formulario").preventDefault();
    </script>
    <script
      type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY"
    ></script>
    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="./index" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="" />
          <span class="d-none d-lg-block">Contigo</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      <!-- End Logo -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
        <?php
                if (isset($_COOKIE['patient_id'])) {
                  echo '<a class="nav-link collapsed" href="./patients/safezone">';
                  echo '<i class="bi bi-grid"></i>';
                    echo '<span>Mi Espacio Seguro</span>';
                } 
                else{
                  echo '<a class="nav-link collapsed" href="login/pages-login">';
                  echo '<i class="bi bi-grid"></i>';
                  echo '<span>Mi Espacio Seguro</span>';
                }
                ?>            
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index">
            <i class="bi bi-chat-square"></i>
            <span>Contacto</span>
          </a>
        </li>
        <!-- End Login Page Nav -->

        <!--<li class="nav-heading">Pages</li>-->

       <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="">
            <i class="bi bi-card-list"></i>
            <span>Registro</span>
          </a>
        </li>
         End Register Page Nav -->

        <li class="nav-item">
            <?php
                if (isset($_COOKIE['patient_id'])) {
                  echo '<a class="nav-link collapsed" href="./logout">';
                  echo '<i class="bi bi-box-arrow-in-right"></i>';
                    echo '<span>Cerrar Sesión</span>';
                } 
                else{
                  echo '<a class="nav-link collapsed" href="login/pages-login.php">';
                  echo '<i class="bi bi-box-arrow-in-right"></i>';
                  echo '<span>Iniciar Sesión</span>';
                }
                ?>
            
          </a>
        </li>
        <!-- End Login Page Nav -->
      </ul>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
      <div class="col-12">
        <div class="card top-selling overflow-auto">
          <div class="card-body pb-0">
            <div id="phonenumber" class="phonenumber">
              <p>
                <b><i class="bi bi-telephone"></i> Teléfonos</b>
              </p>
              <ul>
                <li>
                  Emergencias <span><a href="tel:112"> 112 </a></span>
                </li>
                <li>
                  Línea de atención a la conducta suicida
                  <span><a href="tel:024"> 024 </a></span>
                </li>
                <li>
                  Teléfono de la esperanza
                  <span><a href="tel:+34 717003717"> 717 003 717 </a></span>
                </li>
                <li>
                  Asociación Barandilla
                  <span><a href="tel:+34 911385385">911 385 385 </a> </span>
                </li>
                <br /><i class="bi bi-asterisk"> Teléfonos de ayuda 24h</i>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card top-selling overflow-auto">
          <div class="card-body pb-0">
            <div id="chat" class="chat" width="600" height="450">
              <p>
                <b><i class="bi bi-person"></i> Chat</b>
              </p>

              <form
                id="formulario"
                action="./assets/js/map.js"
                method="get"
                onsubmit="return false"
                novalidate
              >
                Si tienes pensamientos o ideas suicidas puedes hablar con un/a
                psicólogo/a a través de este chat.<br />
                <br />
                <?php
                if (isset($_COOKIE['patient_id'])) {
                    echo '<button class="btn btn-primary me-md-2" onclick="chat()">Acceder al chat</button>';
                } 
                else{
                  echo '<button class="btn btn-primary me-md-2" onclick="loginpagechat()">Acceder al chat</button>';
                }
                ?>
                <br />
              </form>
            </div>
          </div>
        </div>
      </div>
      <br />
      <div class="col-12">
        <div class="card top-selling overflow-auto">
          <div class="card-body pb-0">
            <form id="formulario" onsubmit="return false" novalidate>
              <div
                id="EspacioSeguro"
                class="EspacioSeguro"
                width="600"
                height="450"
              >
                <p>
                  <b
                    ><i class="bi bi-person-workspace"></i> Mi espacio seguro</b
                  >
                </p>
                <span><b>"Mi espacio seguro"</b> es una herramienta en la que podrás crear tu plan de seguridad, pedir cita con tu psicólogo/a, crear una lista de contactos en los que puedas confiar, entre otras funciones.</span><br><br>
                <i class="bi bi-exclamation-triangle"> Para acceder a este espacio deberás tener una cuenta creada por tu especialista.</i><br><br>
                <?php
                if (isset($_COOKIE['patient_id'])) {
                    echo '<button class="btn btn-primary me-md-2" onclick="openzone()">Acceder a <b>MI ESPACIO SEGURO</b></button>';
                } 
                else{
                  echo '<button class="btn btn-primary me-md-2" onclick="loginpage()">Acceder a <b>MI ESPACIO SEGURO</b></button>';
                }
                ?>
                <br />
              </div>
            </form>
          </div>
        </div>
      </div>
      <br />
      <div class="col-12">
        <div class="card top-selling overflow-auto">
          <div class="card-body pb-0">
            <div id="map" class="map">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d12578.876531018896!2d-1.125709301336448!3d37.983683501099456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1spsicologo%20clinica!5e0!3m2!1ses!2ses!4v1666447893411!5m2!1ses!2ses"
                width="600"
                height="450"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
            <div id="titlemap" class="map">
              <p>
                <b><i class="bi bi-file-earmark-pdf"></i> Recursos Prevención Suicidio</b>
              </p>
              <ul>
                <li><a href="https://www.cop.es/pdf/Guia-digital.pdf" target="_blank">Colegio Oficial de Psicólogos</a></li>
                <li><a href="https://telefonodelaesperanza.org/assets/Guia%20del%20suicidio.pdf" target="_blank">Guía del suicidio del Teléfono de la Esperanza</a></li>
                <li><a href="https://consaludmental.org/publicaciones/Guiaprevencionsuicidio.pdf" target="_blank">Consejería Andaluza de Salud</a></li>
                <li><a href="http://www.madrid.org/bvirtual/BVCM017853.pdf" target="_blank">Guía de Prevención de las Conductas Suicidas de la Comunidad de Madrid</a></li>
                <li><a href="https://www.fsme.es/centro-de-documentaci%C3%B3n-sobre-conducta-suicida/gu%C3%ADas-sobre-conducta-suicida/la-conducta-suicida-gpc-sns/" target="_blank">Fundación Española para la Prevención del Suicidio</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
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
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script>function loginpage(){
      window.open('./login/pages-login', "_self");
  }
  function loginpagechat(){
      window.open('./login/pages-login_chat', "_self");
  }
  function openzone(){
      window.open('../patients/safezone', "_self");
  }
  if ("geolocation" in navigator) {
        // el navegador admite geolocalización
        navigator.geolocation.getCurrentPosition(function(position) {
          // posición actual del usuario
          var lat = position.coords.latitude;
          var lng = position.coords.longitude;

          // muestra la ubicación del usuario en el mapa
          var mapUrl = "https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d12578.876531018896!2d" + lng + "!3d" + lat + "!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1spsicologo%20clinica!5e0!3m2!1ses!2ses!4v1666447893411!5m2!1ses!2ses";
          document.getElementById("map").src = mapUrl;
        });
      } else {
        // geolocalización no soportada
        alert("Geolocalización no soportada por este navegador.");
      }
  
  
  </script>
    <script src="assets/js/map.js"></script>

  </body>
</html>