/* ------------------------------------------- TABS ----------------------------------- */
$('ul.tabs li a:first').addClass('active');
$('ul.tabs li a:first').addClass('active-ds');
$('.material article').hide();
$('.secciones article:first').show();

$('ul.tabs li a').on('click', function() {
    $('ul.tabs li a').removeClass('active');
    $('ul.tabs li a').removeClass('active-ds');
    $(this).addClass('active');
    $(this).addClass('active-ds');
    $('.material article').hide();

    var activeTab = $(this).attr('href');
    $(activeTab).show();
    return false;
});

/* ------------------------------------------- CERRAR MODAL ----------------------------------- */

$('#nuevoArt').on('hidden.bs.modal', function() {
    $(this).find('form').trigger('reset');
});

$('#login-modal').on('hidden.bs.modal', function() {
    $(this).find('form').trigger('reset');
});

$('#loging-modal').on('hidden.bs.modal', function() {
    $(this).find('form').trigger('reset');
});

/* ------------------------------------------- BOTON AÑADIR ----------------------------------- */
$('button.anadir').show();
$('button.quitar').hide();

function atq() {
    $('button.anadir').hide();
    $('button.quitar').show();
}

function qta() {
    $('button.anadir').show();
    $('button.quitar').hide();
}

/* ------------------------------------------- CONFIRMAR COD ----------------------------------- */
$('#cod-act').hide();

function confirmar() {
    (async() => {
        const { value: formValues } = await Swal.fire({
            title: 'Código',
            text: 'Ingrese dos veces su código para confirmar',
            html: '<input id="codigo1" class="swal2-input">' +
                '<input id="codigo2" class="swal2-input">',
            focusConfirm: false,

            preConfirm: () => {
                var cod = document.getElementById('codigo1').value;
                var cod2 = document.getElementById('codigo2').value;

                var btn = document.getElementById("btn-confirmar");
                btn.innerHTML = cod;
                return cod == cod2
            }
        })
        console.log(formValues)
        if (formValues) {
            Swal.fire(
                'Confirmado',
                'Los códigos coinciden',
                'success'
            )

        } else {
            Swal.fire(
                'Error',
                'Los códigos no coinciden',
                'success'
            )
            var btn = document.getElementById("btn-confirmar");
            btn.innerHTML = '';
        }

    })()
}

/* ------------------------------------------- NAVBAR ----------------------------------- */