<link rel="stylesheet" href="./css/styleModF.css">

<div class="mb-4">
    <div class="mb-4">
        <h3>Generar reporte</h3>
    </div>
    <div class="form-mod">
        <form class="form-mod-mrg" action="#" method="post">
            <div id="cont-generar" class="row m-2">
                <div class="col-12">
                    <label for="start">Inicio</label>
                    <input type="date" id="start" name="fI">
                
                    <label for="start">Fin</label>
                    <input type="date" id="start" name="fF">
                </div>
                <div class="col-12">
                    <button id="btn-generar" type="submit">Generar</button>
                </div>
            </div>
        </form>
        <?php
            $genera = new ControladorReportes();
            $genera->ctrGenerarReporte();
        ?>
    </div>
</div>
