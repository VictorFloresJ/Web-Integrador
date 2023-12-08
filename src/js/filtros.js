document.addEventListener('DOMContentLoaded', () => {
    ocultarElementos();
    filtrarResultados();
});

function ocultarElementos() {
    const flechasFiltroNombre = document.querySelectorAll('.filtros_herramienta-nombre i');
    const flechasFiltroPrecio = document.querySelectorAll('.filtros_herramienta-precio i');

    flechasFiltroNombre.forEach(elemento => {
        elemento.style.display = 'none';
    });
    flechasFiltroPrecio.forEach(elemento => {
        elemento.style.display = 'none';
    });
}

function aplicarFiltro(factorPorComparar, flechas) {
    const flechaHaciaArriba = flechas[0];
    if (flechaHaciaArriba.style.display == 'inline') {
        orden = "ascendente";
    } else {
        orden = "descendente";
    }

    const cantidadPaginas = document.querySelectorAll(".productos-pagina").length;

    let nuevasPaginas = [];
    for (let i = 0; i < cantidadPaginas; i++) {
        const nuevaPagina = document.createElement("DIV");
        nuevaPagina.classList.add('productos-pagina');
        nuevasPaginas.push(nuevaPagina);
    }

    const productosArray = Array.from(document.querySelectorAll(".producto"));

    productosArray.sort((a, b) => {
        if (factorPorComparar === 'titulo') {
            const tituloA = a.querySelector('.producto-titulo').textContent.toLowerCase();
            const tituloB = b.querySelector('.producto-titulo').textContent.toLowerCase();
            return tituloA.localeCompare(tituloB);
        } else {
            const precioA = parseFloat(a.querySelector('.precio').textContent.slice(1));
            const precioB = parseFloat(b.querySelector('.precio').textContent.slice(1));

            return precioA - precioB;
        }
    });


    if (orden === 'descendente') {
        productosArray.reverse();
    }

    const contenedorProductos = document.querySelector('.productos');
    contenedorProductos.innerHTML = '';

    let indicePagina = 0;
    productosArray.forEach((producto, index) => {
        nuevasPaginas[indicePagina].appendChild(producto);

        if ((index + 1) % 20 === 0) {
            indicePagina++;
        }
    });

    nuevasPaginas.forEach(nuevaPagina => {
        contenedorProductos.appendChild(nuevaPagina);
    });

}

function filtrarResultados() {
    const filtrar_herramienta_nombre = document.querySelector('.filtros_herramienta-nombre p');
    const filtrar_herramienta_precio = document.querySelector('.filtros_herramienta-precio p');

    filtrar_herramienta_nombre.addEventListener('click', () => {
        const flechas = document.querySelectorAll('.filtros_herramienta-nombre i');
        ocultarFlechas(flechas);
        aplicarFiltro('titulo', flechas);
    });

    filtrar_herramienta_precio.addEventListener('click', () => {
        const flechas = document.querySelectorAll('.filtros_herramienta-precio i');
        ocultarFlechas(flechas);
        aplicarFiltro('precio', flechas);
    });
}

function ocultarFlechas(flechas) {
    const flechaHaciaArriba = flechas[0];
    const flechaHaciaAbajo = flechas[1];
    if (flechaHaciaArriba.style.display == 'none') {
        flechaHaciaArriba.style.display = 'inline';
        flechaHaciaAbajo.style.display = 'none';
    } else {
        flechaHaciaArriba.style.display = 'none';
        flechaHaciaAbajo.style.display = 'inline';
    }
}