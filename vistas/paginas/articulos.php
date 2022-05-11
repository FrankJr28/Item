
<link rel="stylesheet" href="./css/styleModF.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<div class="mb-4">
    <h3>Artículos</h3>
</div>

<div class="accord-format">
    <div class="accordion m-3" id="accordionItems">
        <div class="accordion-item">
            <h3 class="accordion-header" id="accorAdaptador-head">
                <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#accorAdaptador" aria-expanded="true" aria-controls="accorAdaptador">
                    Adaptadores
                </button>
            </h3>
        <div id="accorAdaptador" class="accordion-collapse collapse" aria-labelledby="accorAdaptador-head" data-bs-parent="#accordionItems">
            <div class="accordion-body listItemByItem">

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Adaptador Id</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Disponible</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Acer</td>
                            <td>Aptitude</td>
                            <td>Sí</td>
                        </tr>
                    </tbody>
                
                </table>

                <div class="d-flex justify-content-center btn-plus">
                    <button class="btn-plus-sty" data-bs-toggle="modal" data-bs-target="#nuevoArt">
                        <i class="bi bi-plus-circle"></i>Nuevo
                    </button>
                </div>
            </div><!-- Accord body-->
        </div><!-- Accord content-->
        </div><!-- Accord item-->

        <div class="accordion-item">
            <h3 class="accordion-header" id="accorBocina-head">
                <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#accorBocina" aria-expanded="true" aria-controls="accorBocina">
                    Bocinas
                </button>
            </h3>
        <div id="accorBocina" class="accordion-collapse collapse" aria-labelledby="accorBocina-head" data-bs-parent="#accordionItems">
            <div class="accordion-body listItemByItem">

                <?php
                
                $bocinas = new controladorArticulos();
                $bocinas->ctrObtenerBocinas();

                ?>

                <div class="d-flex justify-content-center btn-plus">
                    <button class="btn-plus-sty" data-bs-toggle="modal" data-bs-target="#nuevoArt">
                        <i class="bi bi-plus-circle"></i>Nuevo
                    </button>
                </div>
            </div><!-- Accord body-->
        </div><!-- Accord content-->
        </div><!-- Accord item-->

        <div class="accordion-item">
            <h3 class="accordion-header" id="accorCable-head">
                <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#accorCable" aria-expanded="true" aria-controls="accorCable">
                    Cables
                </button>
            </h3>
        <div id="accorCable" class="accordion-collapse collapse" aria-labelledby="accorCable-head" data-bs-parent="#accordionItems">
            <div class="accordion-body listItemByItem">
                <?php
                    $cables = new controladorArticulos();
                    $cables->ctrObtenerCables();
                ?>
                <div class="d-flex justify-content-center btn-plus">
                    <button class="btn-plus-sty" data-bs-toggle="modal" data-bs-target="#nuevoArt">
                        <i class="bi bi-plus-circle"></i>Nuevo
                    </button>
                </div>
            </div><!-- Accord body-->
        </div><!-- Accord content-->
        </div><!-- Accord item-->

        <div class="accordion-item">
            <h3 class="accordion-header" id="accorLaptop-head">
                <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#accorLaptop" aria-expanded="true" aria-controls="accorLaptop">
                    Laptops
                </button>
            </h3>
        <div id="accorLaptop" class="accordion-collapse collapse" aria-labelledby="accorCable-head" data-bs-parent="#accordionItems">
            <div class="accordion-body listItemByItem">
                
                <?php
                
                    $laptops = new controladorArticulos();
                    $laptops->ctrObtenerLaptops();

                ?>

                <div class="d-flex justify-content-center btn-plus">
                    <button class="btn-plus-sty" data-bs-toggle="modal" data-bs-target="#nuevoArt">
                        <i class="bi bi-plus-circle"></i>Nuevo
                    </button>
                </div>
            </div><!-- Accord body-->
        </div><!-- Accord content-->
        </div><!-- Accord item-->

        <div class="accordion-item">
            <h3 class="accordion-header" id="accorMonitor-head">
                <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#accorMonitor" aria-expanded="true" aria-controls="accorMonitor">
                    Proyectores
                </button>
            </h3>
        <div id="accorMonitor" class="accordion-collapse collapse" aria-labelledby="accorMonitor-head" data-bs-parent="#accordionItems">
            <div class="accordion-body listItemByItem">
                <?php
                    
                    $Proyectores = new controladorArticulos();
                    $Proyectores->ctrObtenerProyectores();

                ?>
                
                <div class="d-flex justify-content-center btn-plus">
                    <button class="btn-plus-sty" data-bs-toggle="modal" data-bs-target="#nuevoArt">
                        <i class="bi bi-plus-circle"></i>Nuevo
                    </button>
                </div>
            </div><!-- Accord body-->
        </div><!-- Accord content-->
        </div><!-- Accord item-->

    </div><!-- Accordion Ends -->
</div><!-- accord-format (estilo del acordeon)-->

<div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-right: 2%;">
    <button class="btn btn-outline b-bl-lr mb-4 " data-bs-toggle="modal" data-bs-target="#nuevoElem">Nuevo
        <i class="bi bi-plus-circle"></i>
    </button>
</div>

