document.addEventListener('DOMContentLoaded', obtenerCookies);

function limpiarPrecio(precioStr) {
    let limpio = precioStr.replace('$', '').trim();   // Quitar signo $
    limpio = limpio.replace(/,/g, '');                 // Quitar comas de miles
    // parseFloat lee hasta donde puede, ignora texto extra (ej. "MXN")
    return parseFloat(limpio);
}

function obtenerCookies() {
    const cookies = document.cookie.split(';');
    const carritoElemento = document.querySelector('.compras_productos');
    let subtotal = 0;

    cookies.forEach(function (cookie) {
        let [nombre, valor] = cookie.split('=');
        nombre = nombre.trim();

        if (nombre.startsWith('producto_')) {
            const producto = JSON.parse(decodeURIComponent(valor));

            console.table(producto);

            subtotal += limpiarPrecio(producto.precio); // Limpio y sumo el precio

            const productoElemento = document.createElement('div');
            productoElemento.classList.add('compras_videojuego', 'entrar-izquierda');
            productoElemento.id = `${producto.id}_${producto.plataforma}`;

            productoElemento.innerHTML = `
                <div class="videojuego_imagen">
                    <img src="images/${producto.imagen}" alt="videojuego imagen">
                </div>
                <div class="videojuego_contenido">
                    <h1 class="videojuego-titulo">${producto.titulo}</h1>
                    <p class="videojuego-precio">Precio: ${producto.precio}</p>
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

    mostrarTotales(subtotal);
}

function mostrarTotales(subtotal) {
    fetch(`calcular_iva.php?precio=${subtotal}`)
        .then(response => response.json())
        .then(data => {
            const contenedorTotales = document.querySelector('.totales_contenedor');
            if (!contenedorTotales) return;

            contenedorTotales.innerHTML = `
                <p>Subtotal: $${subtotal.toFixed(2)}</p>
                <p>IVA (${(data.tasa_iva * 100).toFixed(0)}%): $${data.iva.toFixed(2)}</p>
                <p><strong>Total: $${data.total.toFixed(2)}</strong></p>
                <p><small>País detectado: ${data.pais}</small></p>
            `;
        })
        .catch(error => {
            console.error('Error al calcular IVA:', error);
        });
}
