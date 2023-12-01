<?php
require __DIR__ . "/includes/app.php";

$id_plataforma = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if (!$id_plataforma) {
    header('Location: ' . $GLOBALS['raiz_sitio']);
    exit();
}

$query = "SELECT videojuegos.nombre_videojuego AS nombre, inventario.precio AS precio, videojuegos.imagen_videojuego AS imagen
          FROM inventario
          JOIN videojuegos ON inventario.id_videojuego = videojuegos.id
          JOIN plataformas ON inventario.id_plataforma = plataformas.id
          WHERE plataformas.id = $id_plataforma";

$resultado = $db->query($query);

if (mysqli_num_rows($resultado) == 0) {
    header('Location: ' . $GLOBALS['raiz_sitio']);
    exit();
}

$cantidadJuegos = mysqli_num_rows($resultado);
$cantidadPaginas = ceil($cantidadJuegos / 20);

incluirTemplate('header');
?>

<main class="contenedor paginacion">
    <div class="productos">
        <?php for ($i = 1; $i <= $cantidadPaginas; $i++) : ?>
            <div class="productos-pagina">
                <?php $j = 0; ?>
                <?php while ($j < 20 && $videojuego = mysqli_fetch_assoc($resultado)) : ?>
                    <div class="producto">
                        <div class="producto_imagen">
                            <img src="images/<?php echo $videojuego['imagen']; ?>" alt="imagen producto" loading="lazy">
                        </div><!--.imagen-->
                        <div class="producto_contenido">
                            <p class="producto-titulo"><?php echo $videojuego['nombre']; ?></p>
                            <p class="precio">$<?php echo $videojuego['precio']; ?></p>
                            <button type="submit">
                                <img src="./build/img/carrito-plus.svg" alt="icono carrito"> Agregar al carrito
                            </button>
                        </div><!--.contenido-->
                    </div><!--.producto-->
                    <?php $j++; ?>
                <?php endwhile; ?>
            </div><!--.pagina-->
        <?php endfor; ?>
    </div><!--.productos-->

    <div class="flechas">
        <div class="paginador-flecha-izquierda">
            <i class="fa-solid fa-chevron-left"></i>
        </div>
        <div class="paginador-flecha-derecha">
            <i class="fa-solid fa-chevron-right"></i>
        </div>
    </div><!--.flechas-->
</main><!--.contenedor-->

<?php
$db->close();
incluirTemplate('footer');
?>