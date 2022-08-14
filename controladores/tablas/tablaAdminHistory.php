<?php

require_once "../../modelos/infoTablas.modelo.php";

$prueba = ModeloInfoTablas::mdlObtenerPrestamosHistorial();

echo json_encode($prueba);
