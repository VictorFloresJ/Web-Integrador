<?php
require __DIR__ . "/includes/app.php";

$id_videojuego = filter_var($_GET["id_videojuego"], FILTER_VALIDATE_INT);
$id_plataforma = filter_var($_GET["id_plataforma"], FILTER_VALIDATE_INT);


if (!$id_videojuego || !$id_plataforma) {
    header('Location: ' . $GLOBALS['raiz_sitio']);
    exit();
}

$query = "SELECT videojuegos.nombre_videojuego AS nombre, 
          videojuegos.imagen_videojuego AS imagen, 
          videojuegos.descripcion AS descripcion, 
          videojuegos.id AS id, 
          plataformas.nombre_plataforma AS plataforma, 
          inventario.precio AS precio
          FROM inventario
          JOIN videojuegos ON videojuegos.id = inventario.id_videojuego
          JOIN plataformas ON plataformas.id = inventario.id_plataforma
          WHERE videojuegos.id = $id_videojuego AND plataformas.id = $id_plataforma
         ";


$videojuego = mysqli_fetch_assoc($db->query($query));

// if (!$videojuego) {
//     header('Location: ' . $GLOBALS['raiz_sitio']);
//     exit();
// }

incluirTemplate('header');
?>

<?php if (!$videojuego) : ?>
    <div id="no-encontro">
        <i class="fa-solid fa-face-sad-tear"></i>
        <h1>Lo sentimos, no hemos encontrado nada parecido</h1>
    </div>
<?php else : ?>
    <main class="videojuego" id="<?php echo $videojuego['id']; ?>">
        <div class="producto_imagen">
            <img src="images/<?php echo $videojuego['imagen']; ?>" alt="videojuego imagen">
        </div>
        <div class="videojuego_contenido">
            <h1 class="producto-titulo"><?php echo $videojuego['nombre']; ?></h1>
            <p class="precio" data-usd="<?php echo $videojuego['precio']; ?>">$<?php echo $videojuego['precio']; ?> USD</p>
            <p class="producto-plataforma"> <?php echo $videojuego['plataforma']; ?></p>
            <pre class="producto-descripcion"><?php echo $videojuego['descripcion'] ?></pre>
            <button type="submit" data-id="<?php echo $videojuego['id']; ?>" onclick="agregarAlCarrito(this)">
                <img src="./build/img/carrito-plus.svg" alt="icono carrito"> Agregar al carrito
            </button>
        </div>
    </main>
<?php endif ?>

<?php
incluirTemplate('footer');
?>

<!-- Agregar al carrito  -->
<script src="build/js/agregarCarrito.js"></script>

</body>

</html>