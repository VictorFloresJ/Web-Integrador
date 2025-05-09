<?php
require __DIR__ . '/includes/app.php';
#asd
esAdmin();

$id_videojuego = filter_var($_GET["idVideojuego"], FILTER_VALIDATE_INT);
$id_plataforma = filter_var($_GET["idPlataforma"], FILTER_VALIDATE_INT);

if (!$id_videojuego || !$id_plataforma) {
    header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php');
    exit();
}


$query = "SELECT inventario.cantidad AS cantidad FROM inventario WHERE id_videojuego = $id_videojuego AND id_plataforma = $id_plataforma";
$result = $db->query($query);
if (mysqli_num_rows($result) < 1) {
    header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php');
    exit();
}

$cantidadActualKeys = mysqli_fetch_assoc($result)['cantidad'];

$cantidadNuevaKeys = $cantidadActualKeys + 1;
$nuevaKey = uniqid();

$db->begin_transaction();

try {
    $query1 = "INSERT INTO `keys` (clave, id_videojuego, id_plataforma) VALUES ('$nuevaKey', $id_videojuego, $id_plataforma)";
    $result1 = $db->query($query1);

    $query2 = "UPDATE inventario SET cantidad = $cantidadNuevaKeys WHERE id_videojuego = $id_videojuego AND id_plataforma = $id_plataforma";
    $result2 = $db->query($query2);

    $db->commit();
} catch (Exception $e) {
    $db->rollback();
    header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php?mensaje=1');
    exit();
}

header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php?mensaje=2');
exit();

$db->close();
?>
