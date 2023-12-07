<?php
require __DIR__ . '/includes/app.php';

$nombre_videojuego = '';
$descripcion = '';
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

    $nombre_videojuego = mysqli_real_escape_string($db, $_POST['nombre_videojuego']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $imagen = $_FILES["imagen"];

    if (isset($_POST['plataforma_xbox'])) {
        $plataforma_xbox = mysqli_real_escape_string($db, $_POST['plataforma_xbox']);
    }
    if (isset($_POST['plataforma_playstation'])) {
        $plataforma_playstation = mysqli_real_escape_string($db, $_POST['plataforma_playstation']);
    }
    if (isset($_POST['plataforma_nintendo'])) {
        $plataforma_nintendo = mysqli_real_escape_string($db, $_POST['plataforma_nintendo']);
    }
    if (isset($_POST['plataforma_pc'])) {
        $plataforma_pc = mysqli_real_escape_string($db, $_POST['plataforma_pc']);
    }

    if (!$nombre_videojuego) {
        $errores[] = 'El nombre del videojuego es obligatorio';
    }
    if (!$descripcion) {
        $errores[] = 'La descripción del videojuego es obligatoria';
    }
    if (strlen($descripcion) < 50) {
        $errores[] = 'La descripción del videojuego debe tener al menos 50 caracteres';
    }
    if (!isset($_POST['plataforma_xbox']) && !isset($_POST['plataforma_xbox']) && !isset($_POST['plataforma_xbox']) && !isset($_POST['plataforma_xbox'])) {
        $errores[] = 'Debes seleccionar al menos una plataforma';
    }

    if (!$imagen["name"]) {
        $errores[] = "Debes agregar una imagen";
    }

    if (isset($_POST['plataforma_xbox']) && isset($_POST['plataforma_xbox_precio'])) {
        $plataforma_xbox_precio = mysqli_real_escape_string($db, $_POST['plataforma_xbox_precio']);
        if (!$plataforma_xbox_precio) {
            $errores[] = 'Debes agregar el precio de la siguiente plataforma: Xbox';
        }
    }

    if (isset($_POST['plataforma_playstation']) && isset($_POST['plataforma_playstation_precio'])) {
        $plataforma_playstation_precio = mysqli_real_escape_string($db, $_POST['plataforma_playstation_precio']);
        if (!$plataforma_playstation_precio) {
            $errores[] = 'Debes agregar el precio de la siguiente plataforma: PlayStation';
        }
    }

    if (isset($_POST['plataforma_nintendo']) && isset($_POST['plataforma_nintendo_precio'])) {
        $plataforma_nintendo_precio = mysqli_real_escape_string($db, $_POST['plataforma_nintendo_precio']);
        if (!$plataforma_nintendo_precio) {
            $errores[] = 'Debes agregar el precio de la siguiente plataforma: Nintendo';
        }
    }

    if (isset($_POST['plataforma_pc']) && isset($_POST['plataforma_pc_precio'])) {
        $plataforma_pc_precio = mysqli_real_escape_string($db, $_POST['plataforma_pc_precio']);
        if (!$plataforma_pc_precio) {
            $errores[] = 'Debes agregar el precio de la siguiente plataforma: PC';
        }
    }

    if (empty($errores)) {
        $folder_images = "images/";
        if (!is_dir($folder_images)) {
            mkdir($folder_images);
        }
        $imagen_videojuego = $nombre_videojuego . ".jpg";
        move_uploaded_file($imagen["tmp_name"], $folder_images . $imagen_videojuego);

        $query = " INSERT INTO videojuegos (nombre_videojuego, imagen_videojuego, descripcion) 
                   VALUES ('$nombre_videojuego', '$imagen_videojuego', '$descripcion')";

        $result = mysqli_query($db, $query);

        $idVideojuego = $db->insert_id;

        $plataformas = [];

        $plataformas[] = ($plataforma_xbox) ? "1" : null;
        $plataformas[] = ($plataforma_playstation) ? "2" : null;
        $plataformas[] = ($plataforma_nintendo) ? "3" : null;
        $plataformas[] = ($plataforma_pc) ? "4" : null;

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
        
                $query .= "('$idVideojuego', '$idPlataforma', $cantidad, $precio), ";
            }
        }
        
        $query = rtrim($query, ', ');
        
        $result = $db->query($query);
        
        if ($result) {
            header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php?mensaje=4');
            exit();
        }
        
    }
}


incluirTemplate('header');
?>

<main class="administracion_creacion contenedor">
    <h1>Agregar un nuevo producto</h1>
    
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="panel_administracion.php" class="boton-verde">Volver</a>

    <form action="" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Datos básicos</legend>
            <div class="campo">
                <label for="nombre_videojuego">Nombre videojuego</label>
                <input type="text" name="nombre_videojuego" id="nombre_videojuego" value="<?php echo $nombre_videojuego; ?>">
            </div>
            <div class="campo">
                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" id="descripcion">
                    <?php echo $descripcion; ?>
                </textarea>
            </div>
            <div class="campo">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg" name="imagen">
            </div>
        </fieldset>

        <fieldset>
            <legend>Datos para inventario</legend>
            <div class="campo">
                <p>Plataformas disponibles (debe seleccionar al menos una)</p>
                <label for="plataforma_xbox" class="plataforma">
                    <input type="checkbox" name="plataforma_xbox" id="plataforma_xbox"> Xbox
                </label>
                <label for="plataforma_playstation" class="plataforma">
                    <input type="checkbox" name="plataforma_playstation" id="plataforma_playstation"> PlayStation
                </label>
                <label for="plataforma_nintendo" class="plataforma">
                    <input type="checkbox" name="plataforma_nintendo" id="plataforma_nintendo"> Nintendo
                </label>
                <label for="plataforma_pc" class="plataforma">
                    <input type="checkbox" name="plataforma_pc" id="plataforma_pc"> PC
                </label>
            </div>
        </fieldset>
        <input type="submit" value="Agregar producto" class="boton-verde">
    </form>
</main>

<?php
$db->close();
incluirTemplate('footer');
?>

<!--Validar formularios-->
<script src="build/js/validacionesFormularios.js"></script>
</body>

</html>