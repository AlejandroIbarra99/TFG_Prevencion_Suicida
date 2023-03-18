<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contigo</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet" >

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
  


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Contigo</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

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
        <a class="nav-link collapsed" href="contact-page.html">
          <i class="bi bi-chat-square"></i>
          <span>Contacto</span>
        </a>
      </li><!-- End Login Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="register/psyco-register.php">
          <i class="bi bi-card-list"></i>
          <span>Registro</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
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
                  <button class="btnNewContact" src="assets/img/anadirimagen.png"onclick="contact()"><i class="bi bi-plus-circle"></i></button>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Personas en las que confío</h5>

                  <!-- Line Chart -->
                  <div id="reportsChart">
                    <div class="column1">
                      <a class="card-icon rounded-circle d-flex align-items-center justify-content-center" href="tel:626 2"><img class="card-icon rounded-circle d-flex align-items-center justify-content-center" src="assets/img/messages-2.jpg"/></a>
                      <span>Mamá</span>
                    </div>
                    <div class="column">
                      <a  class="card-icon rounded-circle d-flex align-items-center justify-content-center" href="tel:727 2"><img class="card-icon rounded-circle d-flex align-items-center justify-content-center" src="assets/img/messages-3.jpg"/></a>
                      <span>Papá</span>
                    </div>
                    <div class="column">
                      <a class="card-icon rounded-circle d-flex align-items-center justify-content-center" href="tel:747 8"><img class="card-icon rounded-circle d-flex align-items-center justify-content-center" src="assets/img/messages-1.jpg"/></a>
                      <span>Sister</span>
                    </div>
                    <div class="column">
                      <a class="card-icon rounded-circle d-flex align-items-center justify-content-center" href="tel:+34 911385385"><img class="card-icon rounded-circle d-flex align-items-center justify-content-center" href="" src="assets/img/profile-img.jpg"/></a>
                      <span>Amor<i class="bi bi-heart"></i></span>
                    </div>
                  <!-- End Line Chart -->
                  </div>

                </div>

              </div>
            </div><!-- End  -->

            <!-- Planes de futuro -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-plus-circle"></i></a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Planes de futuro</h5>
                  <form class="checkInfo">
                    <table>
                      <tbody>
                        <tr>
                          <td><input type="checkbox" id="checkbox_1"> <label class="futureinfo" for="checkbox_1"> Viajar a Los Ángeles con mi Sister </label></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" id="checkbox_2"> <label class="futureinfo" for="checkbox_2"> Sacarme la carrera de Psicología </label></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" id="checkbox_3"> <label class="futureinfo" for="checkbox_3"> Tener mi propia consulta de psicología </label></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" id="checkbox_4"> <label class="futureinfo" for="checkbox_4"> Adoptar a un perro </label></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" id="checkbox_5"> <label class="futureinfo" for="checkbox_5"> Cuidar de mi familia </label></td>
                        </tr>
                      </tbody>
                    </table>
                  </form>
                </div>

              </div>
            </div><!-- End -->

            <!-- Diario -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown">Nueva entrada <i class="bi bi-plus-circle"></i></a>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Mi diario</h5>
                    <textarea id="w3review" name="w3review" rows="10" cols="130"></textarea>
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
                        <input type="text" class="datepicker" placeholder="Seleccione un día" readonly value="24-10-2022"><span class="fa fa-calendar"></span>
                      </div>
                    </div>
                    <div class="card-body p-3 p-sm-5">
                      <div class="row text-center mx-0">
                        <span>Mañana</span>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-danger" disabled onclick="pickhourdate()">8:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-light">8:30</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-danger" disabled>9:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-light">9:30</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-light">10:00</button></div></div>
                      </div>
                      <div class="row text-center mx-0">
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-light">10:30</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-danger" disabled>11:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-light">11:30</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-light">12:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-light">12:30</button></div></div>
                      </div>

                      <div class="row text-center mx-0">
                        <span>Tarde</span>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-light">16:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-light">17:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-light">18:00</button></div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-danger" disabled>19:00</button></div></div>                        
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1"><button class="btn btn-light">20:00</button></div></div>                        
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
              <button class="btnNewContact" src="assets/img/anadirimagen.png"onclick="photo()"><i class="bi bi-plus-circle"></i></button>
            </div>

            <div class="card-body">
              <h5 class="card-title">Mis Fotos</h5>

              <div id="budgetChart" style="min-height: 400px;" class="echart">
              <div><img src="assets/img/dog.png"></div>
              <br>
              <div><img src="assets/img/Sunset.png"></div>
              <br>
              <div><img src="assets/img/Camping.png"></div>
              <br>
              <div><img src="assets/img/Friends.png"></div>
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
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/map.js"></script>
  <script src="assets/js/calendar.js"></script>


</body>

</html>