<div class="modal fade" id="nuevoArt" tabindex="-1" role="dialog" aria-labelledby="nuevo-article">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header modal-head">
                <div><i class="bi bi-folder-plus"></i>
                    Agregar un nuevo artículo</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="12345678912345671" disabled>
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" placeholder="Acer">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" placeholder="Aspire V">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloSN">S/N </label>
                                <input type="text" id="disabledTextInput" placeholder="12345678912345671">
                            </div>
                            <div class="col-6">
                                <label for="">Cargador</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="articuloCg1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="articuloCg2">No</label>

                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="button">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- Modal body-->
        </div><!-- Modal content-->
    </div><!-- Modal dialog-->
</div><!--MODAL-->

<div class="modal fade" id="editarArtAdapt" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-head"><i class="bi bi-vector-pen"></i>
                Editar datos del Adaptador
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="12345678912345671" disabled>
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" placeholder="Acer">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" placeholder="Aspire V">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloSN">S/N </label>
                                <input type="text" id="disabledTextInput" placeholder="12345678912345671">
                            </div>
                            <div class="col-6">
                                <label for="">Cargador</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="articuloCg1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="articuloCg2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    <button id="btn-eliminar" type="reset" data-bs-dismiss="modal">Eliminar</button>
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="button">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div><!-- form-mod (estilo del formulario)-->
            </div><!-- modal body-->
        </div><!-- modal content -->
    </div><!-- modal dialog-->
</div><!-- modal -->

<div class="modal fade" id="editarArtBoc" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-head"><i class="bi bi-vector-pen"></i>
                Editar datos de la bocina
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="12345678912345671" disabled>
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" placeholder="Acer">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" placeholder="Aspire V">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloSN">S/N </label>
                                <input type="text" id="disabledTextInput" placeholder="12345678912345671">
                            </div>
                            <div class="col-6">
                                <label for="">Cargador</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="articuloCg1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="articuloCg2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    <button id="btn-eliminar" type="reset" data-bs-dismiss="modal">Eliminar</button>
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="button">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div><!-- form-mod (estilo del formulario)-->
            </div><!-- modal body-->
        </div><!-- modal content -->
    </div><!-- modal dialog-->
</div><!-- modal -->

<div class="modal fade" id="editarArtCab" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-head"><i class="bi bi-vector-pen"></i>
                Editar datos del cable
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="12345678912345671" disabled>
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" placeholder="Acer">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" placeholder="Aspire V">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloSN">S/N </label>
                                <input type="text" id="disabledTextInput" placeholder="12345678912345671">
                            </div>
                            <div class="col-6">
                                <label for="">Cargador</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="articuloCg1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="articuloCg2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    <button id="btn-eliminar" type="reset" data-bs-dismiss="modal">Eliminar</button>
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="button">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div><!-- form-mod (estilo del formulario)-->
            </div><!-- modal body-->
        </div><!-- modal content -->
    </div><!-- modal dialog-->
</div><!-- modal -->

<div class="modal fade" id="editarArtLap" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-head"><i class="bi bi-vector-pen"></i>
                Editar datos de la laptop
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="12345678912345671" disabled>
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" placeholder="Acer">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" placeholder="Aspire V">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloSN">S/N </label>
                                <input type="text" id="disabledTextInput" placeholder="12345678912345671">
                            </div>
                            <div class="col-6">
                                <label for="">Cargador</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="articuloCg1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="articuloCg2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    <button id="btn-eliminar" type="reset" data-bs-dismiss="modal">Eliminar</button>
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="button">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div><!-- form-mod (estilo del formulario)-->
            </div><!-- modal body-->
        </div><!-- modal content -->
    </div><!-- modal dialog-->
</div><!-- modal -->

<div class="modal fade" id="editarArtProy" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-head"><i class="bi bi-vector-pen"></i>
                Editar datos del proyector
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="12345678912345671" disabled>
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" placeholder="Acer">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" placeholder="Aspire V">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloSN">S/N </label>
                                <input type="text" id="disabledTextInput" placeholder="12345678912345671">
                            </div>
                            <div class="col-6">
                                <label for="">Cargador</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="articuloCg1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="articuloCg2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    <button id="btn-eliminar" type="reset" data-bs-dismiss="modal">Eliminar</button>
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="button">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div><!-- form-mod (estilo del formulario)-->
            </div><!-- modal body-->
        </div><!-- modal content -->
    </div><!-- modal dialog-->
</div><!-- modal -->

<div class="modal fade" id="nuevoElem" tabindex="-1" role="dialog" aria-labelledby="nuevo-article">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header modal-head">
                <div><i class="bi bi-folder-plus"></i>
                    Agregar un nuevo artículo</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-margin">
                        <div class="row g-2 m-3">
                            <div class="col-3">
                            <label for="articuloId">Id</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="6" disabled>
                            </div>
                            <div class="col-9">
                            <label for="articuloName">Nombre del artículo</label>
                            <input type="text" placeholder="Ingresar artículo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 justify-content-end">
                            <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                            <button id="btn-agregar" type="reset">Agregar</button>
                        </div>
                        </div>
                    </form>
                </div><!--FORM-MOD-->
            </div><!-- Modal body-->
        </div><!-- Modal content-->
    </div><!-- Modal dialog-->
</div><!--MODAL-->

<script type="text/javascript" src="js/articulos.js"></script>