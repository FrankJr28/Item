
<link rel="stylesheet" href="./css/styleFormR.css">

<div class="mb-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?pagina=crearUsuarios"><i class="bi bi-plus-circle"></i> Nuevo<a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?pagina=usuarios"><i class="bi bi-person-square"></i> Usuarios</a>
        </li>
    </ul>
</div>

<h3>Nuevo usuario</h3>

<form action="#" method="post" class="form">
    <div class="form-container">
        <div class="row m-3">
            <div class="row m-3">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" id="codigo" name="codigou" class="form-input">
                        <label for="codigo" class="form-label">Código</label>
                        <span class="form-line"></span>
                    </div>  
                </div>  
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" id="nombre" name="nombreu" class="form-input">
                        <label for="nombre" class="form-label">Nombre</label>
                        <span class="form-line"></span>
                        <!-- <p class="error_phrase">El nombre no puede tener números</p>-->
                    </div>
                </div>
            </div>
            <div class="row m-3">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" id="paterno" name="paternou" class="form-input">
                        <label for="codigo" class="form-label">Apellido Paterno</label>
                        <span class="form-line"></span>
                    </div>  
                </div>  
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" id="materno" name="maternou" class="form-input">
                        <label for="nombre" class="form-label">Apellido Materno</label>
                        <span class="form-line"></span>
                    </div>
                </div>
            </div>
            <div class="row m-3">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <input type="password" id="pass" name="contraseña1" class="form-input">
                        <label for="pass" class="form-label">Contraseña</label>
                        <span class="form-line"></span>
                    </div>  
                </div>  
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <input type="password" id="pass2" name="contraseña2" class="form-input">
                        <label for="pass2" class="form-label">Comprobación</label>
                        <span class="form-line"></span>
                    </div>
                </div>
            </div>
            <div class="row m-3">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <select id="carUsuario" name="carrerau" class="form-select">
                            <?php
                                $c = new controladorUsuarios();
                                $c->ctrObtenerCarreras();
                            ?>
                        </select>
                        
                        <span class="form-line"></span>
                    </div>
                </div>  
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
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
                        <span class="form-line"></span>
                    </div>
                </div>
            </div>
            <div class="row m-3">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <input type="email" id="correo" class="form-input" name="correou">
                        <label for="mail" class="form-label">Correo</label>
                        <span class="form-line"></span>
                        <!--<p class="error_phrase">Sólo son válidos los signos ".", "_", "-"</p>-->
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" id="tel" class="form-input" name="telefonou">
                        <label for="tel" class="form-label">Teléfono</label>
                        <span class="form-line"></span>
                        <!--<p class="error_phrase">El teléfono debe contener 10 dígitos</p>-->
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col">
                    <input type="button" class="btn btn-secundary border" value="Limpiar" id="btn-limpiar">
                    <input type="submit" class="btn btn-primary" value="Registrar" style="background-color:#216e8a">
                    <!--<button>Limpiar</button>-->
                </div>
            </div>
        </div>
    </div>
</form>

<?php

    $act = controladorUsuarios::ctrInsertarUsuario();
    
    if($act){

        if($act=="ok"){
            echo "<script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Usuario Registrado Con Éxito',
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

        if($act=="errorC"){
            echo "<script> 
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Las constraseñas no concuerdan',
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

<script type="text/javascript" src="js/crearUsuarios.js"></script>