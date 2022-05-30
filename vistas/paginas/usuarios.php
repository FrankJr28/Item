<link rel="stylesheet" href="./css/styleModF.css"/>

<div class="mb-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php?pagina=crearUsuarios"><i class="bi bi-plus-circle"></i> Nuevo<a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="index.php?pagina=usuarios"><i class="bi bi-person-square"></i> Usuarios</a>
        </li>
    </ul>
</div>
    <div class="mb-4">
        <h3>Gestionar usuarios</h3>
    </div>
    <div class="table-responsive">
        <?php
            $u = new controladorUsuarios();
            $u->ctrObtenerUsuarios();
        ?>
    </div><!--TABLE-->

</div>

<div class="modal fade" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-head"><i class="bi bi-vector-pen"></i>
                Editar datos del usuario
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-mod">
                    <form class="form-mod-mrg-strech" method="post" action="#">
                        <div class="row m-3">
                            <div class="col-6">
                                <label for="codigo">Código</label>
                                <input type="text" id="idUsuario" name="codigou" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nUsuario" name="nombreu" class="form-control">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-6">
                                <label for="paterno">Paterno</label>
                                <input type="text" id="pUsuario" name="paternou">
                            </div>
                            <div class="col-6">
                                <label for="materno">Materno</label>
                                <input type="text" id="mUsuario" name="maternou">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-12">
                                <label for="correo">Correo</label>
                                <input type="text" id="corUsuario" name="correou">
                            </div>
                        </div>
                        <div class="row g-2 m-3">
                            <div class="col-3">
                                <label for="telefono">Teléfono</label>
                                <input type="text" id="tUsuario" name="telefonou">
                            </div>
                            <div class="col-6">
                                <label for="carrera">Carrera</label>
                                <!--<input type="text" id="carUsuario" name="carrerau">-->

                                <select name="carrerau" id="carUsuario" class="form-select">
                                    <?php
                                        $c = new controladorUsuarios();
                                        $c->ctrObtenerCarreras();
                                    ?>
                                </select>

                            </div>
                            <div class="col-3">
                                <label for="semestre">Semestre</label>
                                <!--<input type="text" id="sUsuario" name="semestreu">-->
                                <select class="form-select" id="sUsuario" name="semestreu">
                                    <option value="1">1ero</option>
                                    <option value="2">2do</option>
                                    <option value="3">3ero</option>
                                    <option value="4">4to</option>
                                    <option value="5">5to</option>
                                    <option value="6">6to</option>
                                    <option value="7">7mo</option>
                                    <option value="8">8vo</option>
                                    <option value="9">9no</option>
                                    <option value="10">10mo</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-eliminar-s">
                                    <button id="btnEliminarUsuario" type="reset" data-bs-toggle="modal" data-bs-target="#eliminarUsuario" data-bs-dismiss="modal">Eliminar</button>
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

<!---modal eliminar-->

<div class="modal" tabindex="-1" id="eliminarUsuario">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form method="post" action="#">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Adaptador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <p id="idText"></p> 
                <input type="hidden" name="EliUsu" id="idEliUsu"> 
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

    $act = controladorUsuarios::ctrActualizarUsuario();
    
    if($act){

        if($act=="ok"){
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
                
        if($act=="errorDatos"){
            echo "<script> 
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Datos Ingresados no válidos',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }                
            </script>";
        }

        if($act=="errorE"){
            echo "<script> 
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Ocurrió un error inesperado',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }                
            </script>";
        }
        

    }    

    $eli = controladorUsuarios::ctrEliminarUsuario();

    if($eli){

        if($eli=="ok"){
            echo "<script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '¡Usuario Eliminado!',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            timer: 2000
                        });
                    }
                    setTimeout(function(){
                        location.reload();
                    },900);
                </script>";
        }

    }

?>

<script type="text/javascript" src="js/usuarios.js"></script>