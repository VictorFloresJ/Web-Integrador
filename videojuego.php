<?php 
require __DIR__ . "/includes/app.php";

incluirTemplate('header');
?>

    <main class="contenedor videojuego">
        <div class="videojuego_imagen">
            <img src="build/img/nier.jpg" alt="videojuego imagen">
        </div>
        <div class="videojuego_contenido">
            <h1 class="videojuego-titulo">Nier Autómata</h1>
            <p class="videojuego-precio">$70.99</p>
            <p class="videojuego-plataforma">Xbox</p>
            <p class="videojuego-descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic temporibus, beatae architecto magnam omnis, porro dolore eius dolorum id tempora natus alias iure reprehenderit expedita ipsum. Sunt quia natus quasi?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa veniam nobis et nam aspernatur quae alias consequatur quis a. Consectetur saepe facere unde cupiditate quam, corrupti tempora minima illum illo Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure accusantium perferendis molestias dolores, laboriosam odio, placeat nobis non quos commodi autem totam sapiente laudantium natus aliquid? Repudiandae cupiditate officia tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus repudiandae minima omnis dignissimos voluptatum! Ipsa architecto iusto ducimus veniam facere laborum. Dolor delectus in expedita accusamus illum reiciendis explicabo nostrum.</p>
            <form action="" method="GET">
                <button type="submit">
                    <img src="build/img/carrito-plus.svg" alt="icono carrito"> Comprar ahora
                </button>
            </form><!--.formulario-->
        </div>
    </main>

    <footer class="contenedor footer">
        <div class="footer_lista">
            <h4>Sobre <span class="txt-negritas">PirateKeys</span></h4>
            <ul class="footer_lista">
                <li>
                    <a href="sobrenosotros.php">Sobre nosotros</a>
                </li>
            </ul>
        </div>
        <div class="footer_lista">
            <h4>Ayuda</h4>
            <ul class="footer_lista">
                <li>
                    <a href="guia_activacion.php">¿Cómo activo una clave?</a>
                </li>
            </ul>
        </div>
        <div class="footer_iconos">
            <h4>Redes sociales</h4>
            <a href="https://www.facebook.com/" class="icon-link" target="_blank">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://www.instagram.com/" class="icon-link" target="_blank">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://twitter.com/home" class="icon-link" target="_blank">
                <i class="fa-brands fa-twitter"></i>
            </a>
            <a href="https://www.twitch.tv/" class="icon-link" target="_blank">
                <i class="fa-brands fa-twitch"></i>
            </a>
            <a href="https://www.youtube.com/" class="icon-link" target="_blank">
                <i class="fa-brands fa-youtube"></i>
            </a>
        </div><!--.footer_iconos-->
    </footer><!--.footer-->
    
    <!-- Modernizr  -->
    <script src="build/js/modernizr.js"></script>
    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/8951c38389.js" crossorigin="anonymous"></script>
</body>

</html>