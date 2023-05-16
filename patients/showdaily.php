<?php
// Conectamos con la base de datos
require '../dbaccess.php';


if (isset($_SESSION['patient_id'])) {
    $id = $_SESSION['patient_id'];

    // Realiza la consulta SQL para obtener las entradas del diario del paciente seleccionado
    $sql = "SELECT DATE_FORMAT(daily_date, '%d/%m/%Y') AS formatted_date, GROUP_CONCAT(daily_entry SEPARATOR ' ') AS entries 
            FROM dailys 
            WHERE patient_id = '$id' 
            GROUP BY DATE_FORMAT(daily_date, '%d/%m/%Y') 
            ORDER BY daily_date DESC";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<textarea readonly id='readtext' name='readtext' rows='10' cols='50'>";
        while ($row = $result->fetch_assoc()) {
            echo "{$row['formatted_date']}\n{$row['entries']}\n\n";
        }
        echo "</textarea>";
    } else {
        echo "No se encontraron entradas en el diario.";
    }
} else {
    echo "No se ha encontrado una sesión de paciente activa.";
}

// Cerramos la conexión
$conn->close();
?>
