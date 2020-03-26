<?php

require_once "conexion.php";

/**
 * MODELO EMPRESAS
 */
class ModeloEmpresas
{
	//Mostrar Empresas
	static public function mdlMostrarEmpresa($item, $valor, $tabla)
	{
		if ($item != null) {
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":" .$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			return  $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();

			return  $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;
	}

	//Crear empresa
	static public function mdlCrearEmpresa($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, nit, representante, doc_representante, telefono_representante, correo_representante, direccion_representante, ciudad) VALUES (:empresa, :nit, :representante, :identificacion, :telefono, :correo, :direccion, :ciudad)");

		$stmt->bindParam(":empresa", $datos["nombreEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":nit", $datos["nitEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":representante", $datos["representante"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":identificacion", $datos["identificacion_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":ciudad", $datos["ciudadEmpresa"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	//Editar empresa
	static public function mdlEditarEmpresa($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :empresa, nit = :nit, representante = :representante, doc_representante = :identificacion, telefono_representante =:telefono, correo_representante = :correo, direccion_representante = :direccion, ciudad =:ciudad WHERE id=:id");

		$stmt->bindParam(":empresa", $datos["nombreEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":nit", $datos["nitEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":representante", $datos["representante"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":identificacion", $datos["identificacion_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":ciudad", $datos["ciudadEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}


/*============================================
=            BORRAR EMPRESA            =
============================================*/

static public function mdlBorrarEmpresa ($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

	$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok";
		}else{
			return "error";
		}
		$stmt -> close();
		$stmt = null;
}

}