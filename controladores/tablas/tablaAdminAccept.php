<?php

require_once "../../modelos/infoTablas.modelo.php";

$prueba = ModeloInfoTablas::mdlObtenerPrestamosAceptar();

echo json_encode($prueba);
