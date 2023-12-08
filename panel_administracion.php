<?php
require __DIR__ . '/includes/app.php';

esAdmin();

$vieneDePost = false;

$xbox_on = false;
$playstation_on = false;
$nintendo_on = false;
$pc_on = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $xbox_on = isset($_POST['xbox']) ? true : false;
    $playstation_on = isset($_POST['playstation']) ? true : false;
    $nintendo_on = isset($_POST['nintendo']) ? true : false;
    $pc_on = isset($_POST['pc']) ? true : false;

    $whereConditions = [];
    if ($xbox_on) {
        $whereConditions[] = "inventario.id_plataforma = 1";
    }
    if ($playstation_on) {
        $whereConditions[] = "inventario.id_plataforma = 2";
    }
    if ($nintendo_on) {
        $whereConditions[] = "inventario.id_plataforma = 3";
    }
    if ($pc_on) {
        $whereConditions[] = "inventario.id_plataforma = 4";
    }

    $vieneDePost = true;
}

$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : null;

if ($vieneDePost && ($xbox_on || $playstation_on || $nintendo_on || $pc_on)) {
    // Construir la cláusula WHERE basada en las condiciones
    $whereClause = empty($whereConditions) ? '' : ' WHERE ' . implode(' OR ', $whereConditions);

    $query = "SELECT inventario.id_videojuego AS idVideojuego,
          videojuegos.nombre_videojuego AS nombreVideojuego,
          inventario.id_plataforma AS idPlataforma,
          plataformas.nombre_plataforma AS nombrePlataforma,
          inventario.cantidad AS cantidad,
          inventario.precio AS precio
          FROM inventario
          JOIN videojuegos ON inventario.id_videojuego = videojuegos.id
          JOIN plataformas ON inventario.id_plataforma = plataformas.id
          $whereClause
          ORDER BY idVideojuego, idPlataforma";
} else {
    $query = "SELECT inventario.id_videojuego AS idVideojuego,
          videojuegos.nombre_videojuego AS nombreVideojuego,
          inventario.id_plataforma AS idPlataforma,
          plataformas.nombre_plataforma AS nombrePlataforma,
          inventario.cantidad AS cantidad,
          inventario.precio AS precio
          FROM inventario
          JOIN videojuegos ON inventario.id_videojuego = videojuegos.id
          JOIN plataformas ON inventario.id_plataforma = plataformas.id
          ORDER BY idVideojuego, idPlataforma";
}

$result = $db->query($query);

incluirTemplate('header');
?>

<main class="administracion contenedor">
    <div class="ocultar" id="elementosTotales">
        <?php echo mysqli_num_rows($result); ?>
    </div>

    <?php if ($mensaje == '1') : ?>
        <div class="alerta error"> <?php echo 'ERROR EN LA BASE DE DATOS. Si el error persiste contacte a soporte'; ?> </div>
    <?php elseif ($mensaje == '2') : ?>
        <div class="alerta exito"> <?php echo 'KEY generada correctamente'; ?> </div>
    <?php elseif ($mensaje == '3') : ?>
        <div class="alerta exito"> <?php echo 'Inventario actualizado correctamente'; ?> </div>
    <?php elseif ($mensaje == '4') : ?>
        <div class="alerta exito"> <?php echo 'Producto generado correctamente'; ?> </div>
    <?php elseif ($mensaje == '5') : ?>
        <div class="alerta exito"> <?php echo 'Producto (y sus Keys) eliminado correctamente'; ?> </div>
    <?php endif; ?>

    <h1>Bienvenido al panel de Administración</h1>

    <a href="crear.php" class="boton-verde">Agregar videojuego</a>
    <form action="" method="POST">
        <div class="campo">
            <label for="xbox">
                <input type="checkbox" name="xbox" id="xbox" <?php echo ($xbox_on) ? 'checked' : '' ?>> Xbox
            </label>
        </div>
        <div class="campo">
            <label for="playstation">
                <input type="checkbox" name="playstation" id="playstation" <?php echo $playstation_on ? 'checked' : '' ?>> PlayStation
            </label>
        </div>
        <div class="campo">
            <label for="nintendo">
                <input type="checkbox" name="nintendo" id="nintendo" <?php echo $nintendo_on ? 'checked' : '' ?>> Nintendo
            </label>
        </div>
        <div class="campo">
            <label for="pc">
                <input type="checkbox" name="pc" id="pc" <?php echo $pc_on ? 'checked' : '' ?>> PC
            </label>
        </div>
        <input type="submit" value="Refrescar datos" class="w-100">
    </form>
    <table class="table" id="miTabla">
        <thead>
            <tr>
                <th id="idVideojuego" data-column="0">ID videojuego</th>
                <th id="idPlataforma" data-column="1">ID plataforma</th>
                <th id="nombreVideojuego" data-column="2">Nombre videojuego</th>
                <th id="nombrePlataforma" data-column="3">Nombre plataforma</th>
                <th id="cantidadKeys" data-column="4">Cantidad de keys</th>
                <th id="precioPKey" data-column="5">Precio p/key</th>
                <th id="acciones" data-column="6">Acciones</th>
            </tr>
        </thead>
        <tbody id="elementosMostrados">
            <?php
            $contador = 0;
            while ($producto = mysqli_fetch_assoc($result)) :
            ?>
                <tr class="producto producto-ocultar <?php if ($contador >= 15) echo 'oculto ocultar'; ?>">
                    <td class="producto-idVideojuego"><?php echo $producto['idVideojuego']; ?></td>
                    <td class="producto-idPlataforma"><?php echo $producto['idPlataforma']; ?></td>
                    <td class="producto-nombreVideojuego"><?php echo $producto['nombreVideojuego']; ?></td>
                    <td class="producto-nombrePlataforma"><?php echo $producto['nombrePlataforma']; ?></td>
                    <td class="producto-cantidad"><?php echo $producto['cantidad']; ?></td>
                    <td class="producto-precio"><?php echo $producto['precio']; ?></td>
                    <td class="producto-acciones">
                        <a href="modificar.php?idVideojuego=<?php echo $producto['idVideojuego']; ?>" class="boton-amarillo">Modificar registro</a>
                        <a href="eliminar.php?idVideojuego=<?php echo $producto['idVideojuego']; ?>&idPlataforma=<?php echo $producto['idPlataforma']; ?>" class="boton-rojo">Eliminar registro</a>
                        <a href="generar_key.php?idVideojuego=<?php echo $producto['idVideojuego']; ?>&idPlataforma=<?php echo $producto['idPlataforma']; ?>" class="boton-verde">Generar Key</a>
                    </td>
                </tr>
            <?php
                $contador++;
            endwhile;
            ?>
        </tbody>
    </table>

    <button id="verMasBtn" class="boton-verde">Ver más</button>

</main>
<?php
$db->close();
incluirTemplate('footer');
?>
<!-- Listado dinámico  -->
<script src="build/js/listadoDinamico.js"></script>
</body>

</html>