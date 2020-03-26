<?php

class ControladorContratistas{

	static public function ctrCrearContratista(){

		if (isset($_POST["nuevoContratista"])) {

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoContratista"])){

			   	$tabla = "contratistas";

			   	$item = "id";
			   	$valor = $_POST["nuevoCargo"];

			   	$cargos = ControladorContratistas::ctrMostrarCargos($item, $valor);

			   	$cursos = json_encode($_POST["certificaciones"]);

				$datos = array('nombre' => $_POST["nuevoContratista"],
								'identificacion' => $_POST["nuevaIdentificacion"],
								'lugar_expedicion' => $_POST["nuevoLugarExpedicion"],
								'telefono' => $_POST["nuevoTelefono"],
								'email' => $_POST["nuevoEmail"],
								'cargo' => $cargos["descripcion"],
								'tipo_contrato' => $_POST["nuevoTipoContrato"],
								'empresa' => $_POST["nuevaEmpresa"],
								'direccion' => $_POST["nuevaDireccion"],
								'fechaNacimiento' => $_POST["nuevaFechaNacimiento"],
								'profesion' => $_POST["nuevaProfesion"],
								'certificados' =>$cursos);

				$respuesta = ModeloContratistas::mdlCrearContratista($tabla, $datos);

				print_r($respuesta);

				if ($respuesta == "ok") {
					
					echo'<script>

					swal({
						  type: "success",
						  title: "El contratista ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "especialistas";

									}
								})

					</script>';
				}
			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El contratista no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "especialistas";

							}
						})

			  	</script>';
			}

		}
	}

	/*=============================================
	EDITAR CONTRATISTAS
	=============================================*/

	static public function ctrEditarContratista(){

		if (isset($_POST["editarContratista"])) {

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarContratista"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarIdentificacion"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"])){

			   	$tabla = "contratistas";

			   	$item = "id";
			   	$valor = $_POST["editarCargo"];

			   	$cargos = ControladorContratistas::ctrMostrarCargos($item, $valor);

				$datos = array('nombre' => $_POST["editarContratista"],
								'identificacion' => $_POST["editarIdentificacion"],
								'lugar_expedicion' => $_POST["editarLugarExpedicion"],
								'telefono' => $_POST["editarTelefono"],
								'email' => $_POST["editarEmail"],
								'cargo' => $cargos["descripcion"],
								'tipo_contrato' => $_POST["editarTipoContrato"],
								'empresa' => $_POST["editarEmpresa"],
								'direccion' => $_POST["editarDireccion"],
								'fechaNacimiento' => $_POST["editarFechaNacimiento"],
								'id' => $_POST["idContratista"],
								'profesion' => $_POST["editarProfesion"]);

				$respuesta = ModeloContratistas::mdlEditarContratista($tabla, $datos);

				print_r($respuesta);

				if ($respuesta == "ok") {
					
					echo'<script>

					swal({
						  type: "success",
						  title: "El contratista ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "especialistas";

									}
								})

					</script>';
				}
			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El contratista no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "especialistas";

							}
						})

			  	</script>';
			}

		}
	}


	/*=============================================
	MOSTRAR CONTRATISTAS
	=============================================*/

	static public function ctrMostrarContratistas($item, $valor){

		$tabla = "contratistas";

		$respuesta = ModeloContratistas::mdlMostrarContratistas($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR CONTRATISTAS
	=============================================*/

	static public function ctrCrearContrato(){

		if (isset($_POST["empresaContrato"])) {
			
				$tabla = "contratos";

				$item = "nombre";
			   	$valor = $_POST["empresaContrato"];

			   	$empresa = ControladorContratistas::ctrMostrarEmpresa($item, $valor);

			   	$tablaContratista = "contratistas";

				$datosContratista = array("id" => $_POST["idcontratista"],
							   "asignacion" => 1,
								"fecha_fin_contrato" => $_POST["fechaFinalContrato"]);

				$contratista = ModeloContratistas::mdlAsignacionContrato($tablaContratista, $datosContratista);

				$datos = array("empresa" => $_POST["empresaContrato"],
							   "representante" => $_POST["nombreContratante"],
							   "docrepresentante" => $_POST["identificacionContratante"],
								"id_contratista" => $_POST["idcontratista"],
								"tipo_contrato" => $_POST["tipoContrato"],
								"ciudad" => $_POST["ciudadContrato"],
								"vigencia" => $_POST["vigenciaContrato"],
								"fecha_inicio" => $_POST["fechaInicioContrato"],
								"fecha_fin" => $_POST["fechaFinalContrato"],
								"valor" => $_POST["valorContrato"],
								"forma_pago" => $_POST["formaDePagoContrato"],
								"dias" => $_POST["diasFacturaContrato"],
								"ciudad_factura" => $_POST["ciudadFacturaContrato"],
								"direccion" => $_POST["direccionContrato"],
								"correo" => $_POST["correoContrato"],
								"telefono_representante" => $empresa["telefono_representante"],
								"correo_representante" => $empresa["correo_representante"],
								"direccion_representante" => $empresa["direccion_representante"],
								"nit" => $empresa["nit"],
								"poliza" => $_POST["poliza"],
								"salario" => $_POST["salario"],
								"obligaciones" => $_POST["obligacionesContrato"]);

				$respuesta = ModeloContratistas::mdlCrearContrato($tabla, $datos);

				if ($respuesta == "ok") {
						
						echo'<script>

						swal({
							  type: "success",
							  title: "El contrato ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "especialistas";

										}
									})

						</script>';
				}

		}
	}

	/*=============================================
	MOSTRAR CONTRATOS
	=============================================*/

	static public function ctrMostrarContratos($item, $valor){

		$tabla = "contratos";

		$respuesta = ModeloContratistas::mdlMostrarContratos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR CONTRATOS RANGO DE FECHAS
	=============================================*/

	static public function ctrMostrarContratosRangoFecha($item, $valor){

		$tabla = "contratos";

		$respuesta = ModeloContratistas::mdlMostrarContratosRangoFecha($tabla, $item, $valor);

		return $respuesta;

	}


	/*=============================================
	MOSTRAR CARGOS
	=============================================*/

	static public function ctrMostrarCargos($item, $valor){

		$tabla = "cargos";

		$respuesta = ModeloContratistas::mdlMostrarCargos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR DATOS DE LA EMPRESA
	=============================================*/

	static public function ctrMostrarEmpresa($item, $valor){

		$tabla = "empresa";

		$respuesta = ModeloContratistas::mdlMostrarEmpresa($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR DATOS CONTRATO
	=============================================*/

	static public function ctrEditarContrato(){

		if (isset($_POST["EditarempresaContrato"])) {
			
			$tabla = "contratos";

			$item = "nombre";
		   	$valor = $_POST["EditarempresaContrato"];

		   	$empresa = ControladorContratistas::ctrMostrarEmpresa($item, $valor);

		   	$tablaContratista = "contratistas";

			$datosContratista = array("id" => $_POST["Editaridcontratista"],
							   "asignacion" => 1,
								"fecha_fin_contrato" => $_POST["EditarfechaFinalContrato"]);

			$contratista = ModeloContratistas::mdlAsignacionContrato($tablaContratista, $datosContratista);


			$datos = array("empresa" => $_POST["EditarempresaContrato"],
						   "representante" => $_POST["EditarnombreContratante"],
						   "docrepresentante" => $_POST["EditaridentificacionContratante"],
							"id_contratista" => $_POST["Editaridcontratista"],
							"tipo_contrato" => $_POST["EditartipoContrato"],
							"ciudad" => $_POST["EditarciudadContrato"],
							"vigencia" => $_POST["EditarvigenciaContrato"],
							"fecha_inicio" => $_POST["EditarfechaInicioContrato"],
							"fecha_fin" => $_POST["EditarfechaFinalContrato"],
							"valor" => $_POST["EditarvalorContrato"],
							"forma_pago" => $_POST["EditarformaDePagoContrato"],
							"dias" => $_POST["EditardiasFacturaContrato"],
							"ciudad_factura" => $_POST["EditarciudadFacturaContrato"],
							"direccion" => $_POST["EditardireccionContrato"],
							"correo" => $_POST["EditarcorreoContrato"],
							"telefono_representante" => $empresa["telefono_representante"],
							"correo_representante" => $empresa["correo_representante"],
							"direccion_representante" => $empresa["direccion_representante"],
							"poliza" => $_POST["Editarpoliza"],
							"salario" => $_POST["Editarsalario"],
							"id" => $_POST["idcontrato"],
							"obligaciones" => $_POST["EditarobligacionesContrato"]);

			$respuesta = ModeloContratistas::mdlEditarContrato($tabla, $datos);

			if ($respuesta == "ok") {
					
					echo'<script>

					swal({
						  type: "success",
						  title: "El contrato ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "especialistas";

									}
								})

					</script>';
			}

		}
	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarContratista(){

		if(isset($_GET["idContratista"])){

			$tabla ="contratistas";
			$datos = $_GET["idContratista"];

			$respuesta = ModeloContratistas::mdlBorrarContratista($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El contratista ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "especialistas";

								}
							})

				</script>';

			}		

		}

	}

	/*=============================================
	RANGO DE FECHAS
	=============================================*/

	static public function ctrRangoFechas($fechaInicial, $fechaFinal){

		$tabla = "contratistas";

		$respuesta = ModeloContratistas::MdlRangoFechas($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;

	}

	/*=============================================
	DESCARGAR EXCEL
	=============================================*/
	public function ctrDescargarReporte(){

		if (isset($_GET["reporte"])) {

			$tabla = "contratos";
			
			if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){

				$citas = ModeloContratistas::mdlMostrarContratosRangoFecha($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);

			}else{

				$item = null;
				$valor = null;

				$citas = ModeloContratistas::mdlMostrarContratos($tabla, $item, $valor);

			}

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");
		
			echo utf8_decode("<table border='0'> 

					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>EMPRESA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NIT</td>
					<td style='font-weight:bold; border:1px solid #eee;'>REPRESENTANTE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TIPO DE CONTRATO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>IDENTIFICACION</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TELEFONO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PROFESION</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA INICIO</td>			
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA FIN</td>
					<td style='font-weight:bold; border:1px solid #eee;'>ESTADO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>		
					</tr>");

			foreach ($citas as $key => $value) {

				echo utf8_decode("<tr>

					<td style='border:1px solid #eee;'>".$value["empresa"]."</td>
					<td style='border:1px solid #eee;'>".$value["nit"]."</td>
					<td style='border:1px solid #eee;'>".$value["representante"]."</td>
					<td style='border:1px solid #eee;'>".$value["tipo_contrato"]."</td>");

				$tabla = "contratistas";
				$item = "id";
				$valor = $value["id_contratista"];

				$contratistas = ModeloContratistas::mdlMostrarContratistas($tabla, $item, $valor);


				echo utf8_decode("<td style='border:1px solid #eee;'>".$contratistas["nombre"]."</td>
					<td style='border:1px solid #eee;'>".$contratistas["identificacion"]."</td>
					<td style='border:1px solid #eee;'>".$contratistas["telefono"]."</td>
					<td style='border:1px solid #eee;'>".$contratistas["profesion"]."</td> 
					<td style='border:1px solid #eee;'>".$value["fecha_inicio"]."</td> 
					<td style='border:1px solid #eee;'>".$value["fecha_fin"]."</td> 
					<td style='border:1px solid #eee;'>");

				if ($contratistas["contrato"]==1) {
					$estado="Realizado";
				}else{
					$estado="Pendiente";
				}
					echo utf8_decode($estado."</td>");
					echo utf8_decode("</td><td style='border:1px solid #eee;'>".$value["fecha"]."</td> 

				</tr>");
			}

		echo "</table>";

		}
	}


}