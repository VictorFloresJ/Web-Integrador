document.addEventListener('DOMContentLoaded', crearPaginador);

function crearPaginador() {
    const flechaIzquierda = document.querySelector(".paginador-flecha-izquierda")
    const flechaDerecha = document.querySelector(".paginador-flecha-derecha");
    const paginaActual = document.querySelector(".productos");

    flechaIzquierda.addEventListener("click", () => {
        paginaActual.scrollLeft = paginaActual.scrollLeft - paginaActual.clientWidth;
    });

    flechaDerecha.addEventListener("click", () => {
        paginaActual.scrollLeft = paginaActual.scrollLeft + paginaActual.clientWidth;
});

}