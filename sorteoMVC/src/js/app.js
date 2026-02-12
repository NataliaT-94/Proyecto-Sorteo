(function () {

    let numerosSeleccionados = [];

    const totalInput = document.querySelector('#total');
    const nombreInput = document.querySelector('#nombre');
    const telefonoInput = document.querySelector('#telefono');
    const form = document.querySelector('form');
    const lista = document.querySelector('.lista-num');

    const PRECIO = 3000;

    document.addEventListener('DOMContentLoaded', () => {
        activarEventos();
    });

    function activarEventos() {
        const celdas = document.querySelectorAll('.tabla-sorteo td');

        celdas.forEach(td => {
            if (td.classList.contains('vendido')) return;

            td.addEventListener('click', () => seleccionarNumero(td));
        });
    }

    function seleccionarNumero(td) {
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

        if (numerosSeleccionados.length === 0) {
            alert('Seleccioná al menos un número');
            return;
        }

        if (!nombreInput.value || !telefonoInput.value) {
            alert('Completá nombre y teléfono');
            return;
        }

        console.log({
            nombre: nombreInput.value,
            telefono: telefonoInput.value,
            numeros: numerosSeleccionados
        });

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
            console.log('RESPUESTA API:', resultado);

            if (resultado.ok) {
                alert('Compra realizada');
            } else {
                alert(resultado.error || 'Error al comprar');
            }

        } catch (error) {
            console.error('ERROR FETCH:', error);
        }
    }


    form.addEventListener('submit', enviarCompra);

    async function recargarTabla() {
        const respuesta = await fetch('/api/numero');
        const numeros = await respuesta.json();

        const tbody = document.querySelector('.tabla-sorteo tbody');
        tbody.innerHTML = '';

        let tr = document.createElement('tr');

        numeros.forEach((n, index) => {
            const td = document.createElement('td');
            td.textContent = String(n.numero).padStart(2, '0');
            td.dataset.id = n.id;

            if (n.vendido == 1) {
                td.classList.add('vendido');
            } else {
                td.addEventListener('click', () => seleccionarNumero(td));
            }

            tr.appendChild(td);

            if ((index + 1) % 10 === 0) {
                tbody.appendChild(tr);
                tr = document.createElement('tr');
            }
        });

        if (tr.children.length) {
            tbody.appendChild(tr);
        }
    }

})();
