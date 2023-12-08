document.addEventListener('DOMContentLoaded', function () {
    const submitButton = document.querySelector('input[type="submit"]');
    deshabilitar(submitButton);

    const estadoCampos = {
        titularValidado: false,
        numerosTarjetaValidados: false,
        fechaTarjetaValidada: false,
        cvvValidado: false
    };

    const titularInput = document.getElementById('titular');
    const numerosTarjetaInput = document.getElementById('numeros-tarjeta');
    const fechaTarjetaInput = document.getElementById('fecha-tarjeta');
    const cvvInput = document.getElementById('cvv-tarjeta');

    titularInput.addEventListener('input', function (event) {
        const textoIngresado = event.target.value;
        const esTitularValido = validarTexto(textoIngresado);
        actualizarEstadoCampo(esTitularValido, titularInput, 'titularValidado');
    });

    numerosTarjetaInput.addEventListener('input', function (event) {
        const textoIngresado = event.target.value;
        const esNumerosTarjetaValidos = validarNumerosTarjeta(textoIngresado);
        actualizarEstadoCampo(esNumerosTarjetaValidos, numerosTarjetaInput, 'numerosTarjetaValidados');
    });

    fechaTarjetaInput.addEventListener('input', function (event) {
        const textoIngresado = event.target.value;
        const esFechaTarjetaValida = validarFechaTarjeta(textoIngresado);
        actualizarEstadoCampo(esFechaTarjetaValida, fechaTarjetaInput, 'fechaTarjetaValidada');
    });

    cvvInput.addEventListener('input', function (event) {
        const textoIngresado = event.target.value;
        const esCVVValido = validarCVV(textoIngresado);
        actualizarEstadoCampo(esCVVValido, cvvInput, 'cvvValidado');
    });

    function deshabilitar($elemento) {
        $elemento.disabled = true;
        $elemento.style.opacity = '0.5';
        $elemento.addEventListener('click', prevenirClick);
    }

    function habilitar($elemento) {
        $elemento.disabled = false;
        $elemento.style.opacity = '1';
        $elemento.removeEventListener('click', prevenirClick);
    }

    function prevenirClick(e) {
        e.preventDefault();
    }

    function validarTexto(texto) {
        return texto.trim().length > 0;
    }

    function validarNumerosTarjeta(texto) {
        const regex = /^\d{4}-\d{4}-\d{4}-\d{4}$/;
        return regex.test(texto);
    }

    function validarFechaTarjeta(texto) {
        const regex = /^(0[1-9]|1[0-2])\/\d{2}$/;
        return regex.test(texto);
    }

    function validarCVV(texto) {
        const regex = /^\d{3,4}$/;
        return regex.test(texto);
    }

    function actualizarEstadoCampo(esValido, inputElement, propiedadValidada) {
        if (esValido) {
            inputElement.style.border = '2px solid green';
            estadoCampos[propiedadValidada] = true;
        } else {
            inputElement.style.border = '2px solid red';
            estadoCampos[propiedadValidada] = false;
        }

        actualizarEstadoBoton();
    }

    function actualizarEstadoBoton() {
        if (estadoCampos.titularValidado && estadoCampos.numerosTarjetaValidados && estadoCampos.fechaTarjetaValidada && estadoCampos.cvvValidado) {
            console.log('hola');
            habilitar(submitButton);
        } else {
            console.log('adios');
            deshabilitar(submitButton);
        }
    }
});
