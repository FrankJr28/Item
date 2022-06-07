<link rel="stylesheet" href="./css/styleModF.css">
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

<div class="mb-4">
    <div class="mb-4">
        <h3>Generar Gráficos</h3>
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
    </div>
    <div id="grafico"></div>
    <div class="w-100">
        <?php
            if(isset($_POST['fI']) && isset($_POST["fF"])){
                echo "Se muestran los prestamos realizados del ".$_POST["fI"]." al ".$_POST["fF"]; 
            }
        ?>
    </div>
    <?php
        $g= new ControladorReportes();
        $g->ctrObtenerPeriodo();
    ?>

</div>