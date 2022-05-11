<?php
//require './vendor/autoload.php';
            
//use Spipu\Html2Pdf\Html2Pdf;

$fechaInicio = $_POST["fI"];
$fechaFin = $_POST["fF"];
$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
$resultado = ModeloFormularios::mdlPrestamosReporte($fechaInicio,$fechaFin);
$aI= substr($fechaInicio,0,4);
$mI= substr($fechaInicio,5,2);
$dI= substr($fechaInicio,8,2); 

$aF= substr($fechaFin,0,4);
$mF= substr($fechaFin,5,2);
$dF= substr($fechaFin,8,2); 
?>
    <style type="text/css">
        h4{
            text-align:center;
        }
        table{
            width: 700px;
        }
        table thead tr {
            background-color: #216e8a;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }
        table td {
            padding: 6px 7px
        }
    </style>
    <page backtop="20mm" backbottom="7mm" backleft="10mm" backright="2mm">  
    <page_header> 
        <a href="http://www.cusur.udg.mx/es/"><img src="./img/item.png" id="logoCusur"></a>              
    </page_header>
    <page_footer style="text-align:center"> 
        [[page_cu]]/[[page_nb]]
    </page_footer>
    <h4>Coordinacion de tecnologías para el aprendizaje del Centro Universitario del Sur</h4>
    <p>A continuación se presentan los prestamos de material realizados del <?= $dI ?> de <?=$meses[intval($mI)-1] ?> del <?=$aI ?> 
    al <?= $dF ?> de <?=$meses[intval($mF)-1] ?> del <?=$aF ?> </p>
    <table id="example" class="content-table">
        <thead>
            <tr>
                <th>Prestamo</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Inició</th>
                <th>Hora</th>
                <th>Finalizó</th>
                <th>Hora</th>
            </tr>
            
        </thead>

        <tbody id="ttabla">
        
            <?php foreach($resultado as $dato): ?>
                <tr>
                    <td><?php echo $dato['id_pres']; ?></td>
                    <td><?php echo $dato['codigo_u']; ?></td>
                    <td><?php echo $dato['nombre_u']." ".$dato['app_u']; ?></td>
                    <td><?php echo ($dato["ubicacion"]); ?></td>
                    
                    
                    <td><?php echo date("d/m/y",strtotime($dato["inicio"])); ?></td>
                    <td><?php echo date("G:i",strtotime($dato["inicio"])); ?></td>
                    <td><?php echo date("d-m-Y",strtotime($dato["finalizo"])); ?></td>
                    <td><?php echo date("G:i",strtotime($dato["finalizo"])); ?></td>
                </tr>
            <?php endforeach ?>
            
        </tbody>
    </table> 
    
    </page>
    