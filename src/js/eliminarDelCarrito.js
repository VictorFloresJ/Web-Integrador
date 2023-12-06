function eliminarDeLCarrito(boton) {
    const idProducto = boton.getAttribute('data-id');

    const productoActual = document.getElementById(idProducto);
    
    productoActual.remove();

    const cookieName = `producto_${idProducto}`;

    document.cookie = `${cookieName}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;

}