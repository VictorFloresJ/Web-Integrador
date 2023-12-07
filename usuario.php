<?php
require __DIR__ . "/includes/app.php";

estaAutenticado();

if (!isset($_SESSION)){
    session_start();
}

$esAdmin = $_SESSION['admin'];

incluirTemplate('header');
?>

<main class="administracion_creacion contenedor">
    <?php if ($esAdmin) : ?>
        <h1>Tu espacio personal: <?php echo $_SESSION['usuario']?> (Administrador)</h1>
    <?php else : ?>
        <h1>Tu espacio personal: <?php echo $_SESSION['usuario']?></h1>
    <?php endif; ?>

    <div class="usuario">
        <?php if ($esAdmin) : ?>
            <a href="panel_administracion.php" class="boton-verde">Visita el panel de administración</a>
        <?php endif; ?>
        <?php 
            // AQUI DEBO CONSULTAR POR LAS COMPRAS QUE HAYA HECHO EL USUARIO ACTUAL Y EN CASO DE REALIZAR UNA COMPRA GENERO EL HISTORIAL DE COMPRAS
        ?>
    </div>
</main>

<?php
incluirTemplate('footer');
?>
</body>
</html>