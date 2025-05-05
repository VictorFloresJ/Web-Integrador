<?php
require __DIR__ . "/../config.inc.php";
require __DIR__ . "/config/base_datos.php";
require __DIR__ . "/funciones.php";

$db = conectar_DB($GLOBALS['servidor'], $GLOBALS['usuario'], $GLOBALS['contrasena'], $GLOBALS['base_datos']);

$query = "SELECT maintenance_mode FROM site_settings WHERE id = 1";
$result = $db->query($query);
$maintenance = mysqli_fetch_assoc($result);
$maintenance = $maintenance["maintenance_mode"];

// Evitar redirección si ya estamos en mantenimiento.php, login.php, o si es un admin
$esMantenimiento = basename($_SERVER['PHP_SELF']) === "mantenimiento.php";
$esLogin = basename($_SERVER['PHP_SELF']) === "login.php";
$esPanel = basename($_SERVER['PHP_SELF']) === "usuario.php";
$esLogout = basename($_SERVER['PHP_SELF']) === "logout.php";
// Si el sitio está en mantenimiento y el usuario NO es admin y NO está en login.php, redirigir a mantenimiento.php
if ($maintenance && !$esMantenimiento && !$esLogin && !esAdminBool() && !$esPanel && !$esLogout) {
    header("Location: " . $GLOBALS['raiz_sitio'] . "mantenimiento.php");
    exit;
}
?>
