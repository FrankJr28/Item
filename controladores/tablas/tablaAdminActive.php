<?php

require_once "../../modelos/formularios.modelo.php";

$prueba = ModeloFormularios::mdlObtenerPrestamosActivos();

echo json_encode($prueba);