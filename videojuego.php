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
          plataformas.nombre_plataforma AS plataforma, 
          inventario.precio AS precio
          FROM inventario
          JOIN videojuegos ON videojuegos.id = inventario.id_videojuego
          JOIN plataformas ON plataformas.id = inventario.id_plataforma
          WHERE videojuegos.id = $id_videojuego AND plataformas.id = $id_plataforma
         ";


$videojuego = mysqli_fetch_assoc($db->query($query));

if (!$videojuego) {
    header('Location: ' . $GLOBALS['raiz_sitio']);
    exit();
}

incluirTemplate('header');
?>

<main class="videojuego">
    <div class="videojuego_imagen">
        <img src="images/<?php echo $videojuego['imagen']; ?>" alt="videojuego imagen">
    </div>
    <div class="videojuego_contenido">
        <h1 class="videojuego-titulo"><?php echo $videojuego['nombre']; ?></h1>
        <p class="videojuego-precio">$ <?php echo $videojuego['precio']; ?></p>
        <p class="videojuego-plataforma_texto"> <?php echo $videojuego['plataforma']; ?></p>
        <pre class="videojuego-descripcion"><?php echo $videojuego['descripcion'] ?></pre>
        <button type="submit">
            <img src="build/img/carrito-plus.svg" alt="icono carrito"> Agregar al carrito
        </button>
    </div>
</main>

<?php
incluirTemplate('footer');
?>