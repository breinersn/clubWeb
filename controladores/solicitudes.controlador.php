<?php

class ControladorSolicitudes{

	/*=============================================
	MOSTRAR MOTO SPEEDYS
	=============================================*/

	static public function ctrMostrarSolicitudesEliminadas(){


		$respuesta = ModeloSolicitudes::mdlMostrarSolicitudesEliminadas();

		return $respuesta;

	}

	
}