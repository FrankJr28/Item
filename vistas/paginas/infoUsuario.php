<!--Container-->

<link rel="stylesheet" href="./css/stylesUsDt.css"/>

<?php
    $usuario = ControladorFormularios::ctrObtenerDatosUsuario();
    
?>

<div class="height-100">
    <div class="margin-cont">
        <div class="mb-4">
            <div class="modal fade" id="editarArt" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-head"><i class="bi bi-vector-pen"></i>
                            Editar datos del artículo
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        </div>
                    </div>
                </div><!--MODAL DIALOG-->
            </div><!-- MODAL -->
        </div><!-- DIV MODAL-->
        <div class="accord-format mb-4">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h3 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Datos del usuario
                    </button>
                    </h3>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="form-mod">
                            <form class="" action="" method="post">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="start">Código:</label>
                                        <input type="text" id="start" name="trip-start" value="<?= $usuario["codigo_u"] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label for="start">Nombre:</label>
                                        <input type="text" id="start" name="trip-start" value="<?= $usuario["nombre_u"] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="start">Carrera:</label>
                                        <select class="" aria-label="Default select example">
                                            <option selected>...</option>
                                            <?php
                                                $carrera = new ControladorFormularios();
                                                $carrera->ctrObtenerCarreras();
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="start">Semestre:</label>
                                        <select class="" aria-label="Default select example">
                                            <option value="0" <?php if($usuario["semestre"]==0) echo "selected" ?>>...</option>
                                            <option value="1" <?php if($usuario["semestre"]==1) echo "selected" ?>>1ro</option>
                                            <option value="2" <?php if($usuario["semestre"]==2) echo "selected" ?>>2do</option>
                                            <option value="3">3ro</option>
                                            <option value="4">4to</option>
                                            <option value="5">5to</option>
                                            <option value="6">6to</option>
                                            <option value="7">7mo</option>
                                            <option value="8">8vo</option>
                                            <option value="9">9no</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="start">Correo:</label>
                                        <input type="text" id="start" name="trip-start" value="<?= $usuario["correo_u"] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label for="start">Teléfono:</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text span-fj">+52</span>
                                            <input type="text" id="span-fj-tel" value="3411178092">
                                        </div>
                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Imágenes del usuario
                    </button>
                    </h3>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="row m-3">
                            <div class="col-3">
                                <span class="col-form-label">
                                    Imagen de perfil
                                </span>
                            </div>
                            <div class="col-7">
                                <div class="form-control-static">
                                    <img src="img/logo.PNG" class="avatar" alt="Avatar Image"/>
                                </div>
                            </div>
                            <div class="col-2">
                                <p>Cambiar imagen</p>
                                <div class="d-flex justify-content-center mb-3">
                                    <button type="button" class="btn btn-secondary icon-img">
                                        <i class="bi bi-image"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-3">
                                <span class="col-form-label">
                                    Credencial escaneada 
                                </span>
                            </div>
                            <div class="col-7">
                                <div class="form-control-static">
                                    <img id="cred-usr-dt" src="./img/proof.jpg" class="img-fluid rounded" alt="Credencial">
                                </div>
                            </div>
                            <div class="col-2 ">
                                <p>Cambiar imagen</p>
                                <div class="d-flex justify-content-center mb-3">
                                    <button type="button" class="btn btn-secondary icon-img">
                                        <i class="bi bi-image"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div><!--ACORD-BODY-2-->
                    </div>
                </div><!---- ACCORD END----->
                </div>
            <div class="mb-4">
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                    <button id="btn-cancel" type="reset">Cancelar</button>
                    <button id="btn-agregar" type="reset">Guardar cambios</button>
                </div>
                </div>
            </div>
        </div>
    </div><!--MARGIN-->
</div><!--Container-->

<script type="text/javascript" src="js/prueba.js"></script>