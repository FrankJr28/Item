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
    var table = $('#example').DataTable({
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
});