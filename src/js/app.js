document.addEventListener("DOMContentLoaded", function() {
    eventListeners();
});

function eventListeners()
{
    crearSliderCarrusel();
}

function crearSliderCarrusel() {
    const flechasIzquierdas = document.querySelectorAll(".carrusel-flecha-izquierda")
    const flechasDerechas = document.querySelectorAll(".carrusel-flecha-derecha");
    flechasIzquierdas.forEach(flecha_izquierda => {
        flecha_izquierda.addEventListener("click", (e) => {
            const fila_actual = e.target.parentNode.nextElementSibling;
            fila_actual.scrollLeft = fila_actual.scrollLeft - fila_actual.offsetWidth;
        });
    });
    flechasDerechas.forEach(flecha_derecha => {
        flecha_derecha.addEventListener("click", (e) => {
            const fila_actual = e.target.parentNode.previousElementSibling;
            fila_actual.scrollLeft = fila_actual.scrollLeft + fila_actual.offsetWidth;
        });
    });
}