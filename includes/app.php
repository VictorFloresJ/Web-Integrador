<?php 

require __DIR__ . "/../config.inc.php";
require __DIR__ . "/config/base_datos.php";
require __DIR__ . "/funciones.php";

$db = conectar_DB($GLOBALS['servidor'], $GLOBALS['usuario'], $GLOBALS['contrasena'], $GLOBALS['base_datos']);
?>