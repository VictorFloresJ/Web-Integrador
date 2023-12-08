<?php
require __DIR__ . "/includes/app.php";

incluirTemplate('header');
?>

<main class="barra-busqueda fondo-cambiante">
    <h1>Busca tus juegos favoritos</h1>
    <form method="GET" action="busqueda.php">
        <input type="text" name="busqueda" placeholder="Ej: Nier Automata">
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</main><!--.barra_busqueda-->

<div class="bg-claro">
    <section class="slider contenedor">
        <div class="slider-encabezado">
            <h2>Nuestras mejores elecciones (Xbox)</h2>
        </div><!--.slider-encabezado-->
        <div class="slider-carrusel">
            <div class="carrusel-flecha-izquierda">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="carrusel">
                <?php 
                    $query = "SELECT * FROM inventario 
                              JOIN videojuegos ON inventario.id_videojuego = videojuegos.id   
                              JOIN plataformas ON inventario.id_plataforma = plataformas.id   
                              WHERE inventario.cantidad >= 1 
                              AND inventario.id_plataforma = 1 
                              ORDER BY RAND()
                              LIMIT 8";
                    $result = $db->query($query);
                ?>
                <?php while ($carruselCard = mysqli_fetch_assoc($result)) : ?>
                    <div class="carrusel-card">
                    <a href="videojuego.php?id_videojuego=<?php echo $carruselCard['id_videojuego'];?>&id_plataforma=<?php echo $carruselCard['id_plataforma'];?>">
                        <img src="images/<?php echo $carruselCard['imagen_videojuego'];?>" alt="foto juego">
                        <p><?php echo $carruselCard['nombre_videojuego'];?></p>
                        <p class="precio">$ <?php echo $carruselCard['precio'];?></p>
                    </a>
                </div><!--.carrusel-card-->
                <?php endwhile ?>
            </div><!--.carrusel-->
            <div class="carrusel-flecha-derecha">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div><!--.slider-carrusel-->
    </section><!--.slider-->
</div><!--.bg-claro-->

<div class="bg-oscuro">
    <section class="slider contenedor">
        <div class="slider-encabezado">
            <h2>Nuestras mejores elecciones (PlayStation)</h2>
        </div><!--.slider-encabezado-->
        <div class="slider-carrusel">
            <div class="carrusel-flecha-izquierda">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="carrusel">
                <?php 
                    $query = "SELECT * FROM inventario 
                              JOIN videojuegos ON inventario.id_videojuego = videojuegos.id   
                              JOIN plataformas ON inventario.id_plataforma = plataformas.id   
                              WHERE inventario.cantidad >= 1 
                              AND inventario.id_plataforma = 2 
                              ORDER BY RAND()
                              LIMIT 8";
      
                    $result = $db->query($query);
                ?>
                <?php while ($carruselCard = mysqli_fetch_assoc($result)) : ?>
                    <div class="carrusel-card">
                    <a href="videojuego.php?id_videojuego=<?php echo $carruselCard['id_videojuego'];?>&id_plataforma=<?php echo $carruselCard['id_plataforma'];?>">
                        <img src="images/<?php echo $carruselCard['imagen_videojuego'];?>" alt="foto juego">
                        <p><?php echo $carruselCard['nombre_videojuego'];?></p>
                        <p class="precio">$ <?php echo $carruselCard['precio'];?></p>
                    </a>
                </div><!--.carrusel-card-->
                <?php endwhile ?>
            </div><!--.carrusel-->
            <div class="carrusel-flecha-derecha">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div><!--.slider-carrusel-->
    </section><!--.slider-->
</div><!--.bg-oscuro-->

<div class="bg-claro">
    <section class="slider contenedor">
        <div class="slider-encabezado">
            <h2>Nuestras mejores elecciones (Nintendo)</h2>
        </div><!--.slider-encabezado-->
        <div class="slider-carrusel">
            <div class="carrusel-flecha-izquierda">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="carrusel">
                <?php 
                    $query = "SELECT * FROM inventario 
                              JOIN videojuegos ON inventario.id_videojuego = videojuegos.id   
                              JOIN plataformas ON inventario.id_plataforma = plataformas.id   
                              WHERE inventario.cantidad >= 1 
                              AND inventario.id_plataforma = 3
                              ORDER BY RAND()
                              LIMIT 8";
      
                    $result = $db->query($query);
                ?>
                <?php while ($carruselCard = mysqli_fetch_assoc($result)) : ?>
                    <div class="carrusel-card">
                    <a href="videojuego.php?id_videojuego=<?php echo $carruselCard['id_videojuego'];?>&id_plataforma=<?php echo $carruselCard['id_plataforma'];?>">
                        <img src="images/<?php echo $carruselCard['imagen_videojuego'];?>" alt="foto juego">
                        <p><?php echo $carruselCard['nombre_videojuego'];?></p>
                        <p class="precio">$ <?php echo $carruselCard['precio'];?></p>
                    </a>
                </div><!--.carrusel-card-->
                <?php endwhile ?>
            </div><!--.carrusel-->
            <div class="carrusel-flecha-derecha">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div><!--.slider-carrusel-->
    </section><!--.slider-->
</div><!--.bg-claro-->

<div class="bg-oscuro">
    <section class="slider contenedor">
        <div class="slider-encabezado">
            <h2>Nuestras mejores elecciones (PC)</h2>
        </div><!--.slider-encabezado-->
        <div class="slider-carrusel">
            <div class="carrusel-flecha-izquierda">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="carrusel">
                <?php 
                    $query = "SELECT * FROM inventario 
                              JOIN videojuegos ON inventario.id_videojuego = videojuegos.id   
                              JOIN plataformas ON inventario.id_plataforma = plataformas.id   
                              WHERE inventario.cantidad >= 1 
                              AND inventario.id_plataforma = 4
                              ORDER BY RAND()
                              LIMIT 8";
      
                    $result = $db->query($query);
                ?>
                <?php while ($carruselCard = mysqli_fetch_assoc($result)) : ?>
                    <div class="carrusel-card">
                    <a href="videojuego.php?id_videojuego=<?php echo $carruselCard['id_videojuego'];?>&id_plataforma=<?php echo $carruselCard['id_plataforma'];?>">
                        <img src="images/<?php echo $carruselCard['imagen_videojuego'];?>" alt="foto juego">
                        <p><?php echo $carruselCard['nombre_videojuego'];?></p>
                        <p class="precio">$ <?php echo $carruselCard['precio'];?></p>
                    </a>
                </div><!--.carrusel-card-->
                <?php endwhile ?>
            </div><!--.carrusel-->
            <div class="carrusel-flecha-derecha">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div><!--.slider-carrusel-->
    </section><!--.slider-->
</div><!--.bg-oscuro-->


<?php
$db->close();
incluirTemplate("footer");
?>
<!-- Banner  -->
<script src="build/js/banner.js"></script>
<!-- Slider  -->
<script src="build/js/carrusel.js"></script>
</body>

</html>