<?php
require "config.inc.php";
require "includes/config/base_datos.php";
require "includes/funciones.php";

// Asegurar que solo admins accedan
if (!esAdminBool()) {
    header("Location: " . $GLOBALS['raiz_sitio']);
    exit;
}

// Verificar que el usuario venga desde panel_administracion.php
if (!isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], 'panel_administracion.php') === false) {
    header("Location: " . $GLOBALS['raiz_sitio']);
    exit;
}

// Conexión a la base de datos
$db = conectar_DB($GLOBALS['servidor'], $GLOBALS['usuario'], $GLOBALS['contrasena'], $GLOBALS['base_datos']);

// Activar modo mantenimiento
$query = "UPDATE site_settings SET maintenance_mode = 1 WHERE id = 1";
$db->query($query);

// Redirigir de vuelta al panel
header("Location: " . $GLOBALS['raiz_sitio'] . "/panel_administracion.php?mantenimiento=activado");
exit;
?>
