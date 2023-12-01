<?php
require __DIR__ . "/includes/app.php";

incluirTemplate('header');
?>

<main class="contenedor guia">
    <div class="guia_contenido">
        <h1>¿Cómo activo mis claves?</h1>
        <p><span class="txt-italica txt-negritas">Una vez has recibido tu clave en tu correo electrónico</span> el
            proceso de activación es muy sencillo.</p>
        <p>Independientemente de para qué plataforma compraste tu clave, el proceso es muy similar. Aquí te
            mostramos para el proceso para cada plataforma:</p>
    </div>

    <article class="guia-plataforma entrar-izquierda">
        <div class="guia-plataforma_contenido">
            <h2>Guía si compraste para: <span class="txt-negritas">Xbox</span></h2>
            <ol>
                <li>Presiona el botón Xbox <i class="fa-brands fa-xbox"></i> para abrir la guía y luego selecciona Store.</li>
                <li>Presiona el botón Vista para abrir el menú lateral y luego selecciona Canjear.</li>
                <li>Escribe el código de 25 caracteres, selecciona Siguiente y sigue las instrucciones.</li>
            </ol>
            <p class="mas-info">Para más información, <a href="https://support.xbox.com/es-MX/help/subscriptions-billing/redeem-codes-gifting/redeem-prepaid-codes">puedes consultar la web oficial</a></p>
        </div>
        <div class="guia-plataforma_imagen">
            <picture>
                <source srcset="build/img/xbox_logo.avif" type="image/avif">
                <source srcset="build/img/xbox_logo.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/xbox_logo.png" alt="xbox logo">
            </picture>
        </div>
    </article><!--.xbox-->


    <article class="guia-plataforma entrar-derecha">
        <div class="guia-plataforma_contenido">
            <h2>Guía si compraste para: <span class="txt-negritas">PlayStation</span></h2>
            <ol>
                <li>Ve a PlayStation Store y selecciona tu perfil en la parte superior de la pantalla.</li>
                <li>Selecciona Canjear códigos en el menú desplegable.</li>
                <li>Ingresa el código cuidadosamente y selecciona Canjear.</li>
            </ol>
            <p class="mas-info">Para más información, <a href="https://www.playstation.com/es-mx/support/store/redeem-ps-store-voucher-code/">puedes consultar la web oficial</a></p>
        </div>
        <div class="guia-plataforma_imagen">
            <picture>
                <source srcset="build/img/playstation_logo.avif" type="image/avif">
                <source srcset="build/img/playstation_logo.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/playstation_logo.png" alt="playstation logo">
            </picture>
        </div>
    </article><!--.playstation-->

    <article class="guia-plataforma entrar-izquierda">
        <div class="guia-plataforma_contenido">
            <h2>Guía si compraste para: <span class="txt-negritas">Nintendo</span></h2>
            <ol>
                <li>Selecciona Nintendo eShop en el menú HOME para iniciar Nintendo eShop.</li>
                <li>Selecciona la cuenta que quieras usar.</li>
                <li>Selecciona Ingresar código en la parte izquierda de la pantalla.</li>
                <li>Ingresa el código de descarga de 16 caracteres.</li>
                <li>Selecciona Aceptar para confirmar. El juego empezará a descargarse cuando el código sea confirmado.</li>
            </ol>
            <p class="mas-info">Para más información, <a href="https://es-americas-support.nintendo.com/app/answers/detail/a_id/23953/~/c%C3%B3mo-canjear-un-c%C3%B3digo-de-descarga-en-nintendo-eshop-de-nintendo-switch">puedes consultar la web oficial</a></p>
        </div>
        <div class="guia-plataforma_imagen">
            <picture>
                <source srcset="build/img/nintendo_logo.avif" type="image/avif">
                <source srcset="build/img/nintendo_logo.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/nintendo_logo.png" alt="playstation logo">
            </picture>
        </div>
    </article><!--.nintendo-->

    <article class="guia-plataforma entrar-derecha">
        <div class="guia-plataforma_contenido">
            <h2>Guía si compraste para: <span class="txt-negritas">PC (Steam)</span></h2>
            <ol>
                <li>Selecciona la pestaña "Juegos"</li>
                <li>Selecciona la opción "Activar Producto en Steam"</li>
                <li>Ingresa tu código</li>
                <li>Selecciona en Confirmar</li>
            </ol>
            <p class="mas-info">Para más información, <a href="https://store.steampowered.com/">puedes consultar la web oficial</a></p>
        </div>
        <div class="guia-plataforma_imagen">
            <picture>
                <source srcset="build/img/steam_logo.avif" type="image/avif">
                <source srcset="build/img/steam_logo.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/steam_logo.png" alt="playstation logo">
            </picture>
        </div>
    </article><!--.pc-->
</main>

<?php
incluirTemplate('footer');
?>