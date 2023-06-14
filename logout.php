<?php
session_start();

// Destruye todas las variables de sesión
$_SESSION = array();

// Si se desea destruir la sesión completamente, borrar también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión y no la información de la sesión!
    setcookie("patient_id","",time() - 42000,"/");
    setcookie("username","",time() - 42000, "/");
    setcookie("user_type","",time() - 42000, "/");
    setcookie("user_id","",time() - 42000,"/");
    setcookie("error_message","", time() - 42000,"/");

// Finalmente, destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio (o cualquier otra página que desees)
header("Location: ./index");
exit;
?>
