<?php

require_once "../modelos/formularios.modelo.php";

$prueba = ModeloFormularios::mdlObtenerPrestamosAceptar();

//$prueba = array_values($prueba);

//$prueba = implode(",",$prueba);

echo json_encode($prueba);

//$prueba = json_decode($prueba);

//echo $prueba;

//print_r(json_decode($prueba));
