<?php
require __DIR__ . '/includes/app.php';

esAdmin();

$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : null;

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

$result = $db->query($query);

incluirTemplate('header');
?>

<main class="administracion contenedor">
    <div class="ocultar" id="elementosTotales">
        <?php echo mysqli_num_rows($result);?>
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
    <table class="table">
        <thead>
            <tr>
                <th id="idVideojuego">ID videojuego</th>
                <th id="idPlataforma">ID plataforma</th>
                <th id="nombreVideojuego">Nombre videojuego</th>
                <th id="nombrePlataforma">Nombre plataforma</th>
                <th id="cantidadKeys">Cantidad de keys</th>
                <th id="precioPKey">Precio p/key</th>
                <th id="acciones">Acciones</th>
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