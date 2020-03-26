<?php

class ControladorUsuariosGenerles{

	static public function ctrMostrarUsuariosGenerles(){

		$respuesta = ModeloUsuariosGenerales::mdlMostrarUsuariosGenerales();

		return $respuesta;

	}
}