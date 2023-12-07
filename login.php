<?php 
require __DIR__ . '/includes/app.php';

$errores = [];
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = ($_POST['email']) ? mysqli_real_escape_string($db, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) : null;
    $password = ($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : null;

    $errores[] = (!$email) ? 'E-Mail inválido' : null;
    $errores[] = (!$password) ? 'Contraseña inválida' : null;

    $errores = array_filter($errores);
    if(empty($errores)) {
        $query = "SELECT usuarios.nombre_usuario AS nombreUsuario,
                  usuarios.email AS email,
                  usuarios.password AS password,
                  usuarios.admin AS privilegios
                  FROM usuarios
                  WHERE usuarios.email = '$email' AND usuarios.password = '$password'";
        
        $resultado = $db->query($query);

        if (mysqli_num_rows($resultado) == 1) {
            $auth = mysqli_fetch_assoc($resultado);

            session_start();
            $_SESSION['usuario'] = $auth['nombreUsuario'];
            $_SESSION['login'] = true;
            $_SESSION['admin'] = ($auth['privilegios'] == '1') ? true : false;

            header('Location: ' . $GLOBALS['raiz_sitio'] . 'panel_administracion.php');
        }
    }
}
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
    <header class="header header-login">
        <a href="index.php" class="logo">
            <img loading="lazy" src="./build/img/logo.png" alt="logo">
        </a>
    </header>

    <div class="posicionador">
        <main class="login">
            <div class="login_bienvenida">
                <p>
                    ¡Hola de nuevo!<br>
                    ¡Bienvenido otra vez!
                </p>
            </div><!--.login_bienvenida-->
            <div class="login_formulario">
                <form class="formulario" method="POST">
                    <fieldset class="informacion">
                        <legend>Iniciar sesión</legend>
    
                        <div class="campo">
                            <label for="email">E-Mail</label>
                            <input type="email" name="email" id="email" placeholder="Ingresa tu E-Mail">
                        </div>

                        <div class="campo">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña">
                        </div>
    
                        <input type="submit" value="Iniciar sesión" class="boton-amarillo-block">
                    </fieldset>
                </form><!--.formulario-->
            </div><!--.login_formulario-->
        </main><!--.login-->
    </div>

    <!-- Modernizr  -->
    <script src="build/js/modernizr.js"></script>
    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/8951c38389.js" crossorigin="anonymous"></script>
</body>

</html>