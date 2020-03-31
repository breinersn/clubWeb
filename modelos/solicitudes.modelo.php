<?php

class ModeloSolicitudes{

	static public function mdlMostrarSolicitudesEliminadas (){

		$url = "https://us-central1-clubspeedy-dev.cloudfunctions.net/api/getSolicitudesEliminadas";
		$json = file_get_contents($url);
    	$respuesta = json_decode($json, true);

		return $respuesta;

	}


}
