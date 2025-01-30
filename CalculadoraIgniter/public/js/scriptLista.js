$(document).ready(function () {
    // Evento al enviar el formulario
    $('#form-agregar').submit(function (event) {
        event.preventDefault();

        let texto = $('#texto').val().trim();

        if (texto !== '') {
            $.post('/CodeIgniter/CalculadoraIgniter/public/lista/agregar', { texto: texto }, function (data) {
                actualizarLista(data);
            });

            $('#texto').val(''); // Limpiar input después de agregar
        }
    });
});

function eliminar(index) {
    $.get('/CodeIgniter/CalculadoraIgniter/public/lista/eliminar/' + index, function (data) {
        actualizarLista(data);
    });
}

function actualizarLista(lista) {
    let html = '';

    if (lista.length === 0) {
        $('#mensaje-vacio').show(); // Show message if the list is empty
    } else {
        $('#mensaje-vacio').hide(); // Hide message when tasks exist

        lista.forEach((item, index) => {
            html += `
                <li>
                    Tarea #${index + 1} - <i>${item}</i>
                    <button class="delete" onclick="eliminar(${index})">X</button>
                </li>
            `;
        });
    }

    $('#lista').html(html); // Update the list dynamically
}