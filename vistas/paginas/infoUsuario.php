<!--Container-->
<?php        
    $login = new ControladorFormularios();    
    $login->ctrValidarSesionUsuario();
?>
<link rel="stylesheet" href="./css/stylesUsDt.css"/>
<?php
    $usuario = ControladorInfoUsuario::ctrObtenerDatosUsuario();
?>
<div class="height-100">
    <div class="margin-cont">
        <form class="" action="#" method="post" enctype="multipart/form-data">    
            <div class="accord-format mb-4">
                <div class="accordion" >
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Mis Datos
                        </button>
                        </h3>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="form-mod">            
                                    
                                    <div class="row w-100 justify-content-between">
                                        <div class="col-xl-5 col-md-6 col-xs-12">
                                            <label for="start"><strong>Código:</strong></label>
                                            <input type="text" id="start" name="codigo" value="<?= $usuario["codigo_u"] ?>">
                                        </div>
                                        <div class="col-xl-5 col-md-6 col-xs-12">
                                            <label for="start"><strong>Nombre: </strong></label>
                                            <input type="text" id="start" name="nombre" value="<?= $usuario["nombre_u"] ?>">
                                        </div>
                                    </div>

                                    <div class="row w-100 justify-content-between">
                                        <div class="col-xl-5 col-md-6 col-xs-12">
                                            <label for="start">Apellido Paterno:</label>
                                            <input type="text" id="start" name="apellidoP" value="<?= $usuario["app_u"] ?>">
                                        </div>
                                        <div class="col-xl-5 col-md-6 col-xs-12">
                                            <label for="start">Apellido Materno:</label>
                                            <input type="text" id="start" name="apellidoM" value="<?= $usuario["apm_u"] ?>">
                                        </div>
                                    </div>

                                    <div class="row w-100 justify-content-between">
                                        <div class="col-xl-5 col-md-6 col-xs-12">
                                            <label for="start">Carrera:</label>
                                            <select class="" name="carrera" aria-label="Default select example">
                                                <?php
                                                    $carrera = new ControladorInfoUsuario();
                                                    $carrera->ctrObtenerCarreras($usuario["id_car"]);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-5 col-md-6 col-xs-12">
                                            <label for="start">Semestre:</label>
                                            <select name="semestre" aria-label="Default select example">
                                                <option value="0" <?php if($usuario["semestre"]==0) echo "selected" ?>>...</option>
                                                <option value="1" <?php if($usuario["semestre"]==1) echo "selected" ?>>1ro</option>
                                                <option value="2" <?php if($usuario["semestre"]==2) echo "selected" ?>>2do</option>
                                                <option value="3" <?php if($usuario["semestre"]==3) echo "selected" ?>>3ro</option>
                                                <option value="4" <?php if($usuario["semestre"]==4) echo "selected" ?>>4to</option>
                                                <option value="5" <?php if($usuario["semestre"]==5) echo "selected" ?>>5to</option>
                                                <option value="6" <?php if($usuario["semestre"]==6) echo "selected" ?>>6to</option>
                                                <option value="7" <?php if($usuario["semestre"]==7) echo "selected" ?>>7mo</option>
                                                <option value="8" <?php if($usuario["semestre"]==8) echo "selected" ?>>8vo</option>
                                                <option value="9" <?php if($usuario["semestre"]==9) echo "selected" ?>>9no</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row w-100 justify-content-between">
                                        <div class="col-xl-5 col-md-6 col-xs-12">
                                            <label for="start">Correo:</label>
                                            <input type="text" id="start" name="correo" value="<?= $usuario["correo_u"] ?>">
                                        </div>
                                        <div class="col-xl-5 col-md-6 col-xs-12">
                                            <label for="start">Teléfono:</label>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text span-fj">+52</span>
                                                <input type="text" id="span-fj-tel" name="telefono" value="<?= $usuario["telefono"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Credencial
                        </button>
                        </h3>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <div class="row m-1">
                                    <div class="col-12 mtb-4 p-2" style="overflow: scroll">
                                        <label for="cred">Cambiar:</label>
                                        <input type="file" name="Imagen" multiple/>
                                    </div>
                                    
                                    <div class="col-xl-6 col-sm-12 p-1 mt-4 text-center" style="overflow: scroll" >
                                        <img src="data:image/jpg;base64,<?php echo base64_encode($usuario["cred_u"]) ?>" alt="Credencial" style="max-height:300px" />
                                    </div>
                                </div>
                            </div><!--ACORD-BODY-2-->
                        </div>
                    </div>
                </div><!---- ACCORD END----->
            </div>
            <div class="mb-4" style="padding-bottom: 3rem">
                    <div class="row">
                        <!--<div class="col-12 d-flex justify-content-end">-->
                        <div class="d-flex justify-content-between">

                            <button id="btn-contrasenia" type="button" data-bs-toggle="modal" data-bs-target="#login-modal" >Cambiar Contraseña</button>
                            
                            <div>
                                <button id="btn-cancel" type="reset">Cancelar</button>
                                <button type="submit" id="btn-agregar">Guardar cambios</button>
                            </div>
                        
                        </div>
                            <!---</div>-->
                    </div>
            </div>
        </form>


        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-head">
                        <!--<img src="img/logo-CTA.png" class="img-fluid" alt="logo-CTA">-->
                        <h3>Restablecer Contraseña</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="post">
                        <div class="modal-body">
                            <div class="box">
                                <div class="form-group">
                                    <label>Contraseña Actual:</label>
                                    <input type="password" class="form-control" name="oldPass" id="">
                                </div>
                                <div class="form-group">
                                    <label>Nueva Contraseña:</label>
                                    <input type="password" class="form-control" name="newPass" id="">
                                </div>
                                <div class="form-group">
                                    <label>Confirmar:</label>
                                    <input type="password" class="form-control" name="newPassC" id="">  
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn" style="background: #216e8a; color: #fff;">Restablecer</button>
                            <button type="button" class="btn" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php

        $actualizar = new ControladorInfoUsuario();
        $actualizar->ctrActualizarInfoUsuario();
        
        $restablecerContraseña = new ControladorInfoUsuario();
        $restablecerContraseña->ctrRestablecerContrasenaUsuario();
        
        ?>
    </div><!--MARGIN-->  
</div><!--Container-->