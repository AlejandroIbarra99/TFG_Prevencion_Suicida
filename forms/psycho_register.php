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

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recibimos los datos del formulario
  $colegiado = $_POST["register_number"];
  $dni = $_POST["psy_dni"];
  $name = $_POST["psy_name"];
  $email = $_POST["psy_email"];
  $contraseña = $_POST["psy_password"];

  // Verificamos si ya existe un registro con el mismo registration_number o dni
  $sql_check = "SELECT * FROM psychologists WHERE registration_number = '$colegiado' OR dni = '$dni' OR email = '$email'";
  $result = $conn->query($sql_check);

  if ($result->num_rows > 0) {
    echo "<div class='pt-4 pb-2'><h5 class='card-title text-center pb-0 fs-4'>Error: Ya existe un profesional registrado con esos datos.</h5></div>";
    $_SESSION['register_number'] = $colegiado;
    $_SESSION['psy_dni'] = $dni;
    $_SESSION['psy_name'] = $name;
    $_SESSION['psy_email'] = $email;
    $_SESSION['psy_password'] = $contraseña;
    echo "<script>
    setTimeout(function() {
      window.location.href = '../register/psyco-register.php';
    }, 2000);
  </script>";
  } else {
    // Creamos la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO psychologists (registration_number, name, dni, email, password) VALUES ('$colegiado', '$name', '$dni', '$email', '$contraseña')";

    // Ejecutamos la consulta y comprobamos si se insertó correctamente
    if ($conn->query($sql) === TRUE) {
      echo "<div class='pt-4 pb-2'><h5 class='card-title text-center pb-0 fs-4'>Profesional registrado correctamente. Redirigiendo...</h5></div>";
      unset($_SESSION['register_number']);
      unset($_SESSION['psy_dni']);
      unset($_SESSION['psy_name']);
      unset($_SESSION['psy_email']);
      unset($_SESSION['psy_password']);
       echo "<script>
              setTimeout(function() {
                window.location.href = '../login/pages-login.php';
              }, 2000);
            </script>";
    } else {
      echo "Error al registrar al profesional: " . $conn->error;
    }
  }
}

// Cerramos la conexión
$conn->close();
?>

