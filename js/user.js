var r;

var enc;

var adaptadores = document.querySelectorAll('.adapt');

var bocinas = document.querySelectorAll('.boc');

var cables = document.querySelectorAll('.cab');

var laptops = document.querySelectorAll('.lap');


const contBoc = document.getElementById("contenedor-bocinas");

const contAdapt = document.getElementById("contenedor-adaptadores");

const contCab = document.getElementById("contenedor-cables");

const contLap = document.getElementById("contenedor-laptops");


var tiempo = setInterval(function() {
        $.ajax({
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
                            const eta = document.createElement("a");
                            eta.className = "list-group-item d-flex justify-content-between align-items-start list-group-item-action";
                            const tit = document.createElement("h6");
                            tit.innerHTML = r2[j][1] + " " + r2[j][2];
                            const etdiv = document.createElement("div");
                            etdiv.className = "form-check form-switch";
                            const etinp = document.createElement("input");
                            etinp.className = "form-check-input adapt";
                            etinp.type = "checkbox";
                            etinp.name = "adapt";
                            etinp.value = r2[j][0];
                            etdiv.appendChild(etinp);
                            eta.appendChild(tit);
                            eta.appendChild(etdiv)
                            contAdapt.appendChild(eta);
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
                }
            }
        });
        // Fin Adaptadores
        // Bocinas
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=bocs',
            dataType: 'json',
            success: function(data) {

                if (data) {

                    r = data;

                    r2 = data;

                    //console.log("Despues de la peticion");

                    //console.log(r)

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
                                    //icon: 'error',
                                    title: 'Una de las bocinas ha sido ocupada',

                                    showConfirmButton: false,

                                    timer: 2000
                                });

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

                            const eta = document.createElement("a");

                            eta.className = "list-group-item d-flex justify-content-between align-items-start list-group-item-action";

                            const tit = document.createElement("h6");

                            tit.innerHTML = r2[j][1] + " " + r2[j][2];

                            const etdiv = document.createElement("div");

                            etdiv.className = "form-check form-switch";

                            const etinp = document.createElement("input");

                            etinp.className = "form-check-input boc";

                            etinp.type = "checkbox";

                            etinp.name = "boc";

                            etinp.value = r2[j][0];

                            etdiv.appendChild(etinp);

                            eta.appendChild(tit);

                            eta.appendChild(etdiv)

                            contBoc.appendChild(eta);

                            bocinas = document.querySelectorAll('.boc');

                            console.log("append: " + r2[j][0]);

                            Swal.fire({
                                position: 'center',
                                title: 'Hay más bocinas disponibles',
                                showConfirmButton: false,
                                timer: 2000
                            });

                        }

                    }

                }


            }
        });

        // Fin bocinas

        // Cables

        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=cables',
            dataType: 'json',
            success: function(data) {

                if (data) {

                    r = data;

                    r2 = data;

                    //console.log("Despues de la peticion");

                    //console.log(r)

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

                                console.log("está seleccionado");

                                Swal.fire({
                                    position: 'center',
                                    //icon: 'error',
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

                            const eta = document.createElement("a");

                            eta.className = "list-group-item d-flex justify-content-between align-items-start list-group-item-action";

                            const tit = document.createElement("h6");

                            tit.innerHTML = r2[j][1] + " " + r2[j][2];

                            const etdiv = document.createElement("div");

                            etdiv.className = "form-check form-switch";

                            const etinp = document.createElement("input");

                            etinp.className = "form-check-input cab";

                            etinp.type = "checkbox";

                            etinp.name = "cab";

                            etinp.value = r2[j][0];

                            etdiv.appendChild(etinp);

                            eta.appendChild(tit);

                            eta.appendChild(etdiv)

                            contCab.appendChild(eta);

                            cables = document.querySelectorAll('.cab');

                            console.log("append: " + r2[j][0]);

                            Swal.fire({
                                position: 'center',
                                title: 'Hay más cables disponibles',
                                showConfirmButton: false,
                                timer: 2000
                            });

                        }

                    }

                }


            }
        });

        // Fin Cables

        // Laptops

        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=laptops',
            dataType: 'json',
            success: function(data) {

                if (data) {

                    r = data;

                    r2 = data;

                    console.log("Despues de la peticion laps");

                    console.log(r)

                    laptops.forEach((e) => {

                        encontrado = false;

                        for (var i = r.length - 1; i >= 0; i--) { //para buscar en el json devuelto por el server

                            if (r[i][0] == e.value) {

                                encontrado = true;

                                r2.splice(i, 1);

                            }

                        }

                        console.log("Antes encontrado Laptop");

                        console.log(r2);

                        if (!encontrado) {

                            var fila = e.parentNode.parentNode;

                            inp = e.target;

                            if (e.checked) {

                                console.log("está seleccionado");

                                Swal.fire({
                                    position: 'center',
                                    //icon: 'error',
                                    title: 'Una de las laptops ha sido ocupada',

                                    showConfirmButton: false,

                                    timer: 2000
                                });

                            }

                            var marca_l = e.name;

                            console.log("la marca de la laptop dada de baja es: " + marca_l);

                            console.log(document.getElementsByName(marca_l).length);

                            if ((document.getElementsByName(marca_l).length) < 2) {

                                var etiquetaLi = document.getElementById("li-lap-" + marca_l);

                                var etiquetaDiv = document.getElementById("modal-lap-" + marca_l);

                                etiquetaDiv.remove();

                                etiquetaLi.remove();

                            } else {

                                //decrementar la cantidad del span azul
                                if ($("#sp-" + marca_l).length) {

                                    var spVal = document.getElementById("sp-" + marca_l).innerText;

                                    var intsp = parseInt(spVal);

                                    intsp--;

                                    document.getElementById("sp-" + marca_l).innerText = intsp;

                                    console.log("decrementó");
                                }


                            }



                            var fila = e.parentNode.parentNode;

                            console.log(fila);

                            fila.remove();

                            laptops = document.querySelectorAll('.lap');

                            /*
                            data.forEach(function(dato) {
                                if(dato.asistio) {
                                    asistieron++;
                                }
                            });
                            */
                        }



                    });

                    if (r2.length) { //Si R todavia tiene puedo crear nuevos elementos

                        console.log("hay un nuevo elemento " + r2[0][0]);

                        var nE;

                        for (var j = 0; j < r2.length; j++) {

                            const eta = document.createElement("a");

                            eta.className = "list-group-item d-flex justify-content-between align-items-start list-group-item-action";

                            const tit = document.createElement("h6");

                            tit.innerHTML = r2[j][1] + " " + r2[j][2];

                            const etdiv = document.createElement("div");

                            etdiv.className = "form-check form-switch";

                            const etinp = document.createElement("input");

                            etinp.className = "form-check-input lap";

                            etinp.type = "checkbox";

                            etinp.name = "lap";

                            etinp.value = r2[j][0];

                            etinp.name = r2[j][1];

                            etdiv.appendChild(etinp);

                            eta.appendChild(tit);

                            eta.appendChild(etdiv)

                            //Aquí se añade al contenedor correspondiente
                            //contCab.appendChild(eta);

                            //id="modal-lap-'.$dato["marca_l"]

                            //document.getElementById("cont" + r[j]["marca_l"]).appendChild(eta);

                            if ($('#cont' + r[j]["marca_l"]).length) {
                                // si existe
                                //$('#cont' + r[j]["marca_l"]).appendChild(eta);

                                var spVal = document.getElementById("sp-" + r[j]["marca_l"]).innerText;

                                var intsp = parseInt(spVal);

                                intsp++;

                                document.getElementById("sp-" + r[j]["marca_l"]).innerText = intsp;

                                console.log("decrementó");

                                //

                                document.getElementById("cont" + r[j]["marca_l"]).appendChild(eta);

                            } else {
                                /*Agregar el LI*/
                                const etli = document.createElement("li");

                                etli.className = "list-group-item list-group-item-action d-flex align-items-start";

                                etli.dataset.bsToggle = "modal";

                                etli.dataset.bsTarget = "#modal-lap-" + r[j]["marca_l"];

                                etli.id = "li-lap-" + r[j]["marca_l"];

                                var divM = document.createElement("div");

                                divM.className = "ms-2 me-auto";

                                var divMn = document.createElement("div");

                                divMn.className = "fw-bold";

                                //tit.innerHTML = r2[j][1] + " " + r2[j][2];

                                divMn.innerHTML = r2[j][1];

                                var spn = document.createElement("span");

                                spn.className = "badge bg-primary rounded-pill";

                                spn.id = "sp-" + r2[j][1];

                                spn.innerHTML = "1";

                                divM.appendChild(divMn);

                                etli.appendChild(divM);

                                etli.appendChild(spn);

                                etli.appendChild(eta);

                                /*Agregar LI*/

                                /*Agregar Modal*/

                                var div1 = document.createElement("div");
                                div1.className = "modal fade";
                                div1.id = "modal-lap-" + r[j]["marca_l"];
                                div1.tabIndex = -1;
                                div1.arialabelledby = "modal-lap";
                                div1.ariaHidden = "true";

                                var div2 = document.createElement("div");
                                div2.className = "modal-dialog";

                                var div3 = document.createElement("div");
                                div3.className = "modal-content";

                                var div4 = document.createElement("div");
                                div4.className = "modal-header"

                                var div4i = document.createElement("i");
                                div4i.className = "fa fa-light fa-laptop";
                                var div4h5 = document.createElement("h5");
                                div4h5.className = "modal-title";
                                div4h5.id = "exampleModalLabel";
                                div4h5.innerHTML = "Laptops";
                                var div4b = document.createElement("button");
                                div4b.type = "button";
                                div4b.className = "btn-close";
                                //etli.dataset.bsToogle = "modal";
                                div4b.dataset.bsDismiss = "modal";
                                div4b.ariaLabel = "Close";

                                div4.appendChild(div4i);
                                div4.appendChild(div4h5);
                                div4.appendChild(div4b);

                                var div42 = document.createElement("div");
                                div42.className = "modal-body";

                                var div5 = document.createElement("div");
                                div5.className = "list-group";
                                div5.id = "cont" + r[j]["marca_l"];


                                var a6 = document.createElement("a");
                                a6.className = "list-group-item actit d-flex justify-content-between align-items-start";

                                var h671 = document.createElement("h6");
                                h671.innerHTML = "Laptop Id";

                                var h672 = document.createElement("h6");
                                h672.innerHTML = "Solicitar";


                                a6.appendChild(h671);
                                a6.appendChild(h672);

                                div5.appendChild(a6);
                                div5.appendChild(eta);

                                div42.appendChild(div5);

                                div3.appendChild(div4);
                                div3.appendChild(div42);

                                div2.appendChild(div3);

                                div1.appendChild(div2);


                                contLap.appendChild(div1);

                                contLap.appendChild(etli);

                                /*Agregar Modal*/

                                // no existe


                            }

                            laptops = document.querySelectorAll('.lap');

                            console.log("append: " + r2[j][0]);

                            Swal.fire({
                                position: 'center',
                                title: 'Hay más laptops disponibles',
                                showConfirmButton: false,
                                timer: 2000
                            });

                        }

                    }

                }


            }
        });

        // Fin Laptops



    },
    2000);


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
            success: function(data) {
                console.log(data);
            }

        });

        alert(fn);

    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarAdapt',
            data: { "valor": fn },
            success: function(data) {
                console.log(data);
            }
        });
        alert(fn);
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
            success: function(data) {
                console.log(data);
            }

        });

        alert(fn);

    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarBoc',
            data: { "valor": fn },
            success: function(data) {
                console.log(data);
            }
        });
        alert(fn);
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
            success: function(data) {
                console.log(data);
            }

        });

        alert(fn);

    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarCab',
            data: { "valor": fn },
            success: function(data) {
                console.log(data);
            }
        });
        alert(fn);
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
            success: function(data) {
                console.log(data);
            }

        });

        alert(fn);

    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarLap',
            data: { "valor": fn },
            success: function(data) {
                console.log(data);
            }
        });
        alert(fn);
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
            success: function(data) {
                console.log(data);
            }

        });

        alert(fn);

    } else {
        $.ajax({
            type: 'POST',
            url: './controladores/user.php?op=eliminarProy',
            data: { "valor": fn },
            success: function(data) {
                console.log(data);
            }
        });
        alert(fn);
    }
});