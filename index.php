<?php

require_once "controladores/plantilla.controlador.php";

require_once "modelos/formularios.modelo.php";
require_once "controladores/formularios.controlador.php";

require_once "modelos/articulosAdmin.modelo.php";
require_once "controladores/articulosAdmin.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "controladores/usuarios.controlador.php";

require_once "controladores/reportes.controlador.php";
require_once "modelos/reportes.modelo.php";

require_once "controladores/detalles.controlador.php";
require_once "modelos/detalles.modelo.php";

require_once "controladores/solicitar.controlador.php";
require_once "modelos/solicitar.modelo.php";

require_once "controladores/infoUsuario.controlador.php";
require_once "modelos/infoUsuario.modelo.php";

require_once "modelos/user.modelo.php";

$plantilla = new ControladorPlantilla();

$plantilla->ctrTraerPlantilla();