<?php

require_once "../../../controladores/contratistas.controlador.php";
require_once "../../../modelos/contratistas.modelo.php";


class imprimirKardex{

public $idProducto;

public function traerImpresionKardex(){

//TRAEMOS LA INFORMACION DE LOS INGRESOS

$tabla = "kardex";
$item = null;
$valor = null;

$kardex = ModeloKardex::mdlMostrarKardex($tabla, $item, $valor);


$item = "id";
$valor = $_GET["idProducto"];
$orden = "id";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

$nombreProducto = strtoupper($productos["descripcion"]);

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF

	<table>

		
		<tr>

			<td style="width:150px"><img src="images/logo-negro-bloque.png"></td>
			<td style="background-color:white; width:140px; text-align:center"></td>
			<td style="background-color:white; width:140px; text-align:center"></td>
			<td style="background-color:white; width:110px; text-align:center; color:#727170;  font-size:16px">
				<br><br>
				KARDEX
			</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<br><br>
		<tr><td style="background-color:white; width:540px; text-align:center">Distribuciones SJ</td></tr>
		<tr><td style="background-color:white; width:540px; text-align:center">Nit: 77193461</td></tr>
		<tr><td style="background-color:white; width:540px; text-align:center">Telefono: </td></tr>
		<tr><td style="background-color:white; width:540px; text-align:center">Correo: </td></tr>	

	</table>


EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px; text-align:center; color:#D3354F; font-size:16px">

				<br><br>MOVIMIENTOS DEL PRODUCTO: <h6 style="color:#727170">$nombreProducto</h6>

			</td>
		
		</tr>

	</table>

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="width:180"></td>
			<td style="border: 1px solid #0099ff; background-color:#0099ff; width:120; text-align:center; color:white">Entradas</td>
			<td style="border: 1px solid #0099ff; background-color:#0099ff; width:120; text-align:center; color:white">Salidas</td>
			<td style="border: 1px solid #0099ff; background-color:#0099ff; width:120; text-align:center; color:white">Saldo</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#0099ff">Fecha</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#0099ff">Detalle</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#0099ff">Valor uni</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#0099ff">Cant.</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#0099ff">Total</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#0099ff">Cant.</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#0099ff">Total</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#0099ff">Cant.</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#0099ff">Total</td>

		</tr>


	</table>


EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

$tota = $productos["precio_compra"] * $productos["stock_inicial"];
$total = number_format($tota);
$precionUnidad = number_format($productos["precio_compra"]);

$stockTotal = $productos["stock_inicial"];
	

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#727170">$productos[fecha_agregado]</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#727170">Stock inicial</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#727170">$ $precionUnidad</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#727170">$productos[stock_inicial]</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#727170"></td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#727170"></td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#727170"></td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#727170">$productos[stock_inicial]</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#727170">$ $total</td>

		</tr>

				<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

// -------------------------------------------------

foreach ($kardex as $key => $value) {

if ($value["id_producto"]==$_GET["idProducto"]) {
	

$preciotota = $value["valor"] * $value["cantidad"];
$preciototal = number_format($preciotota);

if ($value["tipo"]=="Compra") {

$stockTotal = $stockTotal + $value["cantidad"];
$cantidaTota = $stockTotal * $value["valor"];
$cantidaTotal = number_format($cantidaTota);


$valorC=number_format($value["valor"]);

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#727170">$value[fecha]</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#727170">$value[tipo]</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#727170">$ $valorC</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#727170">$value[cantidad]</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#727170">$preciototal</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#727170"></td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#727170"></td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#727170">$stockTotal</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#727170">$cantidaTotal</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

}else{ if ($value["tipo"]=="Venta") {

$stockTotal = $stockTotal - $value["cantidad"];
$cantidaTota = $stockTotal * $value["valor"];
$cantidaTotal = number_format($cantidaTota);

$valorV=number_format($value["valor"]);

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#727170">$value[fecha]</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#727170">$value[tipo]</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#727170">$ $valorV</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#727170"></td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#727170"></td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#727170">$value[cantidad]</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#727170">$preciototal</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#727170">$stockTotal</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#727170">$cantidaTotal</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

}else{

$stockTotal = $stockTotal + $value["cantidad"];
$cantidaTota = $stockTotal * $value["valor"];
$cantidaTotal = number_format($cantidaTota);

$valorD=number_format($value["valor"]);

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#727170">$value[fecha]</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#727170">$value[tipo]</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:60px; text-align:center; color:#727170">$ $valorD</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#727170">$value[cantidad]</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#727170">$preciototal</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#727170"></td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#727170"></td>
			<td style="border: 1px solid #0099ff; background-color:white; width:50px; text-align:center; color:#727170">$stockTotal</td>
			<td style="border: 1px solid #0099ff; background-color:white; width:70px; text-align:center; color:#727170">$cantidaTotal</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

}
}

}

}


// -------------------------------------------------


/*==========================================
=            SALIDA DEL ARCHIVO            =
==========================================*/
ob_end_clean();
$pdf->Output('kardex.pdf');

}

}

$kardex = new imprimirKardex();
$kardex -> idproducto = $_GET["idProducto"];
$kardex -> traerImpresionKardex();

?>