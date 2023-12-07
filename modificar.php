<?php
require __DIR__ . '/includes/app.php';

esAdmin();

$id_videojuego = filter_var($_GET["idVideojuego"], FILTER_VALIDATE_INT);

if (!$id_videojuego) {
    header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php');
    exit();
}

$plataforma_xbox = '';
$plataforma_xbox_precio = '';
$plataforma_playstation = '';
$plataforma_playstation_precio = '';
$plataforma_nintendo = '';
$plataforma_nintendo_precio = '';
$plataforma_pc = '';
$plataforma_pc_precio = '';

$query = 'SELECT videojuegos.nombre_videojuego AS nombre, 
          videojuegos.imagen_videojuego AS imagen, 
          videojuegos.descripcion AS descripcion
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

$query = 'SELECT inventario.id_plataforma AS plataformaID,
          inventario.precio AS precio,
          inventario.cantidad AS cantidad
          FROM inventario WHERE id_videojuego = ' . $id_videojuego;

$result = $db->query($query);

$plataformas = [];
while ($plataformaActual = mysqli_fetch_assoc($result)) {
    $plataformas[] = $plataformaActual;
}

foreach ($plataformas as $key => $value) {
    switch ($value['plataformaID']) {
        case '1':
            $plataforma_xbox = true;
            $plataforma_xbox_aux = true;
            $plataforma_xbox_precio =  $value['precio'];
            $plataforma_xbox_cantidad = $value['cantidad'] ?? null;
            break;
        case '2':
            $plataforma_playstation = true;
            $plataforma_playstation_aux = true;
            $plataforma_playstation_precio =  $value['precio'];
            $plataforma_playstation_cantidad = $value['cantidad'] ?? null;
            break;
        case '3':
            $plataforma_nintendo = true;
            $plataforma_nintendo_aux = true;
            $plataforma_nintendo_precio =  $value['precio'];
            $plataforma_nintendo_cantidad = $value['cantidad'] ?? null;
            break;
        case '4':
            $plataforma_pc = true;
            $plataforma_pc_aux = true;
            $plataforma_pc_precio =  $value['precio'];
            $plataforma_pc_cantidad = $value['cantidad'] ?? null;
            break;
    }
}

