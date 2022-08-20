$(document).ready(function() {
    var table = $('#adminUsuarios').DataTable({
        //var table = $('#example').DataTable({
        ajax: {
            url: './controladores/tablas/tablaUsuarios.php',
            dataSrc: ''
        },
        columns: [
            { data: 'codigo_u' },
            //
            {
                className: '', // used by world-flags-sprite library
                data: 'act',
                render: function(data, type) {
                    if (type === 'display') {
                        let act = 'text-success';
                        if (data == 1) {
                            act = 'text-danger';
                        }
                        return '<i class="bi bi-circle-fill ' + act + '"></i>';
                    }
                    return data;
                },
            },
            //
            { data: 'nombre_u' },
            { data: 'app_u' },
            { data: 'apm_u' },
            //
            { data: 'correo_u' },
            { data: 'telefono' },
            { data: 'carrera' },
            { data: 'semestre' }
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
        "displayLength": 10,

        fnCreatedRow: function(row, data) {
            $(row).attr('data-bs-toggle', 'modal');
            $(row).attr('data-bs-target', '#editarUsuario');
        }

    });

    $('#container').css('display', 'block');
    table.columns.adjust().draw();

    setInterval(function() {
        table.ajax.reload(null, false); // user paging is not reset on reload
    }, 30000);

    //

    var usuarioClicked;

    $('#adminUsuarios').on('click', 'tr', function() {

        var data = table.row(this).data();

        $("#idUsuario").val(data["codigo_u"]);
        $("#nUsuario").val(data["nombre_u"]);
        $("#pUsuario").val(data["app_u"]);
        $("#mUsuario").val(data["apm_u"]);
        $("#corUsuario").val(data["correo_u"]);
        $("#tUsuario").val(data["telefono"]);
        $("#carUsuario").val(data["id_car"]);
        $("#sUsuario").val(data["semestre"]);
        $("#verificadou").val(data["act"]);

        usuarioClicked = data["codigo_u"];
        console.log("desde usuarios.js" + data["codigo_u"]);

        //

        //alert('You clicked on ' + data[0] + '\'s row');
    });
    //

    $("#btnEliminarUsuario").click((e) => {
        $("#idText").text("¿Desea eliminar el usuario con el código " + usuarioClicked + "?");
        $("#idEliUsu").val(usuarioClicked);
        console.log($("#idEliUsu").val);
    });

    $("#btnRestablecerContrasena").click((e) => {
        $("#idResPass").val(usuarioClicked);
    });

});