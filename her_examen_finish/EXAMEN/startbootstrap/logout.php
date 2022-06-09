<?php
// start de sessie
session_start();

// Unset al de sessie variabelen
$_SESSION = array();

// vernietig de sessie.
session_destroy();

// Redirect naar index pagina
header("location:/EXAMEN/startbootstrap/dist/index.php");
exit;
?>