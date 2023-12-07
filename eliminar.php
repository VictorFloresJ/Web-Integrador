<?php
require __DIR__ . '/includes/app.php';

esAdmin();

$id_videojuego = filter_var($_GET["idVideojuego"], FILTER_VALIDATE_INT);
$id_plataforma = filter_var($_GET["idPlataforma"], FILTER_VALIDATE_INT);

if (!$id_videojuego || !$id_plataforma) {
    header('Location: ' . $GLOBALS['raiz_sitio']);
    exit();
}

$db->begin_transaction();

try {
    $query1 = "DELETE FROM inventario
               WHERE inventario.id_videojuego = $id_videojuego
               AND inventario.id_plataforma = $id_plataforma";
    $result1 = $db->query($query1);

    $query2 = "DELETE FROM `keys`
               WHERE `keys`.id_videojuego = $id_videojuego
               AND `keys`.id_plataforma = $id_plataforma";
    $result2 = $db->query($query2);

    $db->commit();
} catch (Exception $e) {
    $db->rollback();
    header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php?mensaje=1');
    exit();
}

header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php?mensaje=5');
exit();

$db->close();
?>