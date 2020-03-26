<?php

class ModeloUsuariosGenerales{

	static public function mdlMostrarUsuariosGenerales(){

		$url = "https://us-central1-clubspeedy-dev.cloudfunctions.net/api/usuarios";
		$json = file_get_contents($url);
    	$respuesta = json_decode($json, true);

		return $respuesta;
	}

}