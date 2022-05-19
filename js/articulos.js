$(".adapt").click((e) => {
    //console.log(e.currentTarget);
    var adaptador = e.currentTarget;
    var idA = adaptador.dataset.id;
    var marcaA = adaptador.dataset.marca;
    var modelo = adaptador.dataset.modelo;
    //console.log(idA);
    $("#idAdaptador").val(idA);
    $("#idAdaptadorH").val(idA);
    $("#marcaAdaptador").val(marcaA);
    $("#modeloAdaptador").val(modelo);

});

$(".boc").click((e) => {
    var bocina = e.currentTarget;
    var idB = bocina.dataset.id;
    var marcaB = bocina.dataset.marca;
    var modeloB = bocina.dataset.modelo;
    var obsB = bocina.dataset.obs;
    $("#idBocina").val(idB);
    $("#idBocinaH").val(idB);
    $("#marcaBocina").val(marcaB);
    $("#modeloBocina").val(modeloB);
    $("#observacionesBocina").val(obsB);
});

$(".cab").click((e) => {
    var cable = e.currentTarget;
    var idC = cable.dataset.valor;
    var marcaC = cable.dataset.marca;
    var conexion = cable.dataset.conexion;
    $("#idCable").val(idC);
    $("#idCableH").val(idC);
    $("#marcaCable").val(marcaC);
    $("#modeloC").val(conexion);

});

$(".lap").click((e) => {
    var laptop = e.currentTarget;
    var idL = laptop.dataset.id;
    var marcaL = laptop.dataset.marca;
    var modeloL = laptop.dataset.modelo;
    var snl = laptop.dataset.snl;
    var obsl = laptop.dataset.obs;
    $("#idLaptop").val(idL);
    $("#idLaptopH").val(idL);
    $("#marcaLaptop").val(marcaL);
    $("#modeloLaptop").val(modeloL);
    $("#snLaptop").val(snl);
    $("#observacionesLaptop").val(obsl);

});

$(".proy").click((e) => {
    var proy = e.currentTarget;
    var idP = proy.dataset.id;
    var marcaP = proy.dataset.marca;
    var modeloP = proy.dataset.modelo;
    $("#idProyector").val(idP);
    $("#idProyectorH").val(idP);
    $("#marcaProyector").val(marcaP);
    $("#modeloProyector").val(modeloP);
});