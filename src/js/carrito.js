document.addEventListener('DOMContentLoaded', obtenerCookies);

function obtenerCookies() {

    const cookies = document.cookie.split(';');
    const carritoElemento = document.querySelector('.compras_productos');

    console.log(cookies.length);

    cookies.forEach(function (cookie) {

        let [nombre, valor] = cookie.split('=');

        nombre = nombre.trim();

        if (nombre.startsWith('producto_')) {

            const producto = JSON.parse(decodeURIComponent(valor));

            const productoElemento = document.createElement('div');
            productoElemento.classList.add('compras_videojuego', 'entrar-izquierda');
            productoElemento.id = `${producto.id}_${producto.plataforma}`;

            productoElemento.innerHTML = `
                <div class="videojuego_imagen">
                    <img src="images/${producto.imagen}" alt="videojuego imagen">
                </div>
                <div class="videojuego_contenido">
                    <h1 class="videojuego-titulo">${producto.titulo}</h1>
                    <p class="videojuego-precio">${producto.precio}</p>
                    <p class="videojuego-plataforma">${producto.plataforma}</p>
                    <label for="cantidad_${producto.id}_${producto.plataforma}" class="videojuego-cantidad">Cantidad</label>
                    <select name="cantidad_${producto.id}_${producto.plataforma}">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <button 
                        class="boton-amarillo videojuego-eliminar"
                        data-id="${producto.id}_${producto.plataforma}"
                        onclick="eliminarDeLCarrito(this)">
                        Eliminar del carrito
                    </button>
                </div>
            `;

            carritoElemento.appendChild(productoElemento);
        }
    });
}