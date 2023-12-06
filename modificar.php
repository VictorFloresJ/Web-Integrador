<?php
require __DIR__ . '/includes/app.php';

$id_videojuego = filter_var($_GET["idVideojuego"], FILTER_VALIDATE_INT);

if (!$id_videojuego) {
    header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php');
    exit();
}

$query = 'SELECT videojuegos.nombre_videojuego AS nombre, videojuegos.imagen_videojuego AS imagen, videojuegos.descripcion AS descripcion
          FROM videojuegos WHERE videojuegos.id = ' . $id_videojuego;


$result = $db->query($query);

if (mysqli_num_rows($result) < 1) {
    header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php');
    exit();
}

$videojuego = mysqli_fetch_assoc($result);

$nombre_videojuego = $videojuego['nombre'];
$descripcion = $videojuego['descripcion'];
$imagen_videojuego = $videojuego['imagen'];

$query = 'SELECT inventario.id_plataforma AS plataformaID FROM inventario WHERE id_videojuego = ' . $id_videojuego;

$result = $db->query($query);

// ME QUEDE AQUI DEBO HACER UN CICLO PARA VER QUE PLATAFORMAS EXISTEN CON UN SWITCH TRUCHAS


$plataforma_xbox = '';
$plataforma_xbox_precio = '';
$plataforma_playstation = '';
$plataforma_playstation_precio = '';
$plataforma_nintendo = '';
$plataforma_nintendo_precio = '';
$plataforma_pc = '';
$plataforma_pc_precio = '';

$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($errores)) {
    }
}


incluirTemplate('header');
?>

<main class="administracion_creacion contenedor">
    <h1>Modificar producto</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="panel_administracion.php" class="boton-verde">Volver</a>

    <form action="" method="POST" enctype="multipart/form-data">

        <fieldset>
            <legend>Datos para inventario</legend>
            <div class="campo">
                <p>Plataformas disponibles (debe seleccionar al menos una)</p>
                <label for="plataforma_xbox" class="plataforma">
                    <input type="checkbox" name="plataforma_xbox" id="plataforma_xbox"> Xbox
                    <div class="campo" id="plataforma_xboxcampo">
                        <label for="inputPrecio">Precio</label>
                        <input type="number" name="plataforma_xbox_precio">
                    </div>
                </label>
                <label for="plataforma_playstation" class="plataforma">
                    <input type="checkbox" name="plataforma_playstation" id="plataforma_playstation"> PlayStation
                    <div class="campo" id="plataforma_playstationcampo">
                        <label for="inputPrecio">Precio</label>
                        <input type="number" name="plataforma_playstation_precio">
                    </div>
                </label>
                <label for="plataforma_nintendo" class="plataforma">
                    <input type="checkbox" name="plataforma_nintendo" id="plataforma_nintendo"> Nintendo
                    <div class="campo" id="plataforma_nintendocampo">
                        <label for="inputPrecio">Precio</label>
                        <input type="number" name="plataforma_nintendo_precio">
                    </div>
                </label>
                <label for="plataforma_pc" class="plataforma">
                    <input type="checkbox" name="plataforma_pc" id="plataforma_pc"> PC
                    <div class="campo" id="plataforma_pccampo">
                        <label for="inputPrecio">Precio</label>
                        <input type="number" name="plataforma_pc_precio">
                    </div>
                </label>
            </div>
        </fieldset>

        <fieldset>
            <legend class="red">Zona peligrosa</legend>
            <div class="campo">
                <p>Modificar alguno de los siguientes campos implica cambios en muchos registros. Precaución.</p>
            </div>
            <div class="campo">
                <label for="nombre_videojuego">Nombre videojuego</label>
                <input type="text" name="nombre_videojuego" id="nombre_videojuego" value="<?php echo $nombre_videojuego; ?>">
            </div>
            <div class="campo">
                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
            </div>
            
            <?php if ($videojuego['imagen']) : ?>
                <div class="campo">
                    <p>Imagen del videojuego</p>
                    <img src="images/<?php echo $videojuego['imagen']; ?>" alt="property image">
                </div>
            <?php endif; ?>

            <div class="campo">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg" name="imagen">
            </div>
        </fieldset>
        <input type="submit" value="Aplicar cambios" class="boton-verde">
    </form>
</main>

<?php
$db->close();
incluirTemplate('footer');
?>

</body>

</html>