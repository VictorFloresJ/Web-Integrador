<?php
require __DIR__ . "/includes/app.php";

$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : null;

$errores = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $patronFecha = "/^(0[1-9]|1[0-2])\/\d{2}$/";
    $patronTarjeta = "/^\d{4}-\d{4}-\d{4}-\d{4}$/";
    $patronCVV = "/^\d{1,4}$/";

    $titular = isset($_POST['titular']) ? mysqli_escape_string($db, $_POST['titular']) : null;
    $tarjeta = isset($_POST['numeros-tarjeta']) ? mysqli_escape_string($db, $_POST['numeros-tarjeta']) : null;
    $fechaTarjeta = isset($_POST['fecha-tarjeta']) ? mysqli_escape_string($db, $_POST['fecha-tarjeta']) : null;
    $cvvTarjeta = isset($_POST['cvv']) ? mysqli_escape_string($db, $_POST['cvv']) : null;

    $errores[] = !$titular ? 'Debes agregar al titular de la tarjeta' : null;
    $errores[] = !$tarjeta ? 'Debes agregar el número de la tarjeta' : null;
    $errores[] = !$fechaTarjeta ? 'Debes agregar la fecha de expiración de la tarjeta' : null;
    $errores[] = !$cvvTarjeta ? 'Debes agregar el CVV de la tarjeta' : null;
    $errores[] = ($fechaTarjeta && !preg_match($patronFecha, $fechaTarjeta)) ? 'El formato de la fecha no es el esperado (se espera mes/año)' : null;
    $errores[] = ($tarjeta && !preg_match($patronTarjeta, $tarjeta)) ? 'El formato de la tarjeta no es el esperado (se espera XXXX-XXXX-XXXX-XXXX)' : null;
    $errores[] = ($cvvTarjeta && !preg_match($patronCVV, $cvvTarjeta)) ? 'El formato del CVV no es el esperado (se espera 1234 o 123)' : null;

    $plataformas = [
        'Xbox' => 1,
        'PlayStation' => 2,
        'Nintendo' => 3,
        'PC' => 4
    ];

    $productosSolicitatos = [];

    foreach ($_POST as $clave => $valor) {

        if (preg_match('/cantidad_(\d+)_(\w+)/', $clave, $coincidencias)) {
            $idVideojuego = $coincidencias[1];
            $nombrePlataforma = $coincidencias[2];

            $idPlataforma = isset($plataformas[$nombrePlataforma]) ? $plataformas[$nombrePlataforma] : null;

            if ($idPlataforma !== null) {
                $productosSolicitatos["$idVideojuego-$idPlataforma"] = $valor;
            }
        }
    }

    $errores[] = empty($productosSolicitatos) ? 'No se puede continuar con el proceso de compra si no se tienen productos en el carrito' : null;

    $errores = array_filter($errores);

    if (empty($errores)) {
        $queryData = http_build_query([
            'productosSolicitatos' => $productosSolicitatos,
            'numeroTarjeta' => $tarjeta
        ]);

        header("Location: " . $GLOBALS['raiz_sitio'] . "comprar.php?$queryData");
        exit();
    }
}

incluirTemplate('header');
?>
<main class="contenedor compras-contenedor">

    <?php if ($mensaje == '1') : ?>
        <div class="alerta error"> <?php echo 'ERROR EN LA BASE DE DATOS. Si el error persiste contacte a soporte'; ?> </div>
    <?php elseif ($mensaje == '2') : ?>
        <div class="alerta exito"> <?php echo 'Compra realizada correctamente. Consulta tu perfil para ver tu(s) claves'; ?> </div>
    <?php endif; ?>

    <h1>Agregar un nuevo producto</h1>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="compras " method="POST">

        <fieldset class="compras_productos">

        </fieldset>

        <fieldset class="compras_checkout entrar-derecha">
            <p>Introduce tus datos y realiza el pago</p>
            <div class="campo entrar-derecha">
                <label for="titular-tarjeta">Titular de la tarjeta</label>
                <input type="text" name="titular" id="titular">
            </div>
            <div class="campo">
                <label for="numeros-tarjeta">Números de la tarjeta</label>
                <input type="text" name="numeros-tarjeta" id="numeros-tarjeta" placeholder="XXXX-XXXX-XXXX-XXXX">
            </div>
            <div class="campo">
                <label for="fecha-tarjeta">Fecha de expiración</label>
                <input type="month" name="fecha-tarjeta" id="fecha-tarjeta" class="fecha-tarjeta">
            </div>
            <div class="campo">
                <label for="cvv-tarjeta">CVV</label>
                <input type="text" name="cvv" id="cvv-tarjeta" maxlength="4">
            </div>
            <?php if (isset($_SESSION['login'])) : ?>
                <input type="submit" value="Proceder al pago" class="boton-amarillo">
            <?php else : ?>
                <a class="boton-rojo txt-center txt-negritas" href="login.php">Para proceder al pago, inicia sesión</a>
            <?php endif; ?>
        </fieldset>
    </form>

</main>


<?php
incluirTemplate('footer');
?>

<?php if ($mensaje == '2') : ?>
    <script src="build/js/limpiarCarrito.js"></script>
<?php endif; ?>

<!-- Carrito  -->
<script src="build/js/carrito.js"></script>
<!-- Carrito  -->
<script src="build/js/eliminarDelCarrito.js"></script>
<!-- Validar compra  -->
<script src="build/js/validacionCompra.js"></script>
</body>

</html>