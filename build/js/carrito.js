function obtenerCookies(){const o=document.cookie.split(";"),n=document.querySelector(".compras_productos");console.log(o.length),o.forEach((function(o){let[e,i]=o.split("=");if(e=e.trim(),e.startsWith("producto_")){const o=JSON.parse(decodeURIComponent(i)),e=document.createElement("div");e.classList.add("compras_videojuego","entrar-izquierda"),e.id=`${o.id}_${o.plataforma}`,e.innerHTML=`\n                <div class="videojuego_imagen">\n                    <img src="images/${o.imagen}" alt="videojuego imagen">\n                </div>\n                <div class="videojuego_contenido">\n                    <h1 class="videojuego-titulo">${o.titulo}</h1>\n                    <p class="videojuego-precio">${o.precio}</p>\n                    <p class="videojuego-plataforma">${o.plataforma}</p>\n                    <label for="cantidad_${o.id}_${o.plataforma}" class="videojuego-cantidad">Cantidad</label>\n                    <select name="cantidad_${o.id}_${o.plataforma}">\n                        <option value="1" selected>1</option>\n                        <option value="2">2</option>\n                        <option value="3">3</option>\n                        <option value="4">4</option>\n                        <option value="5">5</option>\n                        <option value="6">6</option>\n                        <option value="7">7</option>\n                        <option value="8">8</option>\n                        <option value="9">9</option>\n                    </select>\n                    <button \n                        class="boton-amarillo videojuego-eliminar"\n                        data-id="${o.id}_${o.plataforma}"\n                        onclick="eliminarDeLCarrito(this)">\n                        Eliminar del carrito\n                    </button>\n                </div>\n            `,n.appendChild(e)}}))}document.addEventListener("DOMContentLoaded",obtenerCookies);
//# sourceMappingURL=carrito.js.map
