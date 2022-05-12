$(".cab").click(function(e) {
    console.log(e.currentTarget);
    var cable = e.currentTarget;
    var vale = cable.dataset.valor;
    console.log(vale);
    $("#idCable").val(vale);

});

var tiempo = setInterval(function() {
    $.ajax({
        type: 'POST',
        url: './controladores/articulosAdmin.php?op=cables',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if (data) {
                $(".cab").forEach(element => {
                    console.log(element);
                });
            }
        }
    });
}, 2000);

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