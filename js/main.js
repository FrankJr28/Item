//Código para Datables

//var table = $('#example').DataTable(); //Para inicializar datatables de la manera más simple
/*
$(document).ready(function() {
    $('#example').DataTable({
        columns: [
            //"dummy" configuration
            { visible: true }, //col 1
            { visible: true }, //col 2
            { visible: true }, //col 3
            { visible: true }, //col 4
            { visible: true } //col 5
        ]
    });
});
*/
//alert("desde datatables");

$(document).ready(function() {

    var table = $('#tablaDatos').DataTable({
        //var table = $('#example').DataTable({
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "pageLength": 10,
        //para cambiar el lenguaje a español
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

    //alert("desde el datatable");

    var table2 = $('#tablaDatos2').DataTable({
        //var table = $('#example').DataTable({
        ajax: {
            url: './controladores/ajaxTables.php',
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
            //{ data: 3 },

            //
            {
                className: '', // used by world-flags-sprite library
                data: 1,
                render: function(data, type) {
                    if (type === 'display') {
                        let act = 'text-danger';

                        if (data) {
                            act = 'text-success';
                        }

                        return '<i class="bi bi-circle-fill ' + act + '"></i>';
                    }

                    return data;
                },
            },
            //

            { data: 4 },
            {
                defaultContent: '<div class="d-flex justify-content-center">' +
                    '<form action="#" method="post"><input type="hidden" value="78" name="cPA"><button type="submit" style="background:transparent; border:none;"><i class="bi bi-check-square"></i></button></form>' +
                    '<form action="#" method="post"><input type="hidden" value="78" name="cPR"><button type="submit" style="background:transparent; border:none;"><i class="bi bi-trash"></i></button></form>' +
                    '</div'
            }

        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "pageLength": 10,
        //para cambiar el lenguaje a español
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
    table2.columns.adjust().draw();

    setInterval(function() {
        table2.ajax.reload();
    }, 3000);

});