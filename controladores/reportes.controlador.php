<?php

/*          HTML2PDF            */

require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

/*          HTML2PDF            */

class ControladorReportes{

    public function ctrGenerarReporte(){

        if(isset($_POST['fI']) && isset($_POST["fF"])){

            //echo "Sí hay variables post";

            ob_end_clean();
            ob_start();

            require_once 'vistas/paginas/print_view.php';

            $html = ob_get_clean();

            $html2pdf = new Html2Pdf('P','A4','es', true, 'UTF-8', array(5, 6, 5, 6));//if we want horizontal instead of P we put L
                
            $html2pdf->writeHTML($html);
         
            $html2pdf ->output();

        }

    }

    public function ctrObtenerPeriodo(){

        if(isset($_POST['fI']) && isset($_POST["fF"])){

            //echo "Sí hay variables post";

            $respuesta = ModeloReportes::mdlObtenerPeriodo($_POST['fI'],$_POST["fF"]);
            /* 
            echo "tal cual<br>";
            var_dump($respuesta);
            echo "<br>encodificado<br>";
            var_dump(json_encode($respuesta));
            */
            echo "<script>

                var parametros = [];
                var valores = [];
                var adaptadores = [];
                var bocinas = [];
                var cables = [];
                var laptops = [];
                var proyectores = [];


                var ar =".json_encode($respuesta).";
                console.log(ar); 
                
                for (var i = 0; i < ar.length ; i++) {
                    parametros.push(ar[i].finalizo.toString());
                    valores.push(ar[i].cantidad);
                    adaptadores.push(ar[i].adaptadores);
                    bocinas.push(ar[i].bocinas);
                    cables.push(ar[i].cables);

                }

                var traceAdaptadores={
                    x: parametros,
                    y: adaptadores,
                    name: 'adaptadores',
                    type: 'bar'
                };

                var traceBocinas={
                    x: parametros,
                    y: bocinas,
                    name: 'bocinas',
                    type: 'bar'
                };

                var traceCables={
                    x: parametros,
                    y: cables,
                    name: 'cables',
                    type: 'bar'
                };

                var traceLaptops={
                    x: parametros,
                    y: cables,
                    name: 'laptops',
                    type: 'bar'
                };

                var traceProyectores={
                    x: parametros,
                    y: cables,
                    name: 'proyectores',
                    type: 'bar'
                };

                var traceTotal= {
                    x: parametros,
                    y: valores,
                    name: 'total',
                    type: 'bar'
                };

                var data = [traceTotal, traceBocinas, traceAdaptadores, traceCables, traceLaptops, traceProyectores];

                var layout = {barmode: 'group'};

                title: 'January 2013 Sales Report'

                Plotly.newPlot('grafico',data,layout);

            </script>";

        }

    }

    

}