// Obtener el select de divisas y el div que contiene las tasas de cambio


const currencySelect = document.getElementById('currency-select');
const tasasDeCambioDiv = document.getElementById('tasas-de-cambio');

// Parsear las tasas de cambio desde el atributo 'data-tasas' en formato JSON
const tasasDeCambio = JSON.parse(tasasDeCambioDiv.getAttribute('data-tasas'));

// Asegurarse de que USD esté presente
if (!tasasDeCambio.USD) {
    tasasDeCambio.USD = 1;
}

// Lista de códigos de divisas LATAM + USD
const divisasPermitidas = [
    'USD', 'ARS', 'BOB', 'BRL', 'CLP', 'COP', 'CRC', 'DOP', 'GTQ',
    'HNL', 'MXN', 'NIO', 'PAB', 'PEN', 'PYG', 'UYU', 'VES'
];

// Filtrar solo las divisas LATAM + USD
const tasasFiltradas = {};
divisasPermitidas.forEach(codigo => {
    if (tasasDeCambio[codigo]) {
        tasasFiltradas[codigo] = tasasDeCambio[codigo];
    }
});

// Función para renderizar las opciones de divisas en el selector
function renderizarOpcionesDivisas() {
    // Limpiar las opciones actuales
    currencySelect.innerHTML = '';

    // Agregar solo las divisas permitidas
    Object.keys(tasasFiltradas).forEach(codigoDivisa => {
        const option = document.createElement('option');
        option.value = codigoDivisa;
        option.textContent = codigoDivisa;
        currencySelect.appendChild(option);
    });
}

// Función para guardar la divisa seleccionada y su valor en localStorage
function guardarDivisaYValor() {
    const divisaSeleccionada = currencySelect.value;
    const valorDivisa = tasasFiltradas[divisaSeleccionada];

    localStorage.setItem('divisa', divisaSeleccionada);
    localStorage.setItem('valorDivisa', valorDivisa);

    console.log(`Divisa seleccionada: ${divisaSeleccionada}, Valor: ${valorDivisa}`);
    // Refrescar la página para aplicar los cambios
    location.reload();
}

// Evento cuando se cambia la divisa seleccionada
currencySelect.addEventListener('change', guardarDivisaYValor);

// Renderizar opciones al cargar
renderizarOpcionesDivisas();

// Restaurar selección previa si existe
const divisaGuardada = localStorage.getItem('divisa');
if (divisaGuardada && tasasFiltradas[divisaGuardada]) {
    currencySelect.value = divisaGuardada;
}
