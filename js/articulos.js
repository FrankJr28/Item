$(".adapt").click((e) => {
    console.log(e.currentTarget);
    var adaptador = e.currentTarget;
    var idA = adaptador.dataset.id;
    var marcaC = adaptador.dataset.marca;
    var modelo = adaptador.dataset.modelo;
    console.log(idA);
    $("#idAdaptador").val(idC);
    $("#marcaAdaptador").val(marcaC);
    $("#conexionAdaptador").val(conexion);

});

$(".boc").click((e) => {
    console.log(e.currentTarget);
    var bocina = e.currentTarget;
    var idB = bocina.dataset.id;
    var marcaB = bocina.dataset.marca;
    var modeloB = bocina.dataset.modelo;
    console.log(idB);
    $("#idBocina").val(idB);
    $("#marcaBocina").val(marcaB);
    $("#modeloBocina").val(modeloB);
});

$(".cab").click((e) => {
    console.log(e.currentTarget);
    var cable = e.currentTarget;
    var idC = cable.dataset.valor;
    var marcaC = cable.dataset.marca;
    var conexion = cable.dataset.conexion;
    console.log(idC);
    $("#idCable").val(idC);
    $("#marcaCable").val(marcaC);
    $("#conexionCable").val(conexion);

});

$(".lap").click((e) => {
    console.log(e.currentTarget);
    var laptop = e.currentTarget;
    var idL = laptop.dataset.id;
    var marcaL = laptop.dataset.marca;
    var modeloL = laptop.dataset.modelo;
    var snl = laptop.dataset.snl;
    console.log(idL);
    $("#idLaptop").val(idL);
    $("#marcaLaptop").val(marcaL);
    $("#modeloLaptop").val(modeloL);
    $("#snLaptop").val(snl);
});

$(".proy").click((e) => {
    console.log(e.currentTarget);
    var proy = e.currentTarget;
    var idP = proy.dataset.id;
    var marcaP = proy.dataset.marca;
    var modeloP = proy.dataset.modelo;
    console.log(idP);
    $("#idProyector").val(idP);
    $("#marcaProyector").val(marcaP);
    $("#modeloProyector").val(modeloP);
});





var cables = document.querySelectorAll(".cab");


/*
var tiempo = setInterval(function() {
    $.ajax({
        type: 'POST',
        url: './controladores/articulosAdmin.php?op=cables',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if (data) {
                cables.forEach((e){

                });
            }
        }
    });
}, 2000);
*/
/*
on(document, 'click', '.cab', e => {

    alert("hAS PRESIONADO ELEMENT .cab " + e.delegateTarget);

    console.log(e.delegateTarget);
});
/*
cables = document.querySelectorAll(".cab");
cables.addEventListener("click", (e) => {
    alert("Has seleccionado: ");
});*/