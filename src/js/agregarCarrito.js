function agregarAlCarrito(boton) {
    const idProducto = boton.getAttribute('data-id');

    const productoActual = document.getElementById(idProducto);

    const imagen = productoActual.querySelector('.producto_imagen img')
        .getAttribute('src')
        .substring('images/'.length);
    const titulo = productoActual.querySelector('.producto-titulo').textContent;
    const precio = productoActual.querySelector('.precio').textContent;

    const productoAGuardar = {
        id: idProducto,
        titulo: titulo,
        imagen: imagen,
        precio: precio
    }

    const productoJSON = JSON.stringify(productoAGuardar);

    document.cookie = `producto_${idProducto}=${encodeURIComponent(productoJSON)};`;

    alert('cookie guardada con éxito');
}