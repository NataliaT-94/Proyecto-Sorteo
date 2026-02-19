(function () {

    let numerosSeleccionados = [];

    const totalInput = document.querySelector('#total');
    const nombreInput = document.querySelector('#nombre');
    const telefonoInput = document.querySelector('#telefono');
    const form = document.querySelector('.formulario');

    const lista = document.querySelector('.lista-num');

    const PRECIO = 3000;

    document.addEventListener('DOMContentLoaded', () => {
        activarEventos();
    });

    function activarEventos() {
        const celdas = document.querySelectorAll('.tabla-sorteo td');

        celdas.forEach(td => {
            if (td.classList.contains('numerovendido')) return;
            td.addEventListener('click', () => seleccionarNumero(td));
        });
    }

    function seleccionarNumero(td) {

        limpiarErroresLista();

        const id = td.dataset.id;
        const numero = td.textContent.trim();

        if (td.classList.contains('seleccionado')) {
            td.classList.remove('seleccionado');
            numerosSeleccionados = numerosSeleccionados.filter(n => n.id !== id);
        } else {
            td.classList.add('seleccionado');
            numerosSeleccionados.push({ id, numero });
        }

        actualizarTotal();
        mostrarNumeros();
    }

    function mostrarNumeros() {
        lista.innerHTML = '';

        numerosSeleccionados.forEach(n => {
            const li = document.createElement('li');
            li.textContent = n.numero;
            lista.appendChild(li);
        });
    }

    function actualizarTotal() {
        totalInput.value = numerosSeleccionados.length * PRECIO;
    }

    async function enviarCompra(e) {
        e.preventDefault();

        limpiarErrores();
        limpiarErroresLista();

        if (numerosSeleccionados.length === 0) {
            mostrarErrorLista('Seleccioná al menos un número');
            return;
        }

        if (!nombreInput.value.trim()) {
            mostrarError(nombreInput, 'Ingresá tu nombre');
            return;
        }

        if (!telefonoInput.value.trim()) {
            mostrarError(telefonoInput, 'Ingresá tu teléfono');
            return;
        }

        try {
            const respuesta = await fetch('/api/comprar', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    nombre: nombreInput.value,
                    telefono: telefonoInput.value,
                    numeros: numerosSeleccionados.map(n => n.id)
                })
            });

            const resultado = await respuesta.json();
            // console.log('RESPUESTA API:', resultado);

            if (resultado.ok) {

                numerosSeleccionados = [];

                Swal.fire({
                    title: "Compra realizada Correctamente!",
                    icon: "success",
                    draggable: true
                });

                actualizarTotal();
                mostrarNumeros();

                await recargarTabla();

                nombreInput.value = '';
                telefonoInput.value = '';

            } else {
                mostrarError(nombreInput, resultado.error || 'Error al comprar');
            }

        } catch (error) {
            console.error('ERROR FETCH:', error);
        }
    }

    if (form) {
        form.addEventListener('submit', enviarCompra);
    }


    async function recargarTabla() {
        const respuesta = await fetch('/api/numero');
        const numeros = await respuesta.json();

        // console.log('NUMEROS API:', numeros);

        numeros.sort((a, b) => Number(a.numero) - Number(b.numero));//orden de los numeros

        const tbody = document.querySelector('.tabla-sorteo tbody');
        tbody.innerHTML = '';

        let tr;

        numeros.forEach((n, index) => {

            if (index % 10 === 0) {
                tr = document.createElement('tr');
                tbody.appendChild(tr);
            }

            const td = document.createElement('td');
            td.classList.add('numero');
            td.textContent = String(n.numero).padStart(2, '0');
            td.dataset.id = n.id;

            if (n.vendido == 1) {
                td.classList.add('numerovendido');
            } else {
                td.addEventListener('click', () => seleccionarNumero(td));
            }

            tr.appendChild(td);
        });
    }


    /*ERRORES EN INPUTS*/

    function mostrarError(input, mensaje) {
        input.classList.add('input-error');

        let error = input.parentElement.querySelector('.error-msg');

        if (!error) {
            error = document.createElement('span');
            error.classList.add('error-msg');
            input.parentElement.appendChild(error);
        }

        error.textContent = mensaje;
    }

    function limpiarErrores() {
        document.querySelectorAll('.input-error').forEach(el =>
            el.classList.remove('input-error')
        );

        document.querySelectorAll('.error-msg').forEach(el =>
            el.remove()
        );
    }

    /*ERROR DE LISTA DE NÚMEROS*/

    function mostrarErrorLista(mensaje) {
        limpiarErroresLista();

        const error = document.createElement('span');
        error.classList.add('error-msg');
        error.textContent = mensaje;

        lista.parentElement.appendChild(error);
    }

    function limpiarErroresLista() {
        const error = lista.parentElement.querySelector('.error-msg');
        if (error) error.remove();
    }

    /* LIMPIAR ERROR AL ESCRIBIR */

    [nombreInput, telefonoInput].forEach(input => {
        input.addEventListener('input', () => {
            input.classList.remove('input-error');

            const error = input.parentElement.querySelector('.error-msg');
            if (error) error.remove();
        });
    });

})();
