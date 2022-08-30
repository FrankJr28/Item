<?php        
    $login = new ControladorFormularios();    
    $login->ctrValidarSesionAdmin();
?>
<link rel="stylesheet" href="./css/styleModF.css"/>

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
            <div class="accordion-body">
                    <?php
                        $adaptador = new controladorArticulos();
                        $adaptador->ctrObtenerAdaptadores();
                    ?>
                <div class="d-flex justify-content-center btn-plus listItemByItem">
                    <button class="btn-plus-sty" data-bs-toggle="modal" data-bs-target="#nuevoArtAdapt">
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
            <div class="accordion-body">

                <?php
                
                $bocinas = new controladorArticulos();
                $bocinas->ctrObtenerBocinas();

                ?>

                <div class="d-flex justify-content-center btn-plus listItemByItem">
                    <button class="btn-plus-sty" data-bs-toggle="modal" data-bs-target="#nuevoArtBoc">
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
            <div class="accordion-body">
                <?php
                    $cables = new controladorArticulos();
                    $cables->ctrObtenerCables();
                ?>
                <div class="d-flex justify-content-center btn-plus listItemByItem">
                    <button class="btn-plus-sty" data-bs-toggle="modal" data-bs-target="#nuevoArtCab">
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
            <div class="accordion-body">
                
                <?php
                
                    $laptops = new controladorArticulos();
                    $laptops->ctrObtenerLaptops();

                ?>

                <div class="d-flex justify-content-center btn-plus listItemByItem">
                    <button class="btn-plus-sty" data-bs-toggle="modal" data-bs-target="#nuevoArtLap">
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
            <div class="accordion-body ">
                <?php
                    
                    $Proyectores = new controladorArticulos();
                    $Proyectores->ctrObtenerProyectores();

                ?>
                
                <div class="d-flex justify-content-center btn-plus listItemByItem">
                    <button class="btn-plus-sty" data-bs-toggle="modal" data-bs-target="#nuevoArtProy">
                        <i class="bi bi-plus-circle"></i>Nuevo
                    </button>
                </div>
            </div><!-- Accord body-->
        </div><!-- Accord content-->
        </div><!-- Accord item-->

    </div><!-- Accordion Ends -->
</div><!-- accord-format (estilo del acordeon)-->

<div class="modal fade" id="editarArtAdapt" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-head"><i class="bi bi-vector-pen"></i>
                Editar datos del Adaptador
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech" name="formularioA" method="post" action="#">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="idAdaptador" class="form-control" readonly="readonly">
                                <input type="hidden" id="idAdaptadorH" name="ida" readonly="readonly">
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" id="dispAdaptador" name="disp-a" value="1">
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" id="marcaAdaptador" name="marcaa">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" id="modeloAdaptador" name="modeloa">
                            </div>
                        </div>

                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Observaciones</label>
                                <input type="text" id="observacionesAdaptador" name="obsa">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    <button id="eliminarAdapt" data-bs-toggle="modal" data-bs-target="#eliminarArtAdapt" type="reset" data-bs-dismiss="modal" data-id="0">Eliminar</button>
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="submit">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div><!-- form-mod (estilo del formulario)-->
            </div><!-- modal body-->
        </div><!-- modal content -->
    </div><!-- modal dialog-->
</div><!-- modal -->

<div class="modal fade" id="nuevoArtAdapt" tabindex="-1" role="dialog" aria-labelledby="nuevo-article">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header modal-head">
                <div><i class="bi bi-folder-plus"></i>
                    Agregar un nuevo Adaptador</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech" name="formularioNA" method="post" action="#">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" class="form-control" name="id-a">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input form-sw" type="checkbox" name="disp-a" value="1">
                                        <label class="form-check-label form-label" >Disponible</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" name="marca-a">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" name="modelo-a">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                               <label for="obs">Observaciones</label>
                               <input type="text" name="obs-a">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="submit">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- Modal body-->
        </div><!-- Modal content-->
    </div><!-- Modal dialog-->
</div><!--MODAL-->

<!---modal eliminar-->

<div class="modal" tabindex="-1" id="eliminarArtAdapt">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form method="post" action="#">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Adaptador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <p id="idText"></p> 
                <input type="hidden" name="EliAdapt" id="idEliAdapt"> 
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!--fin modal eliminar-->

