<?php
$validar = new ControladorFormularios();
$validar->ctrValidarSesionAdmin();
?>
<div class="mb-4">
    <div class="mb-4">
        <h3>Ver préstamo</h3>
    </div>
    <?php
    if(!isset($_POST["folio"])){
        echo '<script>
            window.location = "index.php?pagina=adminAccept";
        </script>';
    }
        $pres = ControladorDetalles::ctrObtenerDetallePrestamo();   
    ?>

    <div class="form-view">
        

        <div class="row">

            <div class="col-auto">
            <form action="index.php?pagina=detallePrestamo"method="post">
                <label for="start"><strong>Id del préstamo: </strong></label>
                <input type="hidden" value="<?= $pres["id_pres"] ?>" name="folio">
                <button type="submit" style="background:transparent; border:none;"><?= $pres["id_pres"] ?></button></form>
            </div>

        </div>

        <div class="row">
            <div class="col-auto">
                
            <form action="index.php?pagina=detalleUsuario" method="post">
                <label for="start"><strong>Código usuario: </strong></label>
                <input type="hidden" id="start" name="codigo" value="<?= $pres["codigo_u"] ?>">
                <button type="submit" style="background:transparent; border:none;"><?= $pres["codigo_u"] ?></button>
            </form>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <label for="start"><strong>Nombre usuario: </strong><?= $pres["nombre_u"].' '.$pres["app_u"] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-auto">
                <label for="start"><strong>Fecha de solicitud: </strong><?= date("d-m-y",strtotime($pres["solicitud"]))?><strong> Hora: </strong><?= date("G:i",strtotime($pres["solicitud"]))?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-auto">
                <?php if($pres["inicio"]):?>   
                    <label for="start"><strong>Fecha de Inicio: </strong><?= date("d-m-y",strtotime($pres["inicio"])) ?><strong> Hora: </strong><?= date("G:i",strtotime($pres["inicio"])) ?></label>
                <?php endif?>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <?php if($pres["finalizo"]):?>   
                    <label for="start"><strong>Fecha Fin: </strong><?= date("d-m-y",strtotime($pres["finalizo"])) ?><strong> Hora: </strong><?= date("G:i",strtotime($pres["finalizo"])) ?></label>
                <?php endif?>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
            <label for="start"><strong>Ubicacion: </strong><?= $pres["ubicacion"] ?></label>
            </div>
        </div>
        <div class="line"></div>

    </div>
    <div class="mb-4">
        <h4>Artículos</h4>
    </div>
    <div class="mb-4">
        <div class="card">
            <ul class="list-group list-group-flush">
                <?php
                $respuesta = ControladorDetalles::ctrObtenerDetallePresProy();
                foreach($respuesta as $dato){
                    if($dato["id_p"]){
                        echo '<li class="list-group-item list-group-item-info">
                                <h6 class="card-title">Proyector</h6>
                                <p class="card-text"><strong>ID: </strong>'.$dato["id_p"].'<br><strong>Marca: </strong>'.$dato["marca_p"].' <strong> Modelo: </strong>'.$dato["modelo_p"].'</p>
                            </li>';
                    }
                }
                $respuesta = ControladorDetalles::ctrObtenerDetallePresLap();
                foreach($respuesta as $dato){
                    if($dato["id_l"]){
                        echo '<li class="list-group-item list-group-item-warning">
                                <h6 class="card-title">Laptop</h6>
                                <p class="card-text"><strong>ID: </strong>'.$dato["id_l"].'<br><strong>Marca: </strong>'.$dato["marca_l"].' <strong> Modelo: </strong> '.$dato["modelo_l"].'</p>
                            </li>';
                    }
                }
                $respuesta = ControladorDetalles::ctrObtenerDetallePresBoc();
                foreach($respuesta as $dato){
                    if($dato["id_b"]){
                        echo '<li class="list-group-item list-group-item-success">
                                <h6 class="card-title">Bocina</h6>
                                <p class="card-text"><strong>ID: </strong>'.$dato["id_b"].'<br><strong>Marca: </strong>'.$dato["marca_b"].' <strong> Modelo: </strong>'.$dato["modelo_b"].'</p>
                            </li>';
                    }
                }
                ?>
            </ul>
            </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>