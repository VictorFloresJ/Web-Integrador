<?php 
require __DIR__ . '/includes/app.php';

estaAutenticado();

session_start();

$_SESSION = [];

session_destroy();
header("Location: " . $GLOBALS['raiz_sitio']);

?>