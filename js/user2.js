/*
const on = (element, event, selector, handler) => {
    element.addEventListener(event, e => {
        if (e.target.closest(selector)) {
            handler(e);
        }
    })
}

on(document, 'click', '.adapt', e => {
    //alert("edit pressed");
    const fila = e.target;
    var fn = fila.value;


    if (fila.checked) {
        //alert("isSelected");
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=insertAdapt',
            data: { "valor": fn },
            success: function(data) {
                alert(data);
            }
        });
        alert(fn);
    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarAdapt',
            data: { "valor": fn },
            success: function(data) {
                alert(data);
            }
        });
        alert(fn);
    }
});

on(document, 'click', '.boc', e => {
    //alert("edit pressed");
    const fila = e.target;
    var fn = fila.value;


    if (fila.checked) {
        //alert("isSelected");
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=insertBoc',
            data: { "valor": fn },
            success: function(data) {
                alert(data);
            }
        });
        alert(fn);
    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarBoc',
            data: { "valor": fn },
            success: function(data) {
                alert(data);
            }
        });
        alert(fn);
    }
});

on(document, 'click', '.cab', e => {
    //alert("edit pressed");
    const fila = e.target;
    var fn = fila.value;


    if (fila.checked) {
        alert("isSelected cab");
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=insertCab',
            data: { "valor": fn },
            success: function(data) {
                alert(data);
            }
        });
        alert(fn);
    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarCab',
            data: { "valor": fn },
            success: function(data) {
                alert(data);
            }
        });
        alert(fn);
    }
});


*/
var adaptadores = document.querySelectorAll('.adapt');

var bocinas = document.querySelectorAll('.boc');

var cables = document.querySelectorAll('.cab');

var tiempo = setInterval(function() {

    $.ajax({
        type: 'POST',
        url: './controladores/user.php?op=consultAdapt',
        data: { "valor": e.value },
        success: function(data) {
            //alert(data);
            if (data == "0") {

                var fila = e.parentNode.parentNode;

                fila.remove();

                adaptadores = document.querySelectorAll('.adapt');

                alert("uno de los adaptadores que estabas por solicitar, ya no está disponible");

                console.log("0");

            }


        }
    });

}, 2000);

/*

var tiempo = setInterval(function() {

    //console.log("codigo ejecutado");

    adaptadores.forEach((e) => {

        if (e.checked) {
            //console.log(e.value);
            $.ajax({
                type: 'POST',
                url: './controladores/user.php?op=consultAdapt',
                data: { "valor": e.value },
                success: function(data) {
                    //alert(data);
                    if (data == "0") {

                        var fila = e.parentNode.parentNode;

                        fila.remove();

                        adaptadores = document.querySelectorAll('.adapt');

                        alert("uno de los adaptadores que estabas por solicitar, ya no está disponible");

                        console.log("0");

                    }


                }
            });

        }

    });


    bocinas.forEach((e) => {

        if (e.checked) {
            //console.log(e.value);
            $.ajax({
                type: 'POST',
                url: './controladores/user.php?op=consultBoc',
                data: { "valor": e.value },
                success: function(data) {
                    //alert(data);
                    if (data == "0") {

                        var fila = e.parentNode.parentNode;

                        fila.remove();

                        bocinas = document.querySelectorAll('.boc');

                        alert("uno de las bocinas que estabas por solicitar, ya no está disponible");

                        console.log("0");

                    }


                }
            });

        }
    });

    //Cables

    cables.forEach((e) => {

        if (e.checked) {
            //console.log(e.value);
            $.ajax({
                type: 'POST',
                url: './controladores/user.php?op=consultCab',
                data: { "valor": e.value },
                success: function(data) {
                    //alert(data);
                    if (data == "0") {

                        var fila = e.parentNode.parentNode;

                        fila.remove();

                        cables = document.querySelectorAll('.cab');

                        alert("uno de los cables que estabas por solicitar, ya no está disponible");

                        console.log("0");

                    }


                }
            });

        }
    });

    //Cables

}, 2000);





/*
$(document).ready(function() {
    $("#flexSwitchCheckDefault").click(function() {

        $.ajax({
            type: 'POST',
            url: './controladores/user.php',
            success: function(data) {
                alert(data);
            }
        });
    });
});*/


/*
adaptadores.forEach((e) => {

        adaptadores = document.querySelectorAll('.adapt');

        if (e.checked) {
            //console.log(e.value);

            $.ajax({
                type: 'POST',
                url: './controladores/user.php?op=consultAdapt',
                data: { "valor": e.value },
                success: function(data1) {
                    //alert(data);
                    if (data1 == "0") {

                        var fila = e.parentNode.parentNode;

                        $.ajax({
                            type: 'POST',
                            url: './controladores/user.php?op=eliminarAdapt',
                            data: { "valor": e.value },
                            success: function(data) {
                                alert("uno de los adaptadores que estabas por solicitar, ya no está disponible");
                            }
                        });

                        

                        fila.remove();

                        console.log("0");

                    }


                }
            });

        }

    });
*/