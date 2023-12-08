<?php
require __DIR__ . '/includes/app.php';

esAdmin();

$id_videojuego = filter_var($_GET["idVideojuego"], FILTER_VALIDATE_INT);
$id_plataforma = filter_var($_GET["idPlataforma"], FILTER_VALIDATE_INT);

if (!$id_videojuego || !$id_plataforma) {
    header('Location: ' . $GLOBALS['raiz_sitio']);
    exit();
}

$query = "SELECT *
          FROM inventario
          WHERE inventario.id_videojuego = $id_videojuego AND inventario.id_plataforma = $id_plataforma";


$videojuego = mysqli_fetch_assoc($db->query($query));

if (!$videojuego) {
    header('Location: ' . $GLOBALS['raiz_sitio']);
    exit();
}

$errores = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $precioActualizado = mysqli_escape_string($db, filter_var($_POST['precio'], FILTER_VALIDATE_FLOAT));
    
    $errores[] = !$precioActualizado || ($precioActualizado <= 0) ? 'Precio nuevo inválido' : null;

    $errores = array_filter($errores);

    if (empty($errores)) {
        $query = "UPDATE inventario SET precio = $precioActualizado WHERE inventario.id_videojuego = $id_videojuego AND inventario.id_plataforma = $id_plataforma";

        $resultado = $db->query($query);

        if ($resultado) {
            header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php?mensaje=3');
            exit();
        }
    }
}


incluirTemplate('header');
?>

<main class="administracion_creacion contenedor">
    <h1>Modificar precio</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="panel_administracion.php" class="boton-verde">Volver</a>

    <form action="" method="POST" enctype="multipart/form-data" class="administracion_creacion-modificacionprecio">
        <div class="campo">
            <label for="precio">Precio actual: </label>
            <input type="number" step="0.01" name="precio" value="<?php echo $videojuego['precio']; ?>">
        </div>
        <input type="submit" value="Aplicar cambios" class="boton-verde">
    </form>
</main>

<?php
$db->close();
incluirTemplate('footer');
?>

</body>

</html>