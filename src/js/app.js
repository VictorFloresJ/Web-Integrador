document.addEventListener("DOMContentLoaded", function() {
    eventListeners();
});

function eventListeners()
{
    bannerCambiante();
    crearSliderCarrusel();
}

function bannerCambiante() {
    const anchoDispositivo = window.innerWidth;
    cambiarFondo();
    if (anchoDispositivo > 768) {
        setInterval(cambiarFondo, 5000);
    }
}

function cambiarFondo() {
    let banner = document.querySelector('.barra-busqueda');
    const cantidadBanners = 7;

    let numeroAleatorio = Math.floor(Math.random() * cantidadBanners) + 1;
    let rutaImagen = '/build/img/banner' + numeroAleatorio + '.jpg';

    banner.style.background = 'url("' + rutaImagen + '")';
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


// Obtener el contenedor
var contenedor = document.querySelector('.barra-busqueda');

// Obtener el ancho y la altura del contenedor
var anchoContenedor = contenedor.offsetWidth;
var alturaContenedor = contenedor.offsetHeight;

// Calcular la relación de aspecto
var relacionAspecto = anchoContenedor / alturaContenedor;

console.log("Relación de aspecto del contenedor: " + relacionAspecto);
