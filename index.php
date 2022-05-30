<?php

require_once "controladores/plantilla.controlador.php";

require_once "modelos/formularios.modelo.php";

require_once "controladores/formularios.controlador.php";

require_once "modelos/articulosAdmin.modelo.php";

require_once "controladores/articulosAdmin.controlador.php";

require_once "modelos/usuarios.modelo.php";

require_once "controladores/usuarios.controlador.php";

$plantilla = new ControladorPlantilla();

$plantilla->ctrTraerPlantilla();