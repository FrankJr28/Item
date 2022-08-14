<?php

require_once "../../modelos/formularios.modelo.php";

$prueba = ModeloFormularios::mdlObtenerPrestamosHistorial();

echo json_encode($prueba);