$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $imagen = $_FILES["imagen"];

    $nombre_videojuego = mysqli_real_escape_string($db, $_POST['nombre_videojuego']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);

    $plataforma_xbox = (isset($_POST['plataforma_xbox'])) ? mysqli_real_escape_string($db, $_POST['plataforma_xbox']) : null;
    $plataforma_playstation = (isset($_POST['plataforma_playstation'])) ? mysqli_real_escape_string($db, $_POST['plataforma_playstation']) : null;
    $plataforma_nintendo = (isset($_POST['plataforma_nintendo'])) ? mysqli_real_escape_string($db, $_POST['plataforma_nintendo']) : null;
    $plataforma_pc = (isset($_POST['plataforma_pc'])) ? mysqli_real_escape_string($db, $_POST['plataforma_pc']) : null;

    $plataforma_xbox_precio = (isset($_POST['plataforma_xbox_precio'])) ? mysqli_real_escape_string($db, $_POST['plataforma_xbox_precio']) : null;
    $plataforma_playstation_precio = (isset($_POST['plataforma_playstation_precio'])) ? mysqli_real_escape_string($db, $_POST['plataforma_playstation_precio']) : null;
    $plataforma_nintendo_precio = (isset($_POST['plataforma_nintendo_precio'])) ? mysqli_real_escape_string($db, $_POST['plataforma_nintendo_precio']) : null;
    $plataforma_pc_precio = (isset($_POST['plataforma_pc_precio'])) ? mysqli_real_escape_string($db, $_POST['plataforma_pc_precio']) : null;

    $errores[] = (!$nombre_videojuego) ? 'Debes agregar el nombre del videojuego' : null;
    $errores[] = (!$descripcion) ? 'Debes agregar la descripción del videojuego' : null;

    // La siguiente validación está de más, pues CUALQUIER REGISTRO a priori debe tener al menos una plataforma seleccionada
    $errores[] = (!$plataforma_xbox && !$plataforma_playstation && !$plataforma_nintendo && !$plataforma_pc) ? 'Debe agregar al menos una plataforma' : null;

    $errores[] = ($plataforma_xbox && !$plataforma_xbox_precio) ? 'Debe agregar el precio de la siguiente plataforma: Xbox' : null;
    $errores[] = ($plataforma_playstation && !$plataforma_playstation_precio) ? 'Debe agregar el precio de la siguiente plataforma: PlayStation' : null;
    $errores[] = ($plataforma_nintendo && !$plataforma_nintendo_precio) ? 'Debe agregar el precio de la siguiente plataforma: Nintendo' : null;
    $errores[] = ($plataforma_pc && !$plataforma_pc_precio) ? 'Debe agregar el precio de la siguiente plataforma: PC' : null;

    
    
    $errores = array_filter($errores);

    if (empty($errores)) {
        $folder_images = "images/";
        
        if (!is_dir($folder_images)) {
            mkdir($folder_images);
        }

        $nombre_imagen = "";

        if ($imagen["name"]) {
            unlink($folder_images . $imagen_videojuego);
            $nombre_imagen = $nombre_videojuego . ".jpg";
            move_uploaded_file($imagen["tmp_name"], $folder_images . $nombre_imagen);
        } else {
            $nombre_imagen = $imagen_videojuego;
        }

        $query = "UPDATE videojuegos 
                  SET videojuegos.nombre_videojuego = '$nombre_videojuego', 
                  videojuegos.imagen_videojuego = '$nombre_imagen',
                  videojuegos.descripcion = '$descripcion'
                  WHERE videojuegos.id = $id_videojuego";


        $result = $db->query($query);

        $plataformas = [];

        $plataformas[] = (!isset($plataforma_xbox_aux) && isset($_POST['plataforma_xbox'])) ? "1" : null;
        $plataformas[] = (!isset($plataforma_playstation_aux) && isset($_POST['plataforma_playstation'])) ? "2" : null;
        $plataformas[] = (!isset($plataforma_nintendo_aux) && isset($_POST['plataforma_nintendo'])) ? "3" : null;
        $plataformas[] = (!isset($plataforma_pc_aux) && isset($_POST['plataforma_pc'])) ? "4" : null;

        $plataformas = array_filter($plataformas);

        if (!empty($plataformas)) {
            $query = "INSERT INTO inventario (id_videojuego, id_plataforma, cantidad, precio) VALUES ";
    
            foreach ($plataformas as $idPlataforma) {
                if ($idPlataforma !== null) {
                    $cantidad = 0;
                    $precio = 0;
            
                    // Asignar precios según la plataforma
                    switch ($idPlataforma) {
                        case 1: // Xbox
                            $precio = $plataforma_xbox_precio;
                            break;
                        case 2: // PlayStation
                            $precio = $plataforma_playstation_precio;
                            break;
                        case 3: // Nintendo
                            $precio = $plataforma_nintendo_precio;
                            break;
                        case 4: // PC
                            $precio = $plataforma_pc_precio;
                            break;
                    }
            
                    $query .= "('$id_videojuego', '$idPlataforma', $cantidad, $precio), ";
                }
            }
            
            $query = rtrim($query, ', ');
            
            $result = $db->query($query);
        } 

        if ($result) {
            header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php?mensaje=3');
            exit();
        }
        
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
                <p>Plataformas disponibles (No puede eliminar las previamente selecionadas)</p>
                <label for="plataforma_xbox" class="plataforma <?php echo isset($plataforma_xbox_aux) ? 'seleccionado' : ''; ?>">
                    <input type="checkbox" name="plataforma_xbox" id="plataforma_xbox" <?php echo isset($plataforma_xbox_aux) ? 'checked' : ''; ?>> Xbox
                    <div class="campo" id="plataforma_xboxcampo">
                        <label for="inputPrecio">Precio</label>
                        <input type="number" name="plataforma_xbox_precio" value="<?php echo isset($plataforma_xbox_aux) ? $plataforma_xbox_precio : ''; ?>">
                    </div>
                </label>

                <label for="plataforma_playstation" class="plataforma <?php echo isset($plataforma_playstation_aux) ? 'seleccionado' : ''; ?>">
                    <input type="checkbox" name="plataforma_playstation" id="plataforma_playstation" <?php echo isset($plataforma_playstation_aux) ? 'checked' : ''; ?>> PlayStation
                    <div class="campo" id="plataforma_playstationcampo">
                        <label for="inputPrecio">Precio</label>
                        <input type="number" name="plataforma_playstation_precio" value="<?php echo isset($plataforma_playstation_aux) ? $plataforma_playstation_precio : ''; ?>">
                    </div>
                </label>

                <label for="plataforma_nintendo" class="plataforma <?php echo isset($plataforma_nintendo_aux) ? 'seleccionado' : ''; ?>">
                    <input type="checkbox" name="plataforma_nintendo" id="plataforma_nintendo" <?php echo isset($plataforma_nintendo_aux) ? 'checked' : ''; ?>> Nintendo
                    <div class="campo" id="plataforma_nintendocampo">
                        <label for="inputPrecio">Precio</label>
                        <input type="number" name="plataforma_nintendo_precio" value="<?php echo isset($plataforma_nintendo_aux) ? $plataforma_nintendo_precio : ''; ?>">
                    </div>
                </label>

                <label for="plataforma_pc" class="plataforma <?php echo isset($plataforma_pc_aux) ? 'seleccionado' : ''; ?>">
                    <input type="checkbox" name="plataforma_pc" id="plataforma_pc" <?php echo isset($plataforma_pc_aux) ? 'checked' : ''; ?>> PC
                    <div class="campo" id="plataforma_pccampo">
                        <label for="inputPrecio">Precio</label>
                        <input type="number" name="plataforma_pc_precio" value="<?php echo isset($plataforma_pc_aux) ? $plataforma_pc_precio : ''; ?>">
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