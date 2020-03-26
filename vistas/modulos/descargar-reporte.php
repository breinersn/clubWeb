<?php

require_once "../../controladores/contratistas.controlador.php";
require_once "../../modelos/contratistas.modelo.php";


$reporte = new ControladorContratistas();
$reporte -> ctrDescargarReporte();