function agregarAlCarrito(t){const e=t.getAttribute("data-id"),o=document.getElementById(e),r=o.querySelector(".producto_imagen img").getAttribute("src").substring("images/".length),n=o.querySelector(".producto-titulo").textContent,i=o.querySelector(".producto-plataforma").textContent,c={id:e,titulo:n,imagen:r,precio:o.querySelector(".precio").textContent,plataforma:i},a=JSON.stringify(c),u=new Date;u.setHours(u.getHours()+24);const g=u.toUTCString();document.cookie=`producto_${e}_${i}=${encodeURIComponent(a)}; expires=${g}; path=/;`,alert("Producto agregado con éxito")}
//# sourceMappingURL=agregarCarrito.js.map