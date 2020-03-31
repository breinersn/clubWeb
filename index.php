<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/speedys.controlador.php";
require_once "controladores/usuarios-generales.controlador.php";
require_once "controladores/solicitudes.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/speedys.modelo.php";
require_once "modelos/usuarios-generales.modelo.php";
require_once "modelos/solicitudes.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();