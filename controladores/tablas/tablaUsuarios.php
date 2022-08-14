<?php

require_once "../../modelos/usuarios.modelo.php";

$prueba = ModeloUsuarios::mdlObtenerUsuarios();

echo json_encode($prueba);