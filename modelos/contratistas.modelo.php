<?php

require_once "conexion.php";

class ModeloContratistas{

	static public function mdlCrearContratista ($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, telefono, identificacion, lugar_expedicion, correo, certificaciones, tipo_contrato, empresa, cargo, direccion, fecha_nacimiento, profesion) VALUES (:nombre, :telefono, :identificacion, :lugar_expedicion, :email, :certificados, :tipo_contrato, :empresa, :cargo, :direccion, :fechaNacimiento, :profesion)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":identificacion", $datos["identificacion"], PDO::PARAM_INT);
		$stmt->bindParam(":lugar_expedicion", $datos["lugar_expedicion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_contrato", $datos["tipo_contrato"], PDO::PARAM_STR);
		$stmt->bindParam(":certificados", $datos["certificados"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":profesion", $datos["profesion"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR CONTRATISTAS
	=============================================*/

	static public function mdlEditarContratista ($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, telefono = :telefono, identificacion=:identificacion, lugar_expedicion=:lugar_expedicion, correo=:email,  tipo_contrato=:tipo_contrato, empresa=:empresa, cargo=:cargo, direccion=:direccion, fecha_nacimiento=:fechaNacimiento, profesion=:profesion WHERE id=:id");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":identificacion", $datos["identificacion"], PDO::PARAM_INT);
		$stmt->bindParam(":lugar_expedicion", $datos["lugar_expedicion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_contrato", $datos["tipo_contrato"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":profesion", $datos["profesion"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);



		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	MOSTRAR CONTRATISTAS
	=============================================*/

	static public function mdlMostrarContratistas($tabla, $item, $valor){

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

	/*=============================================
	CREAR CONTRAT0
	=============================================*/

	static public function mdlCrearContrato ($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(empresa, representante, docrepresentante, id_contratista, tipo_contrato, ciudad, vigencia, fecha_inicio, fecha_fin, valor, forma_pago, dias, ciudad_factura, direccion, correo, obligaciones, telefono_representante, correo_representante, direccion_representante, poliza, salario, nit) VALUES (:empresa, :representante, :docrepresentante, :id_contratista, :tipo_contrato, :ciudad, :vigencia, :fecha_inicio, :fecha_fin, :valor, :forma_pago, :dias, :ciudad_factura, :direccion, :correo, :obligaciones, :telefono_representante, :correo_representante, :direccion_representante, :poliza, :salario, :nit)");


		$stmt->bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":docrepresentante", $datos["docrepresentante"], PDO::PARAM_INT);
		$stmt->bindParam(":id_contratista", $datos["id_contratista"], PDO::PARAM_STR);
		$stmt->bindParam(":representante", $datos["representante"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_contrato", $datos["tipo_contrato"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":vigencia", $datos["vigencia"], PDO::PARAM_STR);
		$stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
		$stmt->bindParam(":forma_pago", $datos["forma_pago"], PDO::PARAM_STR);
		$stmt->bindParam(":dias", $datos["dias"], PDO::PARAM_STR);
		$stmt->bindParam(":ciudad_factura", $datos["ciudad_factura"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":obligaciones", $datos["obligaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono_representante", $datos["telefono_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":correo_representante", $datos["correo_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion_representante", $datos["direccion_representante"], PDO::PARAM_STR);
		$stmt->bindParam(":poliza", $datos["poliza"], PDO::PARAM_STR);
		$stmt->bindParam(":salario", $datos["salario"], PDO::PARAM_STR);
		$stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_STR);

		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CONTRATOS
	=============================================*/

	static public function mdlMostrarContratos($tabla, $item, $valor){

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

	/*=============================================
	MOSTRAR CARGOS
	=============================================*/

	static public function mdlMostrarCargos($tabla, $item, $valor){

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

	/*=============================================
	MOSTRAR DATOS DE LA EMPRESA
	=============================================*/

	static public function mdlMostrarEmpresa($tabla, $item, $valor){

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

	static public function mdlEditarContrato($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET empresa = :empresa, representante = :representante, docrepresentante = :docrepresentante, id_contratista = :id_contratista, tipo_contrato = :tipo_contrato, ciudad= :ciudad, vigencia=:vigencia, fecha_inicio= :fecha_inicio, fecha_fin=:fecha_fin, valor= :valor, forma_pago=:forma_pago, dias=:dias, ciudad_factura=:ciudad_factura, direccion=  :direccion, correo=:correo, obligaciones=:obligaciones, telefono_representante=:telefono_representante, correo_representante=:correo_representante, direccion_representante= :direccion_representante, poliza=:poliza, salario=:salario WHERE id = :id");


			$stmt->bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
			$stmt->bindParam(":docrepresentante", $datos["docrepresentante"], PDO::PARAM_INT);
			$stmt->bindParam(":id_contratista", $datos["id_contratista"], PDO::PARAM_STR);
			$stmt->bindParam(":representante", $datos["representante"], PDO::PARAM_STR);
			$stmt->bindParam(":tipo_contrato", $datos["tipo_contrato"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
			$stmt->bindParam(":vigencia", $datos["vigencia"], PDO::PARAM_STR);
			$stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
			$stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
			$stmt->bindParam(":forma_pago", $datos["forma_pago"], PDO::PARAM_STR);
			$stmt->bindParam(":dias", $datos["dias"], PDO::PARAM_STR);
			$stmt->bindParam(":ciudad_factura", $datos["ciudad_factura"], PDO::PARAM_STR);
			$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
			$stmt->bindParam(":obligaciones", $datos["obligaciones"], PDO::PARAM_STR);
			$stmt->bindParam(":telefono_representante", $datos["telefono_representante"], PDO::PARAM_STR);
			$stmt->bindParam(":correo_representante", $datos["correo_representante"], PDO::PARAM_STR);
			$stmt->bindParam(":direccion_representante", $datos["direccion_representante"], PDO::PARAM_STR);
			$stmt->bindParam(":poliza", $datos["poliza"], PDO::PARAM_STR);
			$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
			$stmt->bindParam(":salario", $datos["salario"], PDO::PARAM_STR);
			
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	

	}

	static public function mdlAsignacionContrato($tablaContratista, $datosContratista){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablaContratista SET contrato = :asignacion, fecha_fin_contrato = :fecha_fin_contrato WHERE id = :id");

			$stmt->bindParam(":id", $datosContratista["id"], PDO::PARAM_STR);
			$stmt->bindParam(":asignacion", $datosContratista["asignacion"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_fin_contrato", $datosContratista["fecha_fin_contrato"], PDO::PARAM_STR);
			

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarContratista($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

	/*=============================================
	RANGO DE FECHAS
	=============================================*/

	static public function MdlRangoFechas($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla /*ORDER BY fecha ASC*/");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_fin_contrato like '%$fechaInicial%'");

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_fin_contrato BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_fin_contrato BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	RANGO DE FECHAS CONTRATOS
	=============================================*/

	static public function mdlMostrarContratosRangoFecha($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla /*ORDER BY fecha ASC*/");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaInicial%'");

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

}