<?php
require __DIR__ . "/includes/app.php";

estaAutenticado();

if (!isset($_SESSION)) {
    session_start();
}

$esAdmin = $_SESSION['admin'];

incluirTemplate('header');
?>

<main class="administracion_creacion contenedor">
    <?php if ($esAdmin) : ?>
        <h1>Tu espacio personal: <?php echo $_SESSION['usuario'] ?> (Administrador)</h1>
    <?php else : ?>
        <h1>Tu espacio personal: <?php echo $_SESSION['usuario'] ?></h1>
    <?php endif; ?>

    <div class="usuario">
        <a href="logout.php" class="boton-verde">Cierra sesión</a>
        <br>
        <?php if ($esAdmin) : ?>
            <a href="panel_administracion.php" class="boton-verde">Visita el panel de administración</a>
        <?php endif; ?>
        <?php
        $id = $_SESSION['id'];
        $query = "SELECT compras.clave_compra AS clave,
                  videojuegos.nombre_videojuego AS nombreVideojuego,
                  plataformas.nombre_plataforma AS nombrePlataforma,
                  compras.fecha_compra AS fecha,
                  compras.clave AS claveVideojuego,
                  compras.total AS total,
                  compras.precio AS precio
                  FROM compras 
                  JOIN videojuegos ON videojuegos.id = compras.id_videojuego
                  JOIN plataformas ON plataformas.id = compras.id_plataforma
                  WHERE compras.id_usuario = '$id'";
        $resultado = $db->query($query);
        ?>
        <?php if (mysqli_num_rows($resultado) > 0) : ?>
            <div class="totales-historial">
                <p>Tu historial de compras</p>
                <?php while ($compra = mysqli_fetch_assoc($resultado)) : ?>
                    <div class="total-producto">
                        <p><span class="txt-negritas">Clave de compra: </span><?php echo $compra['clave']; ?></p>
                        <p><span class="txt-negritas">Nombre videojuego: </span><?php echo $compra['nombreVideojuego']; ?></p>
                        <p><span class="txt-negritas">Plataforma: </span><?php echo $compra['nombrePlataforma']; ?></p>
                        <p><span class="txt-negritas">Fecha de compra: </span><?php echo $compra['fecha']; ?></p>
                        <p><span class="txt-negritas txt-verde">Tu clave: </span><?php echo $compra['claveVideojuego']; ?></p>
                        <p><span class="txt-negritas">Precio de la clave: </span><?php echo $compra['precio']; ?></p>
                        <p><span class="txt-negritas">Total: </span><?php echo $compra['total']; ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
incluirTemplate('footer');
?>
</body>

</html>