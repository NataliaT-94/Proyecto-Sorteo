(function(){

    let numeros = [];
    
    const celdas = document.querySelectorAll('.tabla-sorteo td');
    const totalInput = document.querySelector('#total');
    const textInput = document.querySelector('#nombre');
    const telInput = document.querySelector('#telefono');
    const form = document.querySelector('form');
    const lista = document.querySelector('.lista-num');

    celdas.forEach(td => {
        td.addEventListener('click', seleccionarNumero);
    });

    form.addEventListener('submit', submitLista);

    function seleccionarNumero(e) {
        const target = e.target;
        const numero = target.textContent.trim();

        if (target.classList.contains('seleccionado')) {
            target.classList.remove('seleccionado'); // Quita si existe
            numeros = numeros.filter(n => n !== numero);
            console.log('Clase eliminada');
        } else {
            target.classList.add('seleccionado'); // Agrega si no existe
            numeros.push(numero);
            console.log('Clase agregada');
        }

        totalInput.value = numeros.length * 3000;

        console.log('Seleccionados:', numero);

        
        mostrarNumeros();
    }

    function mostrarNumeros(){
        lista.innerHTML = '';
        numeros.forEach( (numero, id) => {
            const numSeleccionado = document.createElement('li');
            numSeleccionado.classList.add('numero', 'seleccionado');

            numSeleccionado.innerHTML = `
                <p>${numero}</p>
                <i class="fa-solid fa-trash-can" data-id="${id}"></i>
            `;

            lista.appendChild(numSeleccionado);

        });
    }    

    async function submitLista(e) {
        e.preventDefault();

        if (numeros.length === 0) {
            alert('Debes seleccionar al menos un número');
            return;
        }

        const nombre = document.querySelector('#nombre'). value;
        const telefono = document.querySelector('#telefono'). value;
        const precioTotal = document.querySelector('.numero')?.dataset.precio;

        if (!nombre || !telefono || seleccionados.length === 0) {
            alert('Completá todos los datos');
            return;
        }

        const respuesta = await fetch('/api/comprar', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                nombre,
                telefono,
                numeros: seleccionados,
                precioTotal
            })
        })
        
    }


})();