<?php
    $na = controladorArticulos::ctrInsertarAdaptador();

    if($na=="ok"){

        echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Datos actualizados correctamente',
                        showConfirmButton: false,
                        allowOutsideClick: true,
                        timer: 1000
                    });

                    setTimeout(function(){
                        location.reload();
                    },900);  
                }
                
                
 
            </script>";

    }

    $a = controladorArticulos::ctrActualizarAdaptador();

    if($a=="ok"){

        echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Datos actualizados correctamente',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 1000
                    });

                    setTimeout(function(){
                        location.reload();
                    },900);  
                }
                
                
 
            </script>";

    }
    
    else{
        
        if($a){

            echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Ocurrió un error',
                        showConfirmButton: false,
                        timer: 1000
                    });

                }
                 
            
            </script>";

        }

    }

    $ea = controladorArticulos::ctrEliminarAdaptador();

    if($ea){
        if($ea=="ok"){
            echo "<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Datos eliminados correctamente',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 1000
                    });
                    setTimeout(function(){
                        location.reload();
                    },900);  
                }
            </script>";   
        }
        else{
            echo "<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '".$ea."',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            </script>";

        }

    }
?>

<div class="modal fade" id="editarArtBoc" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-head"><i class="bi bi-vector-pen"></i>
                Editar datos de la bocina
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech" name="formularioB" method="post" action="#">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text"  id="idBocina" class="form-control" >
                                <input type="hidden" id="idBocinaH" name="idb" >
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" id="dispBocina" name="disp-b" value="1">
                                    <label class="form-check-label form-label" >Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" id="marcaBocina" name="marcab">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" id="modeloBocina" name="modelob">
                            </div>
                        </div>

                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Observaciones</label>
                                <input type="text" id="observacionesBocina" name="obsb">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    <!--<button id="eliminarAdapt" data-bs-toggle="modal" data-bs-target="#eliminarArtAdapt" type="reset" data-bs-dismiss="modal" data-id="0">Eliminar</button>-->
                                    <button id="eliminarBoc" type="reset" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#eliminarArtBoc">Eliminar</button>
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="submit">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nuevoArtBoc" tabindex="-1" role="dialog" aria-labelledby="nuevo-article">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header modal-head">
                <div><i class="bi bi-folder-plus"></i>
                    Agregar una nueva Bocina</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech" method="post" action="#">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="disabledTextInput" class="form-control" name="id-b">
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" name="disp-b">
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" name="marca-b">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" name="modelo-b">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloSN">Observaciones </label>
                                <input type="text" id="disabledTextInput" name="obs-b">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="submit">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- Modal body-->
        </div><!-- Modal content-->
    </div><!-- Modal dialog-->
</div><!--MODAL-->

<!---modal eliminar-->

<div class="modal" tabindex="-1" id="eliminarArtBoc">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form method="post" action="#">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Bocina</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <p id="idTextB"></p> 
                <input type="hidden" name="idEliBoc" id="idEliBoc"> 
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!--fin modal eliminar-->

<?php
    $nb = controladorArticulos::ctrInsertarBocina();

    if($nb=="ok"){

        echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Datos actualizados correctamente',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 1000
                    });

                    setTimeout(function(){
                        location.reload();
                    },900);  
                }
                
                
 
            </script>";

    }

    $b = controladorArticulos::ctrActualizarBocina();

    if($b =="ok"){

        echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Datos actualizados correctamente',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 1000
                    });

                    setTimeout(function(){
                        location.reload();
                    },900); 

                    
                    
                }
                
            </script>";

    }
    
    else{
        
        if($b){

            echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Ocurrió un error',
                        showConfirmButton: false,
                        timer: 1000
                    });

                }

                setTimeout(function(){
                    location.reload();
                },900);
                 
            </script>";

        }

    }

    $eb = controladorArticulos::ctrEliminarBocina();

    
    if($eb){
        if($eb=="ok"){
            echo "<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Datos eliminados correctamente',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 1000
                    });
                    setTimeout(function(){
                        location.reload();
                    },900);  
                }
            </script>";   
        }
        else{
            echo "<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '".$eb."',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            </script>";

        }

    }
    

?>

<div class="modal fade" id="editarArtCab" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-head"><i class="bi bi-vector-pen"></i>
                Editar datos del cable
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech" method="post" action="#">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="idCable" class="form-control">
                                <input type="hidden" id="idCableH" name="idc" class="form-control">
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" id="dispCable" name="disp-c" value="1">
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" id="marcaCable" name="marcac">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Conexion</label>
                                
                                <select class="form-select" id="modeloC" name="conexion">
                                    <!--<option value="value1">Value 1</option>
                                    <option value="value2" selected>Value 2</option>-->
                                    <?php
                                    
                                        $tipos = new controladorArticulos();
                                        $tipos->ctrObtenerTipoConexion();
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    <button id="eliminarCab" type="reset" data-bs-toggle="modal" data-bs-target="#eliminarArtCab" data-bs-dismiss="modal">Eliminar</button>
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="submit">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div><!-- form-mod (estilo del formulario)-->
            </div><!-- modal body-->
        </div><!-- modal content -->
    </div><!-- modal dialog-->
