document.addEventListener("DOMContentLoaded", function() {
    const mostrarCantidad = 15;
    const elementosMostrados = document.getElementById('elementosMostrados');
    const verMasBtn = document.getElementById('verMasBtn');

    let elementosTotales = parseInt(document.getElementById('elementosTotales').textContent);
    let elementosActuales = mostrarCantidad;

    verMasBtn.addEventListener('click', function() {
        const elementos = document.querySelectorAll('.producto-ocultar');
        let elementosVisibles = document.querySelectorAll('.producto:not(.ocultar)').length;
        const siguienteElementos = elementosVisibles + mostrarCantidad;

        for (let i = elementosVisibles; i < siguienteElementos && i < elementosTotales; i++) {
            elementos[i].classList.remove('ocultar');
        }

        if (elementosVisibles >= elementosTotales) {
            verMasBtn.style.display = 'none'; 
        }
    });
});