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

    

}