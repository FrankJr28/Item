var usuarioClicked;

$(".usuario").click((e) => {
    var usuario = e.currentTarget;
    var codigou = usuario.dataset.id;
    var nombreu = usuario.dataset.nombre;
    var appu = usuario.dataset.app;
    var apmu = usuario.dataset.apm;
    var correou = usuario.dataset.correo;
    var telefonou = usuario.dataset.telefono;
    var carrerau = usuario.dataset.carrera;
    var semestreu = usuario.dataset.semestre;
    var act = usuario.dataset.act;

    $("#idUsuario").val(codigou);
    $("#nUsuario").val(nombreu);
    $("#pUsuario").val(appu);
    $("#mUsuario").val(apmu);
    $("#corUsuario").val(correou);
    $("#tUsuario").val(telefonou);
    $("#carUsuario").val(carrerau);
    $("#sUsuario").val(semestreu);
    $("#verificadou").val(act);

    usuarioClicked = usuario.dataset.id;
});

$("#btnEliminarUsuario").click((e) => {

    $("#idText").text("¿Desea eliminar el usuario con el código " + usuarioClicked + "?");
    $("#idEliUsu").val(usuarioClicked);
    console.log($("#idEliUsu").val);
});