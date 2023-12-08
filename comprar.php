<?php
require __DIR__ . '/includes/app.php';

estaAutenticado();

$productosSolicitatos = isset($_GET['productosSolicitatos']) ? $_GET['productosSolicitatos'] : [];
$numeroTarjeta = isset($_GET['numeroTarjeta']) ? $_GET['numeroTarjeta'] : '';


$where = '';

foreach ($productosSolicitatos as $clave => $cantidad) {
    $partes = explode('-', $clave);

    $idVideojuego = $partes[0];
    $idPlataforma = $partes[1];

    $where .= " (id_videojuego = $idVideojuego AND id_plataforma = $idPlataforma) OR";
}

$where = rtrim($where, ' OR');

if (!empty($where)) {
    $query = "SELECT inventario.id_videojuego AS idVideojuego, 
                 inventario.id_plataforma AS idPlataforma, 
                 videojuegos.nombre_videojuego AS nombreVideojuego,
                 inventario.cantidad AS cantidad,
                 inventario.precio AS precio,
                 plataformas.nombre_plataforma AS nombrePlataforma
                 FROM inventario 
                 JOIN videojuegos ON inventario.id_videojuego = videojuegos.id
                 JOIN plataformas ON inventario.id_plataforma = plataformas.id
                 WHERE $where";

    $resultado = $db->query($query);
} else {
    header("Location: " . $GLOBALS['raiz_sitio'] . "carrito.php?");
    exit();
}

$productos = [];

while ($producto = mysqli_fetch_assoc($resultado)) {
    $productos[] = $producto;
}

$errores = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aux'])) {
    foreach ($productos as $productoActual) {
        if ($productoActual['cantidad'] < $productosSolicitatos[$productoActual['idVideojuego'] . '-' . $productoActual['idPlataforma']]) {
            $errores[] = 'Lo sentimos, no contamos con existencias suficientes para tu siguiente pedido: ' . $productoActual['nombreVideojuego'] . ' intenta más tarde';
        }
    }

    /*
    Por cada producto se realiza la siguiente transacción:
    1. Seleccionar las claves de la tabla keys (SELECT)
    2. Generar orden de compra por cada clave (INSERT)
    3. Eliminar las claves que hayan sido compradas de la tabla keys (DELETE)
    4. Actualizar cantidad de claves en inventario (UPDATE)
    */
    if (empty($errores)) {
        try {
            // Comenzar la transacción principal
            $db->begin_transaction();
            
            foreach ($productos as $productoActual) {
                // 1. Seleccionar las claves de la tabla KEYS
                $query = "SELECT `keys`.clave AS clave 
                          FROM `keys` 
                          WHERE `keys`.id_videojuego = " . $productoActual['idVideojuego'] . 
                          " AND  `keys`.id_plataforma = " . $productoActual['idPlataforma'] .
                          " LIMIT " . $productosSolicitatos[$productoActual['idVideojuego'] . '-' . $productoActual['idPlataforma']];
                
                $result = $db->query($query);

                $claves = [];
                while ($clave = mysqli_fetch_assoc($result)) {
                    $claves[] = $clave['clave'];
                }

                // 2 y 3. Generar orden de compra por cada clave y eliminarla
                $usuario = $_SESSION['id'];
                $fechaCompra = date("Y-m-d H:i:s");
                $idVideojuegoActual = $productoActual['idVideojuego'];
                $idPlataformaActual = $productoActual['idPlataforma'];

                $precioUnitario = $productoActual['precio'];
                $cantidad = $productosSolicitatos[$productoActual['idVideojuego'] . '-' . $productoActual['idPlataforma']];

                $total = floatval($precioUnitario) * floatval($cantidad);


                foreach($claves as $clave) {
                    $ordenCompra = md5(uniqid(rand(), true));
 
                    $query = "INSERT INTO compras (id_usuario, clave_compra, id_videojuego, id_plataforma, tarjeta, total, fecha_compra, clave) 
                              VALUES ('$usuario', '$ordenCompra', '$idVideojuegoActual', '$idPlataformaActual', '$numeroTarjeta', '$total', '$fechaCompra', '$clave')";
                    $db->query($query);
                    
                    $query = "DELETE FROM `keys` WHERE `keys`.clave = '$clave'";
                    $db->query($query);
                    
                }
                
                // 4. Actualizar inventario            
                $temp1 = $productoActual['cantidad'];
                $temp2 = $productosSolicitatos[$productoActual['idVideojuego'] . '-' . $productoActual['idPlataforma']];
                $inventarioActualizado =  intval($temp1) - intval($temp2);
                
                $query = "UPDATE inventario SET cantidad = '$inventarioActualizado' WHERE inventario.id_videojuego = '$idVideojuegoActual' AND inventario.id_plataforma = '$idPlataformaActual'";
                $db->query($query);
            }

            $db->commit();
            
            header('Location: ' . $GLOBALS['raiz_sitio'] . 'carrito.php?mensaje=2');
            exit();
        } catch (Exception $e) {
            debug($e);
            $db->rollback();
            header('Location: ' . $GLOBALS['raiz_sitio'] . 'carrito.php?mensaje=1');
            exit();
        }
    }
}

incluirTemplate('header');
?>
<main class="contenedor compras-contenedor">
    <h1>Continúa con tu proceso de compras aquí</h1>

    <a href="carrito.php" class="boton-verde w-100">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <div class="totales">
        <p id="mensaje1">Antes de confirmar la compra, por favor revisa el total de tu pedido</p>
        <?php foreach ($productos as $productoActual) : ?>
            <div class="total-producto">
                <p class="txt-negritas">Videojuego: </p>
                <p><?php echo $productoActual['nombreVideojuego']; ?></p>
                <p class="txt-negritas">Precio por Key: </p>
                <p><?php echo $productoActual['precio']; ?></p>
                <p class="txt-negritas">Cantidad: </p>
                <p><?php echo $productosSolicitatos[$productoActual['idVideojuego'] . '-' . $productoActual['idPlataforma']]; ?></p>
                <p class="txt-negritas">Total: </p>
                <?php
                $precioUnitario = $productoActual['precio'];
                $cantidad = $productosSolicitatos[$productoActual['idVideojuego'] . '-' . $productoActual['idPlataforma']];

                $total = floatval($precioUnitario) * floatval($cantidad);
                ?>
                <p><?php echo $total; ?></p>

            </div>
        <?php endforeach; ?>
        <p>Te recordamos que los pedidos están sujetos a existencias, por lo que en caso de no contar con todo lo que solicitas, la transacción no se completará</p>
    </div>

    <form method="POST">
        <input type="hidden" name="aux" value="on">
        <input type="submit" value="Confirmar compra" class="boton-verde" id="checkout-boton">
    </form>
</main>
<?php
incluirTemplate('footer');
?>
</body>

</html>