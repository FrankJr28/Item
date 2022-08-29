var r;
var enc;
var adaptadores = document.querySelectorAll('.adapt');
var bocinas = document.querySelectorAll('.boc');
var cables = document.querySelectorAll('.cab');
var laptops = document.querySelectorAll('.lap');
var proyectores = document.querySelectorAll('.proy');

const contBoc = document.getElementById("contenedor-bocinas");
const contAdapt = document.getElementById("contenedor-adaptadores");
const contCab = document.getElementById("contenedor-cables");
const contLap = document.getElementById("contenedor-laptops");
const contProy = document.getElementById("contenedor-proyectores");

const miEspacio = document.getElementById("contEspacio");

miEspacio.hidden = true;

var mis_adaptadores = [];
var mis_bocinas = [];
var mis_cables = [];
var mis_laptops = [];
var mis_proyectores = [];

var tiempo = setInterval(function() {

        $.ajax({ //Adaptadores
            type: 'POST',
            url: './controladores/user.php?op=adapts',
            dataType: 'json',
            success: function(data) {
                if (data) {
                    r = data;
                    r2 = data;
                    adaptadores.forEach((e) => {
                        encontrado = false;
                        for (var i = r.length - 1; i >= 0; i--) { //para buscar en el json devuelto por el server
                            if (r[i][0] == e.value) {
                                encontrado = true;
                                r2.splice(i, 1);
                            }
                        }
                        if (!encontrado) {
                            var fila = e.parentNode.parentNode;
                            inp = e.target;
                            if (e.checked) {
                                console.log("está seleccionado");
                                Swal.fire({
                                    position: 'center',
                                    //icon: 'error',
                                    title: 'Uno de los adaptadores ha sido ocupado',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                            var fila = e.parentNode.parentNode;
                            console.log(fila);
                            fila.remove();
                            adaptadores = document.querySelectorAll('.adapt');
                        }
                    });

                    if (r2.length) { //Si R todavia tiene puedo crear nuevos elementos
                        console.log("hay un nuevo elemento " + r2[0][0]);
                        var nE;
                        for (var j = 0; j < r2.length; j++) {
                            var eta = '';
                            eta = '<a class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">';
                            eta += '<h6><strong>Id: </strong>' + r2[j][0] + '   modelo: ' + r2[j][2] + '</h6>';
                            eta += '<div class="form-check form-switch">';
                            eta += '<input class="form-check-input adapt" type="checkbox" value="' + r2[j][0] + '" name="adapt" dbs-name="3000000015" ';
                            if (r2[j][6]) {
                                eta += 'checked';
                            }
                            eta += '>';
                            eta += '</div>';
                            eta += '</a>';
                            contAdapt.insertAdjacentHTML('beforeend', eta);
                            adaptadores = document.querySelectorAll('.adapt');
                            console.log("append: " + r2[j][0]);
                            Swal.fire({
                                position: 'center',
                                title: 'Hay más adaptadores disponibles',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    }
                    checarEspacioAdapt();
                }
            }
        }); // Fin Adaptadores

        $.ajax({ // Bocinas
            type: 'POST',
            url: './controladores/user.php?op=bocs',
            dataType: 'json',
            success: function(data) {

                if (data) {
                    r = data;
                    r2 = data;
                    bocinas.forEach((e) => {
                        encontrado = false;
                        for (var i = r.length - 1; i >= 0; i--) { //para buscar en el json devuelto por el server
                            if (r[i][0] == e.value) {
                                encontrado = true;
                                r2.splice(i, 1);
                            }
                        }
                        if (!encontrado) {
                            var fila = e.parentNode.parentNode;
                            inp = e.target;
                            if (e.checked) {
                                console.log("está seleccionado");
                                Swal.fire({
                                    position: 'center',
                                    title: 'Una de las bocinas ha sido ocupada',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                console.log("Una de las bocinas ha sido ocupada");
                            }
                            var fila = e.parentNode.parentNode;
                            console.log(fila);
                            fila.remove();
                            bocinas = document.querySelectorAll('.boc');
                        }
                    });

                    if (r2.length) { //Si R todavia tiene puedo crear nuevos elementos
                        console.log("hay un nuevo elemento " + r2[0][0]);
                        var nE;
                        for (var j = 0; j < r2.length; j++) {
                            var eta = '';
                            eta = '<a class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">';
                            eta += '<h6><strong>Id: </strong>' + r2[j][0] + '   modelo: ' + r2[j][2] + '</h6>';
                            eta += '<div class="form-check form-switch">';
                            eta += '<input class="form-check-input boc" type="checkbox" value="' + r2[j][0] + '" name="boc" dbs-name="3000000015" ';
                            if (r2[j][6]) {
                                eta += 'checked';
                            }
                            eta += '>';
                            eta += '</div>';
                            eta += '</a>';
                            contBoc.insertAdjacentHTML('beforeend', eta);
                            bocinas = document.querySelectorAll('.boc');
                            console.log("Hay mas bocinas disponibles");
                            console.log("append: " + r2[j][0]);
                            Swal.fire({
                                position: 'center',
                                title: 'Hay más bocinas disponibles',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    }
                    checarEspacioBoc();
                }
            }
        }); // Fin bocinas

        $.ajax({ // Cables
            type: 'POST',
            url: './controladores/user.php?op=cables',
            dataType: 'json',
            success: function(data) {
                if (data) {
                    r = data;
                    r2 = data;
                    cables.forEach((e) => {
                        encontrado = false;
                        for (var i = r.length - 1; i >= 0; i--) { //para buscar en el json devuelto por el server
                            if (r[i][0] == e.value) {
                                encontrado = true;
                                r2.splice(i, 1);
                            }
                        }
                        if (!encontrado) {
                            var fila = e.parentNode.parentNode;
                            inp = e.target;
                            if (e.checked) {
                                Swal.fire({
                                    position: 'center',
                                    title: 'Uno de los cables ha sido ocupado',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                            var fila = e.parentNode.parentNode;
                            console.log(fila);
                            fila.remove();
                            cables = document.querySelectorAll('.cab');
                        }
                    });
                    if (r2.length) { //Si R todavia tiene puedo crear nuevos elementos
                        console.log("hay un nuevo elemento " + r2[0][0]);
                        var nE;
                        for (var j = 0; j < r2.length; j++) {
                            var eta = '';
                            eta = '<a class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">';
                            eta += '<h6><strong>Id: </strong>' + r2[j][0] + '   marca: ' + r2[j][1] + '</h6>';
                            eta += '<div class="form-check form-switch">';
                            eta += '<input class="form-check-input cab" type="checkbox" value="' + r2[j][0] + '" name="cab" dbs-name="3000000015" ';
                            if (r2[j][7]) {
                                eta += 'checked';
                            }
                            eta += '>';
                            eta += '</div>';
                            eta += '</a>';
                            contCab.insertAdjacentHTML('beforeend', eta);
                            cables = document.querySelectorAll('.cab');
                            Swal.fire({
                                position: 'center',
                                title: 'Hay más cables disponibles',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    }
                    checarEspacioCab();
                }
            }
        }); // Fin Cables

        $.ajax({ // Laptops
            type: 'POST',
            url: './controladores/user.php?op=laptops',
            dataType: 'json',
            success: function(data) {
                if (data) {
                    r = data;
                    r2 = data;
                    laptops.forEach((e) => {
                        encontrado = false;
                        for (var i = r.length - 1; i >= 0; i--) { //para buscar en el json devuelto por el server
                            if (r[i][0] == e.value) {
                                encontrado = true;
                                r2.splice(i, 1);
                            }
                        }
                        if (!encontrado) { //Sino lo encuentra lo debe eliminar
                            var fila = e.parentNode.parentNode; //Etiqueta <a> de cada articulo
                            inp = e.target; //El input
                            if (e.checked) {
                                Swal.fire({
                                    position: 'center',
                                    title: 'Una de las laptops ha sido ocupada',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                            var marca_l = e.name;
                            if ((document.getElementsByName(marca_l).length) < 2) { //que sea el ultima para eliminar los contenedores
                                var etiquetaDiv = document.getElementById("modal-lap-" + marca_l);
                                if (etiquetaDiv)
                                    etiquetaDiv.remove();
                                var etiquetaLi = document.getElementById("li-lap-" + marca_l);
                                if (etiquetaLi)
                                    etiquetaLi.remove();
                                var f = document.getElementsByClassName("modal-backdrop")[0];
                                if (f)
                                    f.remove();
                            } else {
                                //decrementar la cantidad del span azul
                                if ($("#sp-" + marca_l).length) {
                                    var spVal = document.getElementById("sp-" + marca_l).innerText;
                                    var intsp = parseInt(spVal);
                                    intsp--;
                                    document.getElementById("sp-" + marca_l).innerText = intsp;
                                }
                            }
                            var fila = e.parentNode.parentNode;
                            fila.remove();
                            laptops = document.querySelectorAll('.lap');
                        }



                    });

                    if (r2.length) { //Si R todavia tiene puedo crear nuevos elementos
                        var nE;
                        for (var j = 0; j < r2.length; j++) {

                            var eta = '';
                            eta = '<a class="list-group-item d-flex justify-content-between align-items-start list-group-item-action ">';
                            eta += '<h6><strong>Id: </strong>' + r2[j][0] + '   modelo: ' + r2[j][2] + '</h6>';
                            eta += '<div class="form-check form-switch">';
                            eta += '<input class="form-check-input lap" type="checkbox" value="' + r2[j][0] + '" name="' + r[j]["marca_l"] + '" dbs-name="3000000015" ';
                            if (r2[j][8]) {
                                eta += 'checked';
                            }
                            eta += '>';
                            eta += '</div>';
                            eta += '</a>';

                            if ($('#cont' + r[j]["marca_l"]).length) {
                                // si existe un contenedor de la marca
                                var spVal = document.getElementById("sp-" + r[j]["marca_l"]).innerText;
                                var intsp = parseInt(spVal);
                                intsp++;
                                document.getElementById("sp-" + r[j]["marca_l"]).textContent = intsp;
                                document.getElementById("cont" + r[j]["marca_l"]).insertAdjacentHTML('beforeend', eta);
                            } else {
                                /*Agregar el LI*/
                                var etli = '';
                                etli = '<li class="list-group-item list-group-item-action d-flex align-items-start" data-bs-toggle="modal" data-bs-target="#modal-lap-' + r[j]["marca_l"] + '" id="li-lap-' + r[j]["marca_l"] + '">';
                                etli += '<div class="ms-2 me-auto">';
                                etli += '<div class="fw-bold">' + r[j]["marca_l"] + '</div>';
                                etli += '</div>';
                                etli += '<span class="badge bg-primary rounded-pill" id="sp-' + r[j]["marca_l"] + '">1</span>';
                                etli += '</li>';
                                /*Agregar Modal*/
                                var etd = '';
                                etd += '<div class="modal fade" id="modal-lap-' + r[j]["marca_l"] + '" tabindex="-1" aria-labelledby="modal-lap" style="display: none;" aria-hidden="true">';
                                etd += '<div class="modal-dialog">';
                                etd += '<div class="modal-content">';
                                etd += '<div class="modal-header">';
                                etd += '<i class="fa fa-light fa-laptop" aria-hidden="true"></i>';
                                etd += '<h5 class="modal-title" id="exampleModalLabel">Laptops</h5>';
                                etd += '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                etd += '</div>'

                                etd += '<div class="modal-body">';
                                etd += '<div class="list-group" id="cont' + r[j]["marca_l"] + '">';
                                etd += '<a class="list-group-item actit d-flex justify-content-between align-items-start">';
                                etd += '<h6>Laptop Id</h6>';
                                etd += '<h6>Solicitar</h6>';
                                etd += '</a>';
                                etd += '</div>';
                                etd += '</div>';

                                etd += '</div>';
                                etd += '</div>';
                                etd += '</div>';
                                contLap.insertAdjacentHTML('beforeend', etli);
                                contLap.insertAdjacentHTML('beforeend', etd);
                                document.getElementById("cont" + r[j]["marca_l"]).insertAdjacentHTML('beforeend', eta);

                            }
                            laptops = document.querySelectorAll('.lap');

                            Swal.fire({
                                position: 'center',
                                title: 'Hay más laptops disponibles',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    }
                    checarEspacioLap();
                }
            }
        });
        // Fin Laptops

        $.ajax({ // Proyectores
            type: 'POST',
            url: './controladores/user.php?op=proyectores',
            dataType: 'json',
            success: function(data) {
                if (data) {
                    r = data;
                    r2 = data;

                    proyectores.forEach((e) => {
                        encontrado = false;
                        for (var i = r.length - 1; i >= 0; i--) { //para buscar en el json devuelto por el server
                            if (r[i][0] == e.value) {
                                encontrado = true;
                                r2.splice(i, 1);
                            }
                        }
                        if (!encontrado) { //Sino lo encuentra lo debe eliminar
                            var fila = e.parentNode.parentNode; //Etiqueta <a> de cada articulo
                            inp = e.target; //El input
                            if (e.checked) {
                                Swal.fire({
                                    position: 'center',
                                    title: 'Uno de los proyectores ha sido ocupado',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                            var marca_p = e.name;
                            if ((document.getElementsByName(marca_p).length) < 2) { //que sea el ultima para eliminar los contenedores
                                var etiquetaDiv = document.getElementById("modal-proy-" + marca_p);
                                if (etiquetaDiv)
                                    etiquetaDiv.remove();
                                var etiquetaLi = document.getElementById("li-proy-" + marca_p);
                                if (etiquetaLi)
                                    etiquetaLi.remove();
                                var f = document.getElementsByClassName("modal-backdrop")[0];
                                if (f)
                                    f.remove();
                            } else {
                                //decrementar la cantidad del span azul
                                if ($("#sp-proy-" + marca_p).length) {
                                    var spVal = document.getElementById("sp-proy-" + marca_p).innerText;
                                    var intsp = parseInt(spVal);
                                    intsp--;
                                    document.getElementById("sp-proy-" + marca_p).innerText = intsp;
                                }
                            }
                            var fila = e.parentNode.parentNode;
                            fila.remove();
                            proyectores = document.querySelectorAll('.proy');
                        }



                    });

                    if (r2.length) { //Si R todavia tiene puedo crear nuevos elementos
                        var nE;
                        for (var j = 0; j < r2.length; j++) {

                            var eta = '';
                            eta = '<a class="list-group-item d-flex justify-content-between align-items-start list-group-item-action ">';
                            eta += '<h6><strong>Id: </strong>' + r2[j][0] + '   modelo: ' + r2[j][2] + '</h6>';
                            eta += '<div class="form-check form-switch">';
                            eta += '<input class="form-check-input proy" type="checkbox" value="' + r2[j][0] + '" name="' + r[j]["marca_p"] + '"';
                            if (r2[j][7]) { //si está el usuario
                                eta += 'checked';
                            }
                            eta += '>';
                            eta += '</div>';
                            eta += '</a>';

                            if ($('#contProy' + r[j]["marca_p"]).length) {
                                // si existe un contenedor de la marca
                                var spVal = document.getElementById("sp-proy-" + r[j]["marca_p"]).innerText;
                                var intsp = parseInt(spVal);
                                intsp++;
                                document.getElementById("sp-proy-" + r[j]["marca_p"]).textContent = intsp;
                                document.getElementById("contProy" + r[j]["marca_p"]).insertAdjacentHTML('beforeend', eta);
                            } else {
                                /*Agregar el LI*/
                                var etli = '';
                                etli = '<li class="list-group-item list-group-item-action d-flex align-items-start" data-bs-toggle="modal" data-bs-target="#modal-proy-' + r[j]["marca_p"] + '" id="li-proy-' + r[j]["marca_p"] + '">';
                                etli += '<div class="ms-2 me-auto">';
                                etli += '<div class="fw-bold">' + r[j]["marca_p"] + '</div>';
                                etli += '</div>';
                                etli += '<span class="badge bg-primary rounded-pill" id="sp-proy-' + r[j]["marca_p"] + '">1</span>';
                                etli += '</li>';
                                /*Agregar Modal*/
                                var etd = '';
                                etd += '<div class="modal fade" id="modal-proy-' + r[j]["marca_p"] + '" tabindex="-1" aria-labelledby="modal-proy" style="display: none;" aria-hidden="true">';
                                etd += '<div class="modal-dialog">';
                                etd += '<div class="modal-content">';
                                etd += '<div class="modal-header">';
                                etd += '<i class="fa fa-light fa-desktop" aria-hidden="true"></i>';
                                etd += '<h5 class="modal-title">Proyectores</h5>';
                                etd += '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                etd += '</div>'

                                etd += '<div class="modal-body">';
                                etd += '<div class="list-group" id="contProy' + r[j]["marca_p"] + '">';
                                etd += '<a class="list-group-item actit d-flex justify-content-between align-items-start">';
                                etd += '<h6>Laptop Id</h6>';
                                etd += '<h6>Solicitar</h6>';
                                etd += '</a>';
                                etd += '</div>';
                                etd += '</div>';

                                etd += '</div>';
                                etd += '</div>';
                                etd += '</div>';

                                contProy.insertAdjacentHTML('beforeend', etli);

                                contProy.insertAdjacentHTML('beforeend', etd);

                                document.getElementById("contProy" + r[j]["marca_p"]).insertAdjacentHTML('beforeend', eta);

                            }
                            proyectores = document.querySelectorAll('.proy');
                            Swal.fire({
                                position: 'center',
                                title: 'Hay más proyectores disponibles',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    }
                    checarEspacioProy();
                }
            }
        });
        // Fin Laptops

    },
    2000);

function checarEspacioAdapt() {
    var adaptsAct = [];
    var adapts = document.querySelectorAll(".adapt");
    adapts.forEach(element => {
        if (element.checked) {
            adaptsAct.push(element.value);
        }
    });

    if (JSON.stringify(adaptsAct) !== JSON.stringify(mis_adaptadores)) {
        var aux = "";
        for (var i = 0; i < adaptsAct.length; i++) {
            aux += '<li class="list-group-item list-group-item-primary m-1">Adaptador <strong>ID:</strong>' + adaptsAct[i] + '</li>';
        }
        miEspacio.hidden = false;
        document.getElementById("mi-espacio-adapt").innerHTML = aux;
        mis_adaptadores = adaptsAct;
        //console.log("mis adaptadores: " + mis_adaptadores + typeof(mis_adaptadores) + " adaptadores activos: " + adaptsAct + typeof(adaptsAct))
    }
}

function checarEspacioBoc() {
    var bocsAct = [];
    var bocs = document.querySelectorAll(".boc");
    bocs.forEach(element => {
        if (element.checked) {
            bocsAct.push(element.value);
        }
    });

    if (JSON.stringify(bocsAct) !== JSON.stringify(mis_bocinas)) {
        var aux = "";
        for (var i = 0; i < bocsAct.length; i++) {
            aux += '<li class="list-group-item list-group-item-success m-1">Bocinas <strong>ID:</strong>' + bocsAct[i] + '</li>';
        }
        console.log("bocinas");
        miEspacio.hidden = false;
        document.getElementById("mi-espacio-boc").innerHTML = aux;
        mis_bocinas = bocsAct;
    }
}

function checarEspacioCab() {
    var cabsAct = [];
    var cabs = document.querySelectorAll(".cab");
    cabs.forEach(element => {
        if (element.checked) {
            cabsAct.push(element.value);
        }
    });

    if (JSON.stringify(cabsAct) !== JSON.stringify(mis_cables)) {
        var aux = "";
        for (var i = 0; i < cabsAct.length; i++) {
            aux += '<li class="list-group-item list-group-item-dark m-1">Cable <strong>ID:</strong>' + cabsAct[i] + '</li>';
        }
        console.log("cables");
        miEspacio.hidden = false;
        document.getElementById("mi-espacio-cab").innerHTML = aux;
        mis_cables = cabsAct;
    }
}

function checarEspacioLap() {
    var lapsAct = [];
    var laps = document.querySelectorAll(".lap");
    laps.forEach(element => {
        if (element.checked) {
            lapsAct.push(element.value);
        }
    });

    if (JSON.stringify(lapsAct) !== JSON.stringify(mis_laptops)) {
        var aux = "";
        for (var i = 0; i < lapsAct.length; i++) {
            aux += '<li class="list-group-item list-group-item-warning m-1">Laptop <strong>ID:</strong>' + lapsAct[i] + '</li>';
        }
        console.log("laptops");
        miEspacio.hidden = false;
        document.getElementById("mi-espacio-lap").innerHTML = aux;
        mis_laptops = lapsAct;
    }
}

function checarEspacioProy() {
    var proysAct = [];
    var proys = document.querySelectorAll(".proy");
    proys.forEach(element => {
        if (element.checked) {
            proysAct.push(element.value);
        }
    });

    if (JSON.stringify(proysAct) !== JSON.stringify(mis_proyectores)) {
        var aux = "";
        for (var i = 0; i < proysAct.length; i++) {
            aux += '<li class="list-group-item list-group-item-info m-1">Proyector <strong>ID:</strong>' + proysAct[i] + '</li>';
        }
        //miEspacio.hidden = false;
        document.getElementById("mi-espacio-proy").innerHTML = aux;
        mis_proyectores = proysAct;
    }
}

const on = (element, event, selector, handler) => {
    element.addEventListener(event, e => {
        if (e.target.closest(selector)) {
            handler(e);
        }
    })
}


on(document, 'click', '.adapt', e => {

    const fila = e.target;
    var fn = fila.value;

    if (fila.checked) {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=insertAdapt',
            data: { "valor": fn },
            success: function(data) {}
        });


    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarAdapt',
            data: { "valor": fn },
            success: function(data) {}
        });

    }
});

on(document, 'click', '.boc', e => {

    const fila = e.target;
    var fn = fila.value;

    if (fila.checked) {

        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=insertBoc',
            data: { "valor": fn },
            success: function(data) {}

        });

    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarBoc',
            data: { "valor": fn },
            success: function(data) {}
        });
    }
});

on(document, 'click', '.cab', e => {

    const fila = e.target;
    var fn = fila.value;

    if (fila.checked) {

        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=insertCab',
            data: { "valor": fn },
            success: function(data) {}

        });

    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarCab',
            data: { "valor": fn },
            success: function(data) {}
        });
    }
});

on(document, 'click', '.lap', e => {

    const fila = e.target;
    var fn = fila.value;

    if (fila.checked) {

        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=insertLap',
            data: { "valor": fn },
            success: function(data) {}

        });
    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarLap',
            data: { "valor": fn },
            success: function(data) {}
        });
    }
});

on(document, 'click', '.proy', e => {

    const fila = e.target;
    var fn = fila.value;

    if (fila.checked) {

        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=insertProy',
            data: { "valor": fn },
            success: function(data) {}

        });
    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarProy',
            data: { "valor": fn },
            success: function(data) {}
        });
    }
});