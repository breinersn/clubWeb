<?php

class ControladorSpeedys{

	/*=============================================
	MOSTRAR MOTO SPEEDYS
	=============================================*/

	static public function ctrMostrarSpeedys(){


		$respuesta = ModeloSpeedys::mdlMostrarSpeedys();

		return $respuesta;

	}

	/*=============================================
	CREAR MOTO DEL SPEEDYS
	=============================================*/

	static public function ctrCrearMotosDeSpeedys(){


		if(isset($_POST["marcaMoto"])){

		   	$tabla = "moto";

		   	$datos = array("marcaMoto"=>$_POST["marcaMoto"],
				           "modelo"=>$_POST["modeloMoto"],
				           "placa"=>$_POST["placaMoto"],
				           "nombre_propietario"=>$_POST["nombrePropietario"],
				           "nombre_propietario"=>$_POST["cedulaPropietario"],
				           "id_conductor"=>$_POST["id_conductor"]);

		   	$respuesta = ModeloSpeedys::mdlCrearMotosDeSpeedys($tabla, $datos);

		   	if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La moto ha sido guardado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "speedys";

								}
							})

				</script>';

			}

		}
	}

	/*=============================================
	MOSTRAR MUNICIPIOS
	=============================================*/

	static public function ctrMostrarMunicipios($item, $valor){

		$tabla = "municipios";

		$respuesta = ModeloSpeedys::mdlMostrarMunicipios($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR carro SPEEDYS
	=============================================*/

	static public function ctrMostrarCarroSpeedys(){


		$respuesta = ModeloSpeedys::mdlMostrarCarroSpeedys();

		return $respuesta;

	}
}