</div><!-- modal -->

<div class="modal fade" id="nuevoArtCab" tabindex="-1" role="dialog" aria-labelledby="nuevo-article">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header modal-head">
                <div><i class="bi bi-folder-plus"></i>
                    Agregar un nuevo Cable</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech" method="post" action="#">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="disabledTextInput" class="form-control" name="id-c" >
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" name="disp-c" value="1">
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" name="marca-c">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Conexion</label>
                                <select class="form-select" name="conexion-c">
                                    <?php
                                        $tipos = new controladorArticulos();
                                        $tipos->ctrObtenerTipoConexion();
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="submit">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- Modal body-->
        </div><!-- Modal content-->
    </div><!-- Modal dialog-->
</div><!--MODAL-->

<!---modal eliminar-->

<div class="modal" tabindex="-1" id="eliminarArtCab">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form method="post" action="#">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Cable</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <p id="idTextC"></p> 
                <input type="hidden" name="idEliCab" id="idEliCab"> 
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!--fin modal eliminar-->

<?php

    $nc = controladorArticulos::ctrInsertarCable();

    if($nc=="ok"){

        echo "<script>
            
            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href);

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Datos actualizados correctamente',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1000
                });

                setTimeout(function(){
                    location.reload();
                },900);  
            }
            
        </script>";

    }

    $c = controladorArticulos::ctrActualizarCable();
    
    if($c=="ok"){

        echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Datos actualizados correctamente',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 1000
                    });
                }
                
                setTimeout(function(){
                    location.reload();
                },900);
                
 
            </script>";

    }
    
    else{
        
        if($c){

            echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Ocurrió un error',
                        showConfirmButton: false,
                        timer: 2000
                    });

                }                
            
            </script>";

        }

    }

    $ec = controladorArticulos::ctrEliminarCable();

    
    if($ec){
        if($ec=="ok"){
            echo "<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Datos eliminados correctamente',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 1000
                    });
                    setTimeout(function(){
                        location.reload();
                    },900);  
                }
            </script>";   
        }
        else{
            echo "<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '".$ec."',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            </script>";

        }

    }

?>

<div class="modal fade" id="editarArtLap" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-head"><i class="bi bi-vector-pen"></i>
                Editar datos de la laptop
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech" name="formularioL" method="post" action="#">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="idLaptop" class="form-control">
                                <input type="hidden" id="idLaptopH" name="idl">
                            </div> 
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">                                
                                    <input class="form-check-input form-sw" type="checkbox" id="dispLaptop" name="disp-l" value="1">
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" id="marcaLaptop" name="marcal">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" id="modeloLaptop" name="modelol">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloSN">S/N </label>
                                <input type="text" id="snLaptop" name="sn">
                            </div>
                            <div class="col-6">
                                <label for="articuloSN">Observaciones </label>
                                <input type="text" id="observacionesLaptop" name="obs">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    <button id="eliminarLap" type="reset" data-bs-toggle="modal" data-bs-target="#eliminarArtLap" data-bs-dismiss="modal">Eliminar</button>
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="submit">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div><!-- form-mod (estilo del formulario)-->
            </div><!-- modal body-->
        </div><!-- modal content -->
    </div><!-- modal dialog-->
</div><!-- modal -->

<div class="modal fade" id="nuevoArtLap" tabindex="-1" role="dialog" aria-labelledby="nuevo-article">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header modal-head">
                <div><i class="bi bi-folder-plus"></i>
                    Agregar una nueva Laptop</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech" method="post" action="#">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="disabledTextInput" class="form-control" name="id-l">
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" name="disp-l" value="1">
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" name="marca-l">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" name="modelo-l">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloSN">S/N </label>
                                <input type="text" name="sn-l">
                            </div>
                            <div class="col-6">
                                <label for="articuloSN">Observaciones </label>
                                <input type="text" id="observacionesLaptop" name="obs-l">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="submit">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- Modal body-->
        </div><!-- Modal content-->
    </div><!-- Modal dialog-->
</div><!--MODAL-->

