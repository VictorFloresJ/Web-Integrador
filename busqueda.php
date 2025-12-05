<?php
require __DIR__ . "/includes/app.php";

$nombreVideojuego = mysqli_escape_string($db, $_GET['busqueda']);

$query = "SELECT videojuegos.id AS id,
          plataformas.nombre_plataforma AS plataforma,
          videojuegos.nombre_videojuego AS nombre,
          plataformas.id AS idPlataforma,
          inventario.precio AS precio
          FROM inventario
          JOIN videojuegos ON videojuegos.id = inventario.id_videojuego
          JOIN plataformas ON plataformas.id = inventario.id_plataforma
          WHERE videojuegos.nombre_videojuego LIKE '%$nombreVideojuego%'";


$resultado = $db->query($query);

incluirTemplate('header');
?>

<?php if (mysqli_num_rows($resultado) < 1) : ?>
    <div id="no-encontro">
        <i class="fa-solid fa-face-sad-tear"></i>
        <h1>Lo sentimos, no hemos encontrado nada parecido</h1>
    </div>
<?php else : ?>
    <main class="contenedor busqueda-resultados">
        <h1>Esto es lo que encontré...</h1>

        <!--PARA EL PRIMER RESULTADO SIEMPRE SE HACE FUERA DEL WHILE-->
        <?php $row1 = mysqli_fetch_assoc($resultado); ?>
        <img src="images/<?php echo $row1['imagen'] ?>" alt="imagen asociada">
        <a href="videojuego.php?id_videojuego=<?php echo $row1['id']; ?>&id_plataforma=<?php echo $row1['idPlataforma']; ?>" class="busqueda-resultado">
            <p class="resultado-precio">$<?php echo $row1['precio']; ?></p>
            <h2 class="resultado-titulo"><?php echo $row1['nombre']; ?></h2>
            <?php
            $idPlataforma = $row1['idPlataforma'];
            $plataforma = '';
            switch ($idPlataforma) {
                case '1':
                    $plataforma = '<img src="build/img/xbox_logo.png" alt="plataforma logo">';
                    break;
                case '2':
                    $plataforma = '<img src="build/img/playstation_logo.png" alt="plataforma logo">';
                    break;
                case '3':
                    $plataforma = '<img src="build/img/nintendo_logo.png" alt="plataforma logo">';
                    break;
                case '4':
                    $plataforma = '<img src="build/img/steam_logo.png" alt="plataforma logo">';
                    break;
            }
            ?>
            <?php echo $plataforma; ?>
        </a>

        <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
            <a href="videojuego.php?id_videojuego=<?php echo $row['id']; ?>&id_plataforma=<?php echo $row['idPlataforma']; ?>" class="busqueda-resultado">
            <p class="resultado-precio">$<?php echo $row1['precio']; ?></p>
            <h2 class="resultado-titulo"><?php echo $row1['nombre']; ?></h2>
                <?php
                $idPlataforma = $row['idPlataforma'];
                $plataforma = '';
                switch ($idPlataforma) {
                    case '1':
                        $plataforma = '<img src="build/img/xbox_logo.png" alt="plataforma logo">';
                        break;
                    case '2':
                        $plataforma = '<img src="build/img/playstation_logo.png" alt="plataforma logo">';
                        break;
                    case '3':
                        $plataforma = '<img src="build/img/nintendo_logo.png" alt="plataforma logo">';
                        break;
                    case '4':
                        $plataforma = '<img src="build/img/steam_logo.png" alt="plataforma logo">';
                        break;
                }
                ?>
                <?php echo $plataforma; ?>
            </a>
        <?php endwhile; ?>
    </main>
<?php endif ?>

<?php
incluirTemplate('footer');
?>
</body>

</html>