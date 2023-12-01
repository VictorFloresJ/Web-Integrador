<?php 
require __DIR__ . "/includes/app.php";

incluirTemplate('header');
?>

    <form class="contenedor compras">
        <fieldset class="compras_productos">
            <div class="compras_videojuego entrar-izquierda">
                <div class="videojuego_imagen">
                    <img src="/build/img/nier.jpg" alt="videojuego imagen">
                </div>
                <div class="videojuego_contenido">
                    <h1 class="videojuego-titulo">Nier Autómata</h1>
                    <p class="videojuego-precio">$70.99</p>
                    <p class="videojuego-plataforma">Xbox</p>
                    <label for="cantidad" class="videojuego-cantidad">Cantidad</label>
                    <select name="cantidad" id="cantidad">
                        <option value="1" selected>1</option>
                        <option value="2" selected>2</option>
                        <option value="3" selected>3</option>
                        <option value="4" selected>4</option>
                        <option value="5" selected>5</option>
                        <option value="6" selected>6</option>
                        <option value="7" selected>7</option>
                        <option value="8" selected>8</option>
                        <option value="9" selected>9</option>
                    </select>
                </div>
            </div>
            <div class="compras_videojuego entrar-izquierda">
                <div class="videojuego_imagen">
                    <img src="/build/img/nier.jpg" alt="videojuego imagen">
                </div>
                <div class="videojuego_contenido">
                    <h1 class="videojuego-titulo">Nier Autómata</h1>
                    <p class="videojuego-precio">$70.99</p>
                    <p class="videojuego-plataforma">Xbox</p>
                    <label for="cantidad" class="videojuego-cantidad">Cantidad</label>
                    <select name="cantidad" id="cantidad">
                        <option value="1" selected>1</option>
                        <option value="2" selected>2</option>
                        <option value="3" selected>3</option>
                        <option value="4" selected>4</option>
                        <option value="5" selected>5</option>
                        <option value="6" selected>6</option>
                        <option value="7" selected>7</option>
                        <option value="8" selected>8</option>
                        <option value="9" selected>9</option>
                    </select>
                </div>
            </div>
            <div class="compras_videojuego entrar-izquierda">
                <div class="videojuego_imagen">
                    <img src="/build/img/nier.jpg" alt="videojuego imagen">
                </div>
                <div class="videojuego_contenido">
                    <h1 class="videojuego-titulo">Nier Autómata</h1>
                    <p class="videojuego-precio">$70.99</p>
                    <p class="videojuego-plataforma">Xbox</p>
                    <label for="cantidad" class="videojuego-cantidad">Cantidad</label>
                    <select name="cantidad" id="cantidad">
                        <option value="1" selected>1</option>
                        <option value="2" selected>2</option>
                        <option value="3" selected>3</option>
                        <option value="4" selected>4</option>
                        <option value="5" selected>5</option>
                        <option value="6" selected>6</option>
                        <option value="7" selected>7</option>
                        <option value="8" selected>8</option>
                        <option value="9" selected>9</option>
                    </select>
                </div>
            </div>
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
                <input type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx"  class="cvv-tarjeta">
            </div>
            <input type="submit" value="Comprar" class="boton-amarillo">
        </fieldset>
    </form>

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