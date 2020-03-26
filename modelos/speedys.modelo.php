<?php

class ModeloSpeedys{

	static public function mdlMostrarSpeedys (){

		$url = "https://us-central1-clubspeedy-dev.cloudfunctions.net/api/usuarios";
		$json = file_get_contents($url);
    	$respuesta = json_decode($json, true);

		return $respuesta;

	}

	static public function mdlCrearMotosDeSpeedys($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(marca) VALUES (:marca)");

		$stmt->bindParam(":marca", $datos["marcaMoto"], PDO::PARAM_INT);
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;


	}
	
	/*=============================================
	MOSTRAR MUNICIPIOS
	=============================================*/

	static public function mdlMostrarMunicipios($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}
	
	static public function mdlMostrarCarroSpeedys (){

		$url = "https://us-central1-speedy-dev-d2d52.cloudfunctions.net/api/users";
		$json = file_get_contents($url);
    	$respuesta = json_decode($json, true);

		return $respuesta;

	}

}
