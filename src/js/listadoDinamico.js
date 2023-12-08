document.addEventListener("DOMContentLoaded", function () {
    // const headers = document.querySelectorAll('th[id]');

    // headers.forEach(header => {
    //     header.addEventListener('click', function() {
    //         const columnId = this.id;
    //         const isNumeric = !isNaN(parseFloat(this.innerText));
    //         const table = this.closest('table');
    //         const tbody = table.querySelector('tbody');
    //         const rows = Array.from(tbody.querySelectorAll('tr'));

    //         rows.sort((a, b) => {
    //             let valueA = getColumnValue(a, columnId, isNumeric);
    //             let valueB = getColumnValue(b, columnId, isNumeric);

    //             return isNumeric ? valueA - valueB : valueA.localeCompare(valueB);
    //         });

    //         if (this.dataset.sorted === 'asc') {
    //             rows.reverse();
    //             this.dataset.sorted = 'desc';
    //         } else {
    //             this.dataset.sorted = 'asc';
    //         }

    //         tbody.innerHTML = '';
    //         rows.forEach(row => {
    //             tbody.appendChild(row);
    //         });
    //     });
    // });

    // function getColumnValue(row, columnId, isNumeric) {
    //     const cell = row.querySelector(`.producto-${columnId}`);
    //     let value = cell ? cell.innerText.trim() : '';

    //     if (isNumeric) {
    //         value = parseFloat(value);
    //         return isNaN(value) ? 0 : value;
    //     }

    //     return value;
    // }

    const mostrarCantidad = 15;
    const elementosMostrados = document.getElementById('elementosMostrados');
    const verMasBtn = document.getElementById('verMasBtn');

    let elementosTotales = parseInt(document.getElementById('elementosTotales').textContent);
    let elementosActuales = mostrarCantidad;

    verMasBtn.addEventListener('click', function () {
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