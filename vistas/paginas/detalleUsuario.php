<?php

    $validar = new ControladorFormularios();
    $validar->ctrValidarSesionAdmin();
    
    if(!isset($_POST["codigo"])){
        echo '<script>
            
            window.history.back();

        </script>';
    }

    $usu = ControladorDetalles::ctrObtenerDetalleUsuario();

?>
<div style="height:50px; width: 100%;">

</div>

<div class="mb-4">
    <div class="mb-4">
        <h3>Ver usuario</h3>
    </div>
    <div class="form-view">
        <form class="" action="" method="post">
            <div class="row w-100">
                <div class="col-xl-4 col-md-5 col-xs-12">
                    <label for="start"><strong>Código usuario: </strong><?= $usu["codigo_u"] ?></label>
                </div>
                <div class="col-xl-4 col-md-2"></div>
                <div class="col-xl-4 col-md-5 col-xs-12">
                    <label for="start"><strong>Nombre: </strong><?= $usu["nombre_u"].' '.$usu["app_u"] ?></label>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-xl-4 col-md-5 col-xs-12">
                    <label for="start"><strong>Carrera: </strong><?= $usu["carrera"] ?></label>
                </div>
                <div class="col-xl-4 col-md-2"></div>
                <div class="col-xl-4 col-md-5 col-xs-12">
                    <label for="semestre"><strong>Semestre: </strong><?= $usu["semestre"] ?>o</label>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-xl-4 col-md-5 col-xs-12">
                    <label for="correo"><strong>Correo: </strong><?= $usu["correo_u"] ?></label>
                </div>
                <div class="col-xl-4 col-md-2"></div>
                <div class="col-xl-4 col-md-5 col-xs-12">
                    <label for="telefono"><strong>Teléfono: </strong><?= $usu["telefono"] ?></label>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-sm-12 mt-4 text-center" style="overflow: scroll" >
                    <img src="data:image/jpg;base64,<?php echo base64_encode($usu["cred_u"]) ?>" alt="Credencial" style="max-height:300px" />
                </div>
            </div>
            <div class="line"></div>
            </form>
    </div>
    <div class="mb-3">
        <h4>Historial de préstamos</h4>
    </div>
    <div class="mb-3">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-des-3 table-sm" id="tablaDatos" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Inició</th>
                        <th>Finalizó</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $pres = new ControladorDetalles();
                        $pres->ctrObtenerPrestamosUsuario($usu["codigo_u"]);
                    ?>
                </tbody>
            </table>
        </div><!--TABLE-->  
    </div>
</div>

<script type="text/javascript" src="datatables/datatables.min.js"></script>
<script type="text/javascript" src="./js/tablas/tablaUsuarioSolicitar.js"></script>