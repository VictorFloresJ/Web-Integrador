document.addEventListener('DOMContentLoaded', validarFormulario);

function validarFormulario() {
    const plataformas = {
        xbox: {
            checkbox: document.querySelector('#plataforma_xbox'),
            campoId: 'plataforma_xboxcampo',
            nombrePrecio: 'plataforma_xbox_precio'
        },
        playstation: {
            checkbox: document.querySelector('#plataforma_playstation'),
            campoId: 'plataforma_playstationcampo',
            nombrePrecio: 'plataforma_playstation_precio'
        },
        nintendo: {
            checkbox: document.querySelector('#plataforma_nintendo'),
            campoId: 'plataforma_nintendocampo',
            nombrePrecio: 'plataforma_nintendo_precio'
        },
        pc: {
            checkbox: document.querySelector('#plataforma_pc'),
            campoId: 'plataforma_pccampo',
            nombrePrecio: 'plataforma_pc_precio'
        }
    };

    for (const plataforma in plataformas) {
        const { checkbox, campoId, nombrePrecio } = plataformas[plataforma];
        let checkbox_checked = false;

        checkbox.addEventListener('change', () => {
            if (checkbox.checked && !checkbox_checked) {
                checkbox_checked = true;
                const elementoPadre = checkbox.parentElement;

                const nuevoDiv = document.createElement('div');
                nuevoDiv.classList.add('campo');
                nuevoDiv.id = campoId;

                const nuevoLabel = document.createElement('label');
                nuevoLabel.setAttribute('for', 'inputPrecio');
                nuevoLabel.textContent = 'Precio';

                const nuevoInputPrecio = document.createElement('input');
                nuevoInputPrecio.setAttribute('type', 'number');
                nuevoInputPrecio.setAttribute('id', 'inputPrecio');
                nuevoInputPrecio.setAttribute('name', nombrePrecio);

                nuevoDiv.appendChild(nuevoLabel);
                nuevoDiv.appendChild(nuevoInputPrecio);

                elementoPadre.append(nuevoDiv);
            } else if (checkbox_checked) {
                checkbox_checked = false;
                const campoCreado = document.querySelector(`#${campoId}`);
                campoCreado.remove();
            }
        });
    }
}