$('a.trash-red').on('click', function() {
    Swal.fire({
        title: 'Confirmar eliminación',
        text: "¿Está seguro de eliminar este artículo?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7066E0',
        cancelButtonColor: '#404040',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                '¡Listo!',
                'Se ha eliminado exitosamente',
                'success'
            )
        }
    })
});

$('a.check-green').on('click', function() {
    Swal.fire({
        title: 'Confirmar Préstamo',
        text: "¿Está seguro de aceptar?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7066E0',
        cancelButtonColor: '#A6A6A6',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                '¡Aceptado!',
                'El préstamo ha sido aceptado',
                'success'
            )
        }
    })
});

$('a.check-green-fin').on('click', function() {
    Swal.fire({
        title: 'Finalizar Préstamo',
        text: "Confirmar el fin de este préstamo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7066E0',
        cancelButtonColor: '#A6A6A6',
        confirmButtonText: 'Finalizar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                '¡Listo!',
                'Préstamo terminado',
                'success'
            )
        }
    })
});

/*
$('#btn-editar').on('click', function() {

    Swal.fire({
        title: '¿Desea guardar los cambios?',
        text: "Confirme si desea guardar los cambios",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#7066E0',
        cancelButtonColor: '#A6A6A6',
        confirmButtonText: 'Guardar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                '¡Cambios guardados!',
                'Se ha modificado correctamente',
                'success'
            )
        }
    })
});*/
/*
$('#btn-agregar').on('click', function() {
    Swal.fire(
        'Artículo agregado',
        'Se ha insertado el nuevo artículo correctamente',
        'success'
    )
});
*/
$('#btn-sol').on('click', function() {
    swal({
        title: 'Procesando solicitud',
        timer: 3000,
        onOpen: function() {
            swal.showLoading()
        }
    }).then(
        function() {},
        function(dismiss) {
            if (dismiss === 'timer') {
                console.log('Meow')
            }
        }
    )
});