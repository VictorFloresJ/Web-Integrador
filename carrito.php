<?php
require __DIR__ . "/includes/app.php";

incluirTemplate('header');
?>

<form class="compras contenedor">
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
            <input type="number" name="numeros-tarjeta" id="numeros-tarjeta">
        </div>
        <div class="campo">
            <label for="fecha-tarjeta">Fecha de expiración</label>
            <input type="month" name="fecha-tarjeta" id="fecha-tarjeta" class="fecha-tarjeta">
        </div>
        <div class="campo">
            <label for="cvv-tarjeta">CVV</label>
            <input type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" class="cvv-tarjeta">
        </div>
        <input type="submit" value="Comprar" class="boton-amarillo">
    </fieldset>
</form>


<?php
incluirTemplate('footer');
?>

<!-- Carrito  -->
<script src="build/js/carrito.js"></script>
</body>

</html>