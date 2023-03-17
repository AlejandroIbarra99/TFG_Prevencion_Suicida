<?php
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
  $dni = $_POST["patient_dni"];
  $email_paciente = $_POST["patient_email"];
  $email_profesional = $_POST["psy_email"];
  $contraseña = $_POST["psy_password"];

  // Creamos la consulta SQL para insertar los datos en la base de datos
  $sql = "INSERT INTO patients (colegiado, dni, email_paciente, email_profesional, contraseña) VALUES ('$colegiado', '$dni', '$email_paciente', '$email_profesional', '$contraseña')";

  // Ejecutamos la consulta y comprobamos si se insertó correctamente
  if ($conn->query($sql) === TRUE) {
    echo "Paciente registrado correctamente";
  } else {
    echo "Error al registrar al paciente: " . $conn->error;
  }
}

// Cerramos la conexión
$conn->close();
?>
