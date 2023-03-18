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
  $colegiado = $_POST["psy_register_number"];
  $dni = $_POST["patient_dni"];
  $name = $_POST["patient_name"];
  $email = $_POST["patient_email"];
  $birthdate = $_POST["patient_birthday"];
  $contraseña = $_POST["patient_password"];

  // Verificamos si ya existe un registro con el mismo DNI o email en la tabla de pacientes
  $sql_check = "SELECT * FROM patients WHERE dni = '$dni' OR email = '$email'";
  $result = $conn->query($sql_check);

  // Verificamos si ya existe un registro con el mismo número de colegiado en la tabla de psicólogos
  $sql_check2 = "SELECT * FROM psychologists WHERE registration_number = '$colegiado'";
  $result2 = $conn->query($sql_check2);

  if ($result->num_rows > 0) {
    echo "<div class='pt-4 pb-2'><h5 class='card-title text-center pb-0 fs-4'>Error: Ya existe un paciente registrado con ese DNI o email.</h5></div>";
    // Redireccionamos al formulario de registro de pacientes
    echo "<script>
    setTimeout(function() {
      window.location.href = '../register/patient-register.php';
    }, 2000);
  </script>";
  } elseif ($result2->num_rows == 0) {
    echo "<div class='pt-4 pb-2'><h5 class='card-title text-center pb-0 fs-4'>Error: El número de colegiado no existe en la base de datos.</h5></div>";
    // Redireccionamos al formulario de registro de pacientes
    echo "<script>
    setTimeout(function() {
      window.location.href = '../register/patient-register.php';
    }, 2000);
  </script>";
  } else {
    // Creamos la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO patients (name, dni, email, password, birthday, psychologist_registration_number) VALUES ( '$name', '$dni', '$email', '$contraseña', '$birthdate', '$colegiado')";
    unset($_SESSION['patient_dni']);
    unset($_SESSION['patient_name']);
    unset($_SESSION['patient_email']);
    unset($_SESSION['patient_birthday']);
    unset($_SESSION['patient_password']);
    // Ejecutamos la consulta y comprobamos si se insertó correctamente
    if ($conn->query($sql) === TRUE) {
      echo "<div class='pt-4 pb-2'><h5 class='card-title text-center pb-0 fs-4'>Paciente registrado correctamente. Redirigiendo...</h5></div>";
      echo "<script>
              setTimeout(function() {
                window.close();
              }, 2000);
            </script>";
    } else {
      echo "Error al registrar al paciente: " . $conn->error;
    }
  }
}

// Cerramos la conexión
$conn->close();
?>
