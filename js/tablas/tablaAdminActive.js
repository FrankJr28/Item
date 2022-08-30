$(document).ready(function() {

    var table = $('#tablaDatos').DataTable({
        //var table = $('#example').DataTable({
        ajax: {
            url: './controladores/tablas/tablaAdminActive.php',
            dataSrc: ''
        },
        columns: [{
                data: 0,
                render: function(data) {
                    return '<form action="index.php?pagina=detallePrestamo" method="post"><input type="hidden" value="' + data + '" name="folio">' +
                        '<button type="submit" style="background:transparent; border:none;">' + data + '</button></form>';
                },
            },
            {
                data: 1,
                render: function(data) {
                    return '<form action="index.php?pagina=detalleUsuario" method="post">' +
                        '<input type="hidden" id="start" name="codigo" value="' + data + '">' +
                        '<button type="submit" style="background:transparent; border:none;">' + data + '</button>' +
                        '</form>';
                },
            },
            { data: 2 },
            {
                data: 3,
                render: function(data) {
                    let fecha = new Date(data);
                    var m = parseInt(fecha.getMonth()) + 1;
                    return fecha.getDate() + "/" + m + "/" + fecha.getFullYear();

                },
            },
            {
                data: 3,
                render: function(data) {
                    let fecha = new Date(data);
                    return fecha.getHours() + ":" + fecha.getMinutes() + ":" + fecha.getSeconds();

                },
            },
            {
                data: 0,
                render: function(data) {
                    return '<div class="d-flex justify-content-center">' +
                        '<form action="#" method="post"><input type="hidden" value="' + data + '" name="cPF"><button type="submit" style="background:transparent; border:none;"><i class="bi bi-check-circle-fill"></i></button></form>' +
                        '</div>';
                },
            }

        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "pageLength": 10,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        "displayLength": 10
    });

    $('#container').css('display', 'block');
    table.columns.adjust().draw();

    setInterval(function() {
        table.ajax.reload(null, false); // user paging is not reset on reload
    }, 3000);

});