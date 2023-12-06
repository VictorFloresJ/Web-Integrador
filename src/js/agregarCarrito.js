function agregarAlCarrito(boton) {
    const idProducto = boton.getAttribute('data-id');

    const productoActual = document.getElementById(idProducto);


    const imagen = productoActual.querySelector('.producto_imagen img')
        .getAttribute('src')
        .substring('images/'.length);

    const titulo = productoActual.querySelector('.producto-titulo').textContent;
    const plataforma = productoActual.querySelector('.producto-plataforma').textContent;
    const precio = productoActual.querySelector('.precio').textContent;

    const productoAGuardar = {
        id: idProducto,
        titulo: titulo,
        imagen: imagen,
        precio: precio,
        plataforma: plataforma
    }

    const productoJSON = JSON.stringify(productoAGuardar);

    const fechaExpiracion = new Date();
    fechaExpiracion.setHours(fechaExpiracion.getHours() + 24);
    const expiracion = fechaExpiracion.toUTCString();

    document.cookie = `producto_${idProducto}_${plataforma}=${encodeURIComponent(productoJSON)}; expires=${expiracion}; path=/;`;

    alert('Producto agregado con éxito');
}