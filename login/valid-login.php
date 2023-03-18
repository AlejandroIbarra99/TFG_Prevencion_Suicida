<?php
session_start();

if (isset($_COOKIE["user_id"]) && isset($_COOKIE["user_type"]) && isset($_COOKIE["register_number"])) {
    $_SESSION["user_id"] = $_COOKIE["user_id"];
    $_SESSION["user_type"] = $_COOKIE["user_type"];
    $_SESSION["register_number"] = $_COOKIE["register_number"];

    if ($_SESSION["user_type"] == "patient") {
        header("Location: patient_dashboard.php");
    } elseif ($_SESSION["user_type"] == "psychologist") {
        header("Location: psychologist_dashboard.php");
    }
}

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibimos los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];
    $remember = isset($_POST["remember"]) ? true : false;

    // Buscamos al usuario en la tabla de pacientes y psicólogos
    $sql_patient = "SELECT * FROM patients WHERE email = '$username' AND password = '$password'";
    $sql_psychologist = "SELECT * FROM psychologists WHERE email = '$username' AND password = '$password'";

    $result_patient = $conn->query($sql_patient);
    $result_psychologist = $conn->query($sql_psychologist);

    // Si encontramos al usuario en alguna de las tablas, iniciamos sesión
    if ($result_patient->num_rows > 0) {
        $row = $result_patient->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_type'] = 'patient';  
        if ($remember) {
            setUserCookie($row['id'], 'patient', '');
        }

        header("Location: ../patients/safezone.html");
    } elseif ($result_psychologist->num_rows > 0) {
        $row = $result_psychologist->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_type'] = 'psychologist';
        $_SESSION['psy_registration_number'] = $row['registration_number'];
        $_SESSION['register_number'] = $row['registration_number'];
        $registration_number = $row['registration_number'];  
        setUserCookie($row['id'], 'psychologist', $row['registration_number']);

        header("Location: ../psychos/patients.php");
    } else {
        // Si no se encuentra al usuario, muestra un mensaje de error
        $_SESSION['error_message'] = "Nombre de usuario o contraseña incorrectos";
        header("Location: pages-login.php");
    }
}

// Cerramos la conexión
$conn->close();

function setUserCookie($userId, $userType, $registration_number) {
    // Establece un tiempo de expiración para la cookie (por ejemplo, 30 días)
    $cookieExpiration = time() + (30 * 24 * 60 * 60);

    setcookie("user_id", $userId, $cookieExpiration, "/");
    setcookie("user_type", $userType, $cookieExpiration, "/");
    if($userType == 'psychologist')
    {
        setcookie("register_number", $registration_number, $cookieExpiration, "/");   
    }

}
?>
