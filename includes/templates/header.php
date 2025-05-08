<?php 
if (!isset($_SESSION)){
    session_start();
}

$autenticado = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="build/css/app.css">
</head>

<body>
    <header class="header">
        <a href="index.php" class="logo">
            <img loading="lazy" src="./build/img/logo.png" alt="logo">
        </a>
        <div class="header-derecha">

        <div class="cambio-divisas">
            <label for="currency-select">Divisa:</label>
            <select id="currency-select">
                <!-- Incluir el archivo PHP para obtener las opciones de divisas -->
                <?php include('obtenerDivisas.php'); ?>
            </select>
        </div>


            <a href="<?php echo (!$autenticado) ? 'login.php' : 'usuario.php'; ?>">
                <div class="usuario-icono">
                    <i class="fa-solid fa-user"></i>
                </div>
                <?php if (!$autenticado) : ?>
                    <p>Iniciar sesión</p>
                <?php else : ?>
                    <p>Hola, <?php echo $_SESSION['usuario']; ?></p>
                <?php endif ?>
            </a>
            <a href="carrito.php" class="carrito-icono">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
        </div><!--.header-derecha-->
    </header><!--.header-->

    <nav class="navegacion">
        <a href="categoria.php?id=1">Xbox</a>
        <a href="categoria.php?id=2">PlayStation</a>
        <a href="categoria.php?id=3">Nintendo</a>
        <a href="categoria.php?id=4">PC</a>
    </nav><!--.navegacion-->

    <script src="build/js/cambiarDivisa.js"></script>
    <script src="build/js/ajustarPrecioDivisa.js"></script>