<!---modal eliminar-->

<div class="modal" tabindex="-1" id="eliminarArtLap">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form method="post" action="#">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Laptop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <p id="idTextL"></p> 
                <input type="hidden" name="idEliLap" id="idEliLap"> 
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!--fin modal eliminar-->

<?php      

    $nl = controladorArticulos::ctrInsertarLaptop();

    if($nl=="ok"){

        echo "<script>
            
            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href);

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Datos actualizados correctamente',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1000
                });

                setTimeout(function(){
                    location.reload();
                },900);  
            }
            
        </script>";

    }


    $l = controladorArticulos::ctrActualizarLaptop();
    
    if($l=="ok"){

        echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Datos actualizados correctamente',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 1000
                    });
                }
                
                setTimeout(function(){
                    location.reload();
                },900);
                
 
            </script>";

    }
    
    else{
        
        if($l){

            echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Ocurrió un error',
                        showConfirmButton: false,
                        timer: 2000
                    });

                }                
            
            </script>";

        }

    }

    $el = controladorArticulos::ctrEliminarLaptop();

    
    if($el){
        if($el=="ok"){
            echo "<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Datos eliminados correctamente',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 1000
                    });
                    setTimeout(function(){
                        location.reload();
                    },900);  
                }
            </script>";   
        }
        else{
            echo "<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '".$el."',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            </script>";

        }

    }


?>

<div class="modal fade" id="editarArtProy" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-head"><i class="bi bi-vector-pen"></i>
                Editar datos del proyector
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech" method="post" action="#">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" id="idProyector" class="form-control" >
                                <input type="hidden" id="idProyectorH" name="idp" class="form-control" >
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" id="dispProyector" name="disp-p" value="1">
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" id="marcaProyector" name="marcap">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" id="modeloProyector" name="modelop">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloSN">S/N </label>
                                <input type="text" id="snProyector" name="snp">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Observaciones</label>
                                <input type="text" id="observacionesProyector" name="obsp">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    <button id="btn-eliminar" type="reset" data-bs-toggle="modal" data-bs-target="#eliminarArtProy" data-bs-dismiss="modal">Eliminar</button>
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="submit">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div><!-- form-mod (estilo del formulario)-->
            </div><!-- modal body-->
        </div><!-- modal content -->
    </div><!-- modal dialog-->
</div><!-- modal -->

<div class="modal fade" id="nuevoArtProy" tabindex="-1" role="dialog" aria-labelledby="nuevo-article">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header modal-head">
                <div><i class="bi bi-folder-plus"></i>
                    Agregar un nuevo Proyector</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech" method="post" action="#">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="articuloId">Id</label>
                                <input type="text" class="form-control" name="id-p">
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-sw" type="checkbox" name="disp-p" value="1" checked>
                                    <label class="form-check-label form-label" for="flexSwitchCheckChecked">Disponible</label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloMarca">Marca</label>
                                <input type="text" name="marca-p">
                            </div>
                            <div class="col-6">
                                <label for="articuloModelo">Modelo</label>
                                <input type="text" name="modelo-p">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="articuloSN">S/N </label>
                                <input type="text" name="sn-p">
                            </div>
                            <div class="col-6">
                                <label for="obs">Observaciones </label>
                                <input type="text" name="obs-p" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    
                                </div>
                                <button type="reset" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btn-editar" type="submit">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- Modal body-->
        </div><!-- Modal content-->
    </div><!-- Modal dialog-->
</div><!--MODAL-->

<!---modal eliminar-->

<div class="modal" tabindex="-1" id="eliminarArtAdapt">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form method="post" action="#">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Proyector</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <p id="idTextP"></p> 
                <input type="hidden" name="idEliProy"> 
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!--fin modal eliminar-->

<?php

    $np = controladorArticulos::ctrInsertarProyector();

    if($np=="ok"){

        echo "<script>
            
            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href);

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Datos actualizados correctamente',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1000
                });

                setTimeout(function(){
                    location.reload();
                },900);  
            }
            
        </script>";

    }

    $p = controladorArticulos::ctrActualizarProyector();
    
    if($p=="ok"){

        echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Datos actualizados correctamentepp',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 1000
                    });
                }
                
                setTimeout(function(){
                    location.reload();
                },900);
                
 
            </script>";

    }
    
    else{
        
        if($p){

            echo "<script>
                
                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Ocurrió un error',
                        showConfirmButton: false,
                        timer: 2000
                    });

                }                
            
            </script>";

        }

    }

?>

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

