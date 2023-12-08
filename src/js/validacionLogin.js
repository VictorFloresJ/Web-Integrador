document.addEventListener('DOMContentLoaded', function () {
    const submitButton = document.querySelector('input[type="submit"]');
    deshabilitar(submitButton);

    let correoValidado = false;
    let contraseniaValidada = false;

    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    // Agregar un event listener para el evento 'input' del correo
    emailInput.addEventListener('input', function (event) {
        const textoIngresado = event.target.value;

        const esCorreoValido = validarFormatoCorreo(textoIngresado);

        if (esCorreoValido) {
            // Establecer el estilo del borde cuando el correo es válido
            emailInput.style.border = '2px solid green';
            correoValidado = true;
        } else {
            // Establecer el estilo del borde cuando el correo no es válido
            emailInput.style.border = '2px solid red';
            correoValidado = false;
        }

        actualizarEstadoBoton();
    });

    // Agregar un event listener para el evento 'input' de la contraseña
    passwordInput.addEventListener('input', function (event) {
        const textoIngresado = event.target.value;

        // Validar la contraseña (al menos 4 caracteres y sin caracteres especiales)
        const esContraseniaValida = validarFormatoContrasenia(textoIngresado);

        if (esContraseniaValida) {
            // Establecer el estilo del borde cuando la contraseña es válida
            passwordInput.style.border = '2px solid green';
            contraseniaValidada = true;
        } else {
            // Establecer el estilo del borde cuando la contraseña no es válida
            passwordInput.style.border = '2px solid red';
            contraseniaValidada = false;
        }

        actualizarEstadoBoton();
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

    function validarFormatoCorreo(texto) {
        // Expresión regular para validar el formato del correo con extensión .com
        const regex = /^[a-zA-Z]{1,}@[a-zA-Z]{1,}\.com$/;
        return regex.test(texto);
    }
    

    function validarFormatoContrasenia(texto) {
        // Validar que la contraseña tenga al menos 4 caracteres y no contenga caracteres especiales
        const regex = /^[a-zA-Z0-9]{4,}$/;
        return regex.test(texto);
    }

    function actualizarEstadoBoton() {
        // Habilitar el botón si tanto el correo como la contraseña son válidos
        if (correoValidado && contraseniaValidada) {
            habilitar(submitButton);
        } else {
            deshabilitar(submitButton);
        }
    }
});
