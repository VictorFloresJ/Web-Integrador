<?php
require __DIR__ . '/includes/app.php';

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
        <tbody>
            <?php while ($producto = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td class="producto-idVideojuego"><?php echo $producto['idVideojuego']; ?></td>
                    <td class="producto-idPlataforma"><?php echo $producto['idPlataforma']; ?></td>
                    <td class="producto-nombreVideojuego"><?php echo $producto['nombreVideojuego']; ?></td>
                    <td class="producto-nombrePlataforma"><?php echo $producto['nombrePlataforma']; ?></td>
                    <td class="producto-cantidad"><?php echo $producto['cantidad']; ?></td>
                    <td class="producto-precio"><?php echo $producto['precio']; ?></td>
                    <td class="producto-acciones">
                        <a href="modificar.php?idVideojuego=<?php echo $producto['idVideojuego']; ?>&idPlataforma=<?php echo $producto['idPlataforma'];?>" class="boton-amarillo">Modificar registro</a>
                        <a href="eliminar.php?idVideojuego=<?php echo $producto['idVideojuego']; ?>&idPlataforma=<?php echo $producto['idPlataforma'];?>" class="boton-rojo">Eliminar registro</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</main>

<?php
$db->close();
incluirTemplate('footer');
?>

</body>

</html>