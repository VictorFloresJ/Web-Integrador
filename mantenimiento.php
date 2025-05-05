<?php
require __DIR__ . "/includes/app.php";

incluirTemplate('header');
?>

<main class="contenedor sobre-nosotros">
    <div class="sobre-nosotros_contenido">
        <h1>        <i class="fa-solid fa-face-sad-tear"></i> No clavamos el aterrizaje</h1>
        <h4>Lo sentimos, actualmente nos encontramos dando mantenimiento, en poco tiempo estaremos de vuelta!</h4>
    </div>
    <div class="sobre-nosotros_imagen">
        <picture>
            <source srcset="build/img/nier.avif" type="image/avif">
            <source srcset="build/img/nier.webp" type="image/webp">
            <img loading="lazy" width="200" height="300" src="build/img/nier.jpg" alt="imagen juego">
        </picture>
    </div>
</main>

<?php
incluirTemplate('footer');
?>
</body>
</html>