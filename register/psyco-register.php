<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registro</title>
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

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="../index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Contigo</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Crear una cuenta</h5>
                    <p class="text-center small">Escriba todos sus datos</p>
                  </div>

                  <form class="row g-3 needs-validation" action="../forms/psycho_register.php" method="post">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Nº de colegiado</label>
                      <input type="text" name="register_number" class="form-control" id="yourName"
                      placeholder = "AA000000"required>
                      <div class="invalid-feedback">Por favor, introduzca su número de colegiado</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nombre del profesional</label>
                      <input type="text" name="psy_name" class="form-control" id="yourName" 
                      value="<?php echo isset($_SESSION['psy_name']) ? $_SESSION['psy_name'] : ''; ?>"required>
                      <div class="invalid-feedback">Por favor, introduzca su número de colegiado</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">DNI del profesional</label>
                      <input type="text"  name="psy_dni" class="form-control" id="yourdni" 
                      value="<?php echo isset($_SESSION['psy_dni']) ? $_SESSION['psy_dni'] : ''; ?>" required>
                      <div class="invalid-feedback">Por favor, introduzca un DNI váldo</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email del profesional</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="psy_email" class="form-control" id="yourUsername" 
                        value="<?php echo isset($_SESSION['psy_email']) ? $_SESSION['psy_email'] : ''; ?>" required>
                        <div class="invalid-feedback">Por favor, introduzca un email válido</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Contraseña del profesional</label>
                      <input type="password" name="psy_password" class="form-control" id="yourPassword" 
                      value="<?php echo isset($_SESSION['psy_password']) ? $_SESSION['psy_password'] : ''; ?>" required>
                      <div class="invalid-feedback">Por favor, introduzca su contraseña</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">Acepto los <a href="#">términos y condiciones</a></label>
                        <div class="invalid-feedback">Debe aceptar los términos y condiciones</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button id="createaccount" class="btn btn-primary w-100" type="submit">Crear cuenta</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/map.js"></script>

</body>

</html>