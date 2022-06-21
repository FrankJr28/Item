var adaptClicked;
var bocClicked;
var cabClicked;
var lapClicked;
var proyClicked;

$(".adapt").click((e) => {
    //console.log(e.currentTarget);
    var adaptador = e.currentTarget;
    var idA = adaptador.dataset.id;
    var marcaA = adaptador.dataset.marca;
    var modelo = adaptador.dataset.modelo;
    var disp = adaptador.dataset.disp;
    var obs = adaptador.dataset.obs;
    console.log(disp);
    //console.log(idA);
    $("#idAdaptador").val(idA);
    $("#idAdaptadorH").val(idA);
    $("#marcaAdaptador").val(marcaA);
    $("#modeloAdaptador").val(modelo);
    if (disp == 1) {
        $("#dispAdaptador").prop("checked", true);
        console.log("true" + disp);
    } else {
        $("#dispAdaptador").prop("checked", false);
        console.log("false" + disp);
    }
    $("#observacionesAdaptador").val(obs);

    adaptClicked = idA; //hola
});

$("#eliminarAdapt").click((e) => {
    //document.getElementById("idText").textContent = "hola";
    //$("#idText").text("prueba");
    $("#idText").text("¿Desea eliminar el adaptador con el id " + adaptClicked + " ?");
    $("#idEliAdapt").val(adaptClicked);
    console.log($("#idEliAdapt").val);
});

$(".boc").click((e) => {
    var bocina = e.currentTarget;
    var idB = bocina.dataset.id;
    var marcaB = bocina.dataset.marca;
    var modeloB = bocina.dataset.modelo;
    var dispB = bocina.dataset.disp;
    var obsB = bocina.dataset.obs;
    $("#idBocina").val(idB);
    $("#idBocinaH").val(idB);
    $("#marcaBocina").val(marcaB);
    $("#modeloBocina").val(modeloB);
    if (dispB == 1) {
        $("#dispBocina").prop("checked", true);
        console.log("true" + dispB);
    } else {
        $("#dispBocina").prop("checked", false);
        console.log("false" + dispB);
    }
    $("#observacionesBocina").val(obsB);
    bocClicked = idB;
});

$("#eliminarBoc").click((e) => {
    //document.getElementById("idText").textContent = "hola";
    //$("#idText").text("prueba");
    $("#idTextB").text("¿Desea eliminar la bocina con el id " + bocClicked + "?");
    $("#idEliBoc").val(bocClicked);
});

$(".cab").click((e) => {
    var cable = e.currentTarget;
    var idC = cable.dataset.valor;
    var marcaC = cable.dataset.marca;
    var dispC = cable.dataset.disp;
    var conexion = cable.dataset.conexion;
    $("#idCable").val(idC);
    $("#idCableH").val(idC);
    $("#marcaCable").val(marcaC);
    $("#modeloC").val(conexion);
    if (dispC == 1) {
        $("#dispCable").prop("checked", true);
        console.log("true" + dispC);
    } else {
        $("#dispCable").prop("checked", false);
        console.log("false" + dispC);
    }
    cabClicked = idC;
});

$("#eliminarCab").click((e) => {
    //document.getElementById("idText").textContent = "hola";
    //$("#idText").text("prueba");
    $("#idTextC").text("¿Desea eliminar el cable con el id " + cabClicked + "?");
    $("#idEliCab").val(cabClicked);

});

$(".lap").click((e) => {
    var laptop = e.currentTarget;
    var idL = laptop.dataset.id;
    var marcaL = laptop.dataset.marca;
    var modeloL = laptop.dataset.modelo;
    var dispL = laptop.dataset.disp;
    var snl = laptop.dataset.snl;
    var obsl = laptop.dataset.obs;
    $("#idLaptop").val(idL);
    $("#idLaptopH").val(idL);
    $("#marcaLaptop").val(marcaL);
    $("#modeloLaptop").val(modeloL);
    if (dispL == 1) {
        $("#dispLaptop").prop("checked", true);
        console.log("true" + dispL);
    } else {
        $("#dispLaptop").prop("checked", false);
        console.log("false" + dispL);
    }
    $("#snLaptop").val(snl);
    $("#observacionesLaptop").val(obsl);
    lapClicked = idL;

});

$("#eliminarLap").click((e) => {
    $("#idTextL").text("¿Desea eliminar la laptop con el id " + lapClicked + "?");
    $("#idEliLap").val(lapClicked);
});

$(".proy").click((e) => {
    var proy = e.currentTarget;
    var idP = proy.dataset.id;
    var marcaP = proy.dataset.marca;
    var modeloP = proy.dataset.modelo;
    var snp = proy.dataset.snp;
    var dispP = proy.dataset.disp;
    $("#idProyector").val(idP);
    $("#idProyectorH").val(idP);
    $("#marcaProyector").val(marcaP);
    if (dispP == 1) {
        $("#dispProyector").prop("checked", true);
        console.log("true" + dispP);
    } else {
        $("#dispProyector").prop("checked", false);
        console.log("false" + dispP);
    }
    $("#modeloProyector").val(modeloP);
    $("#snProyector").val(snp);
    proyClicked = idP;

});

$("#eliminarProy").click((e) => {
    $("#idTextC").text("¿Desea eliminar el proyector con el id " + proyClicked + "?");
    $("#idEliCab").val(proyClicked);
});

$(document).ready(function() {

    var tableA = $('#adminAdapt').DataTable({
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

    var tableB = $('#adminBoc').DataTable({
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

    var tableC = $('#adminCab').DataTable({
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

    var tableL = $('#adminLap').DataTable({
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

    var tableP = $('#adminProy').DataTable({
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