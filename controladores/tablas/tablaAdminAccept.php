<?php

require_once "../../modelos/formularios.modelo.php";

$prueba = ModeloFormularios::mdlObtenerPrestamosAceptar();

echo json_encode($prueba);
