<?php

require_once "../../modelos/infoTablas.modelo.php";

$prueba = ModeloInfoTablas::mdlObtenerPrestamosActivos();

echo json_encode($prueba);