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

        $pres = ControladorFormularios::ctrObtenerDetallePrestamo();
        
    ?>

    <div class="form-view">
        

        <div class="row">

            <div class="col-auto">
            <form action="index.php?pagina=detallePrestamo"method="post">
                <label for="start">Folio:</label>
                <input type="hidden" value="<?= $pres["id_pres"] ?>" name="folio">
                <button type="submit" style="background:transparent; border:none;"><?= $pres["id_pres"] ?></button></form>
            </div>

        </div>

        <div class="row">
            <div class="col-auto">
                
            <form action="index.php?pagina=detalleUsuario" method="post">
                <label for="start">Código usuario:</label>
                <input type="hidden" id="start" name="codigo" value="<?= $pres["codigo_u"] ?>">
                <button type="submit" style="background:transparent; border:none;"><?= $pres["codigo_u"] ?></button>
            </form>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
            <label for="start">Nombre usuario:</label>
            <a href="./user-view.html"><input type="text" id="start" name="trip-start" value="<?= $pres["nombre_u"].' '.$pres["app_u"] ?>"></a>
            </div>
        </div>

        <div class="row">
            <div class="col-auto">
            <label for="start">Fecha de solicitud:</label>
            <input type="text" id="start" name="trip-start" value="<?= $pres["solicitud"] ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-auto">
            <label for="start">Fecha de inicio:</label>
            <input type="text" id="start" name="trip-start" value="<?= $pres["inicio"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
            <label for="start">Fecha de fin:</label>
            <input type="text" id="start" name="trip-start" value="<?= $pres["finalizo"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
            <label for="start">Ubicacion: </label>
            <input type="text" id="start" name="trip-start" value="<?= $pres["ubicacion"] ?>">
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
                
                $respuesta = ControladorFormularios::ctrObtenerDetallePresProy();

                foreach($respuesta as $dato){
                    if($dato["id_p"]){
                        echo '<li class="list-group-item">
                                <h6 class="card-title">Proyector</h6>
                                <p class="card-text">'.$dato["id_p"].'<br>'.$dato["marca_p"].' '.$dato["modelo_p"].'</p>
                            </li>';
                    }
                }

                $respuesta = ControladorFormularios::ctrObtenerDetallePresLap();

                foreach($respuesta as $dato){
                    if($dato["id_l"]){
                        echo '<li class="list-group-item">
                                <h6 class="card-title">Laptop</h6>
                                <p class="card-text">'.$dato["id_l"].'<br>'.$dato["marca_l"].' '.$dato["modelo_l"].'</p>
                            </li>';
                    }
                }

                $respuesta = ControladorFormularios::ctrObtenerDetallePresBoc();

                foreach($respuesta as $dato){
                    if($dato["id_b"]){
                        echo '<li class="list-group-item">
                                <h6 class="card-title">Bocina</h6>
                                <p class="card-text">'.$dato["id_b"].'<br>'.$dato["marca_b"].' '.$dato["modelo_b"].'</p>
                            </li>';
                    }
                }
                
                ?>
                
                <li class="list-group-item">
                    <h6 class="card-title">Cable</h6>
                    <p class="card-text">25<br>HDMI</p>
                </li>
            </ul>
            </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>