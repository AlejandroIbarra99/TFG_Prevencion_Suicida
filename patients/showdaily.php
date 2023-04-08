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

if (isset($_GET['id'])) {
    if (isset($_SESSION['patient_id'])) {
        $id = $_SESSION['patient_id'];
    }

    // Realiza la consulta SQL para obtener las entradas del diario del paciente seleccionado
    $sql = "SELECT daily_date, daily_entry FROM dailys WHERE patient_id = '$id' group by daily_date ORDER BY daily_date DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<textarea readonly id='readtext' name='readtext' rows='10' cols='50'>";
        while ($row = $result->fetch_assoc()) {
            echo "{$row['daily_date']}
                  {$row['daily_entry']}";
        }
        echo "</textarea>";
    } else {
        echo "No se encontraron entradas en el diario.";
    }
}

// Cerramos la conexión
$conn->close();
?>

 