<?php

require_once "../../../controladores/contratistas.controlador.php";
require_once "../../../modelos/contratistas.modelo.php";


class imprimirContrato{

public $idContratista;

public function traerImpresionContrato(){

//TRAEMOS LA INFORMACION DE LOS INGRESOS

$tabla = "contratos";
$item = "id_contratista";
$valor = $_GET["idContratista"];

$contrato = ModeloContratistas::mdlMostrarContratos($tabla, $item, $valor);


$item = "id";
$valor = $_GET["idContratista"];

$contratista = ControladorContratistas::ctrMostrarContratistas($item, $valor);


require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'clinica_de_los_rios.png';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$pdf->SetHeaderData();

$bloque1 = <<<EOD

<table border="1" cellpadding="2" cellspacing="2" align="center">
 <tr nobr="true">
  <td style="width:120px"><img src="images/clinica_de_los_rios.png"></td>
  <td style="width:410px"><h3 >CONTRATO DE PRESTACIÓN DE SERVICIOS PERSONAL ADMINISTRATIVO NO PROFESIONAL</h3><br><h5 style="font-weight: normal">CODIGO: DS-GETH-CPSPANP-001</h5></td>
 </tr>
 <tr>
        <td rowspan="2"><h6 style="text-align: center"><br>INTEGRALES HEALTH SAS<br>Nit.: 900638867-2</h6></td>
        <td><h5 style="font-weight: normal">NOMBRE DEL PROCESO: GESTION DEL TALENTO HUMANO</h5></td>
    </tr>
    <tr>
       <td><h6>PÁGINA 1 DE 6 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Versión: 01 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	Fecha de Edición: 12-06-2019</h6></td>
    </tr>
</table>
EOD;

$pdf->writeHTML($bloque1, true, false, false, false, '');

$bloque2 = <<<EOD

<table>
		
		<tr>
			
			<td style="width:540px; text-align: justify">

Entre los suscritos a saber: $contrato[representante], mayor de edad, vecino de esta ciudad, identificado con la cédula de ciudadanía No.: $contrato[docrepresentante] obrando en su condición de Representante Legal de INTEGRALES HEALTH SAS - CLINICA DE LOS RIOS, identificada con el NIT.900.638.867-2 quién en adelante y para todos los efectos se denominará EL CONTRATANTE y por otra parte $contratista[nombre], mayor de edad, vecino (a) de la ciudad de $contrato[ciudad], identificado(a) con la cédula de ciudadanía No. $contratista[identificacion], obrando en nombre propio, quién en adelante y para todos los efectos se denominará CONTRATISTA, se ha celebrado el presente contrato de prestación de servicios, el cual se regirá por las siguientes cláusulas: CLÁUSULA PRIMERA.- OBJETO DEL CONTRATO: En virtud del presente contrato, el CONTRATISTA de manera autónoma e independiente y sin que se entienda la existencia de relación ni de subordinación laboral alguna,  utilizando sus propios medios y personal se obliga para con EL CONTRATANTE, a cambio de la remuneración adelante establecida, a prestar sus servicios técnicos y/o tecnológicos como: $contratista[cargo], dicha actividad es contratada en referencia a los estudios técnicos y/o tecnológicos del contratista, como: $contratista[cargo]. CLAUSULA SEGUNDA. - LUGAR DE EJECUCIÓN DEL CONTRATO: La prestación del servicio contratado, se ejecutará en la ciudad de $contrato[ciudad], pudiendo ser en las instalaciones del CONTRATANTE, y/o cualquier otra donde el contratista decida ejercer de manera libre la actividad para la cual fue contratado. CLÁUSULA TERCERA.- NATURALEZA DEL CONTRATO: Las partes dejan expresa constancia de que el presente contrato, por su naturaleza, no constituye contrato de trabajo en ninguna de las relaciones con el CONTRATISTA para con EL CONTRATANTE, ya que por sus características, este es un contrato civil de prestación de servicios y en tal forma se rige por las normas del Código Civil Colombiano. CLÁUSULA CUARTA. - DURACIÓN DEL CONTRATO: La vigencia del presente contrato es de ($contrato[vigencia]) meses, a partir del día $contrato[fecha_inicio] hasta el $contrato[fecha_fin]. PARAGRAFO: NUEVO SERVICIO.- Si vencido el término del contrato, y el CONTRATANTE requiere algún servicio del CONTRATISTA, se deberá hacer un nuevo contrato de prestación de servicios profesionales, el cual no se entenderá como prórroga, pues con la terminación del término inicialmente pactado desaparecen las causas que dieron origen a este. CLÁUSULA QUINTA.- VALOR ESTIMADO DEL CONTRATO: $contrato[valor], cancelándose de manera mensual la suma de $contrato[forma_pago]. CLÁUSULA SEXTA.- FORMA DE PAGO: Los honorarios se cancelarán dentro de los cinco (05) días siguientes a la aprobación de la factura o documento equivalente, que presente el contratista para tal efecto. La factura o documento equivalente, debe incluir el informe de gestión de las actividades desarrolladas en el mes y los comprobantes de pago al sistema de seguridad social. A dicha factura o documento equivalente, le será aplicable los descuentos establecidos por la ley. PARAGRAFO: El hecho de ocasionar perjuicios económicos AL CONTRATANTE  por mal desempeño en la prestación de servicios contratada, daños en los equipos, medicamentos e insumos, perjuicios, préstamos o anticipos en dinero o anticipo de honorarios, EL CONTRATISTA autoriza expresamente al CONTRATANTE con la firma de este contrato, a efectuar los descuentos de sus honorarios, o en su defecto de la liquidación del contrato, sin perjuicio de la reclamación de perjuicios que adelante el CONTRATANTE al CONTRATISTA.  CLÁUSULA SÉPTIMA.- CESIÓN DEL CONTRATO: EL CONTRATISTA, no podrá ceder en todo ni en parte a persona alguna, natural o jurídica, el presente contrato sin previa autorización por escrito de EL CONTRATANTE, no obstante podrá subcontratar el personal de apoyo que considere para ejecutar el objeto contractual, sin que ello se entienda como cesión total o parcial del mismo, o delegación del objeto contractual.  CLÁUSULA OCTAVA.- OBLIGACIONES DEL CONTRATANTE: 1) Cancelar el valor del presente contrato en la forma acordada. 2) Prestar toda la colaboración necesaria y oportuna para la adecuada ejecución del presente contrato. 3) Suministrar la información, documentación e instrumentos requeridos para que EL CONTRATISTA pueda desarrollar cada una de las actividades contratadas. 4) Atender los procedimientos convenidos con EL CONTRATISTA para la ejecución del contrato. 5) Todas las demás obligaciones contenidas en los documentos que forman parte del presente contrato o que se integren a él, durante su desarrollo y ejecución. CLAUSULA NOVENA.- OBLIGACIONES DEL CONTRATISTA. Constituyen las principales obligaciones del CONTRATISTA las siguientes: 1) Obrar con seriedad y diligencia en el servicio contratado. 2) Prestar el servicio objeto del contrato, con calidad, eficiencia, eficacia, prontitud, oportunidad, conforme a lo estipulado en el objeto del contrato. 3) Cumplir con las normas de Calidad, Ambiente, Seguridad y Salud en el trabajo que tenga establecidas EL CONTRATANTE. 4) Presentar la factura o documento equivalente, correspondiente a los servicios realmente prestados a EL CONTRATANTE, el día $contrato[dias] de cada mes o el día hábil anterior, dicha factura se deberá presentar en las oficinas del CONTRATANTE en la ciudad de $contrato[ciudad_factura] y ubicada en el barrio $contrato[direccion] En caso de no ser residente en la ciudad deberá enviarla al correo electrónico: $contrato[correo]. Radicada la factura si no se presentan objeciones dentro de los veinte (20) días calendario siguientes a su radicación, se tendrá como aceptada y deberá ser cancelada en su totalidad dentro de los cinco (05) días siguientes a su aprobación. 5) El Contratista deberá anexar a las facturas y/o documento equivalente, los pagos de su seguridad social en donde consta que cancela el porcentaje correspondiente de acuerdo al valor del contrato, que regulado por la norma es el cuarenta por ciento (40%). 6) Atender los requerimientos del sistema de información del CONTRATANTE con fines estadísticos, legales y de facturación. 7) Presentar al inicio de la contratación su Hoja de Vida con soportes que acrediten la educación, formación, habilidades y competencias requeridas para el desarrollo eficaz del Objeto del contrato y mantener actualizados estos soportes a fin dar cumplimiento a los requisitos normativos que rigen el ejercicio de la labor del CONTRATANTE para efectos de las Auditorías Externas o Internas que se requieran. 8) Notificar oportunamente las ausencias que pudieran afectar la eficaz prestación del servicio de acuerdo a lo establecido en el modelo de atención integral del CONTRATANTE. 9). Mantenerse actualizado en su ejercicio profesional, y actualizarse en la normatividad aplicable y vigente al sector salud y a su ejercicio profesional. 10). Concurrir a la liquidación del contrato, y suscribir el acta que declare el cumplimiento o incumplimiento del mismo, diligencia en la cual debe hacer entrega del informe final del contrato 11). Todas aquellas que se deriven del objeto contractual o de la ley o normas reglamentarias vigentes que regulen la materia, siempre y que no sean contrarias a la Ley y a las buenas prácticas profesionales.  PARAGRAFO. EL CONTRATISTA podrá ser llamado en garantía por EL CONTRATANTE, en cualquier proceso judicial, en los que sea llamado o vinculado el CONTRATANTE, o en las reclamaciones que reciba EL CONTRATANTE, en razón o con ocasión de los servicios prestados por el CONTRATISTA o donde haya participado el contratista. En caso de que EL CONTRATANTE sea declarado responsable, civil, penal o administrativamente a reparar daños, o condenado de forma alguna, por razón o con ocasión de los servicios o atenciones prestados por EL CONTRATISTA, al igual que por sus omisiones, o falta de diligencia y cuidado, podrá repetir contra EL CONTRATISTA, hasta obtener la reparación integral de los perjuicios ocasionados a EL CONTRATANTE. 12). Asistir y participar activamente de los comités institucionales, que de acuerdo a la normatividad legal vigente deben desarrollarse al interior de las instalaciones del CONTRATANTE. CLAUSULA DECIMA: OBLIGACIONES PARTICULARES DEL CONTRATISTA: Además de las enunciadas en la cláusula anterior, serán obligaciones especiales del CONTRATISTA, las siguientes:<br>
$contrato[obligaciones]
- ACTIVIDADES DE SOPORTE AL ÁREA, QUE SOPORTAN EL SISTEMA DE GESTIÓN INTEGRAL DE CALIDAD. 
1. Participar en el Programa de Educación Continua de la institución. 
2. Participar con la Coordinación del área en la revisión y actualización de procedimientos u otros documentos soportes relacionados con el área o disciplina. 
3. Participar activamente en los comités Institucionales que estén relacionados con sus actividades, con el objetivo de mejorar la prestación del servicio. 
CLÁUSULA DECIMA PRIMERA. - TERMINACIÓN DEL CONTRATO: Las partes pueden dar por terminado el presente contrato si acaece el incumplimiento de cualquiera de las obligaciones derivadas de éste por cualquiera de ellas. Además de las causales establecidas en la ley, se podrá dar por terminado el contrato por los siguientes motivos: 1) si EL CONTRATISTA incumpliere con alguna de las obligaciones que por este contrato se contrae 2) Cuando EL CONTRATISTA no cumpla con el objeto del presente contrato en la forma y tiempo debidos 3) Por mutuo acuerdo de las partes 4) Por incumplimiento de las obligaciones de EL CONTRATANTE. 5) por las demás causales establecidas en la ley.  CLÁUSULA DÉCIMA SEGUNDA. - TERMINACION UNILATERAL: El presente contrato podrá darse por terminado de forma unilateral por la parte CONTRATANTE en cualquier momento, dando aviso por escrito al CONTRATISTA por lo menos con quince (15) días de antelación, sin necesidad de invocar causal de terminación alguna diferente a la voluntad del CONTRATANTE. PARAGRAFO: CLÁUSULA PENAL.- En caso de incumplimiento por parte de EL CONTRATISTA de cualquiera de las obligaciones previstas en este contrato dará derecho a EL CONTRATANTE al pago de dos (2) S.M.M.L.V., sin perjuicio de la reclamación judicial o extrajudicial de los perjuicios que se ocasionen. CLÁUSULA DÉCIMA TERCERA.- CONFIDENCIALIDAD: Las partes acuerdan expresamente que toda la información que obtenga EL CONTRATISTA en desarrollo o con ocasión de este contrato es confidencial, y por lo tanto, no podrá ser divulgada a terceros, por la parte que recibe la información, ni por las personas de ella vinculadas por cualquier medio, bien sean trabajadores, asesores, u otros agentes con o sin presentación, salvo el caso en que dicha información llegue a ser de dominio público por cualquier otro medio, o por disposición de autoridad competente, so pena de las acciones legales pertinentes y la indemnización de perjuicios a la que haya lugar. La obligación de confidencialidad contenida en esta cláusula, continuará vigente aún después de la terminación del contrato por cualquier causa.  CLÁUSULA DECIMA CUARTA.- MODIFICACIONES: Cualquier modificación, adición o prorroga del presente contrato, deberá constar en documento escrito y suscrito por las partes aquí firmantes. CLÁUSULA DECIMA QUINTA. - NOTIFICACIONES: EL CONTRATISTA: $contratista[nombre] Teléfono: $contratista[telefono], E-Mail: $contratista[correo]; Dirección: $contratista[direccion], EL CONTRATANTE: CRISTIAN ELLES LORA Teléfono: $contrato[telefono_representante]; E-Mail: $contrato[correo_representante]; Dirección: $contrato[direccion_representante], ciudad de $contrato[ciudad] CLÁUSULA DÉCIMA SEXTA. SOLUCION DE CONTROVERSIAS. Las diferencias que surjan entre las partes en relación con el presente contrato, se intentarán resolver mediante arreglo directo entre las partes, y las que no puedan ser resueltas por este mecanismo, se someterán a la legislación Civil Colombiana. CLÁUSULA DÉCIMA SÉPTIMA.- LEY APLICABLE: El presente contrato se regirá por las leyes aplicables en la República de Colombia y los conflictos se dirimirán con base en ella. CLÁUSULA DÉCIMA OCTAVA.- ACUERDO TOTAL: Las partes acuerdan que el presente contrato, constituye un acuerdo único y total entre quienes suscriben el presente documento, y por lo tanto regula las relaciones jurídicas que se deriven de los servicios objeto del mismo y reemplaza cualquier otro tipo de acuerdo verbal o escrito que haya existido entre las partes sobre los mismos servicios. CLÁUSULA DÉCIMA NOVENA.- ANEXOS: Serán anexos del contrato los siguientes: Hoja de vida del contratista con todos sus soportes, informes de auditoría, facturas o documento equivalente, presentadas con sus soportes, actas de reunión entre las partes.  

En prueba de aceptación se suscribe como aparece, en dos originales del mismo tenor y valor, en la ciudad de Cartagena de Indias, a los (14) días del mes de mayo de 2019.


EL CONTRATANTE												EL CONTRATISTA 



CRISTIAN ELLES LORA											$contratista[nombre]
Representante Legal												C.C. $contratista[identificacion]de $contratista[lugar_expedicion]
INTEGRALES HEALTH SAS - CLINICA DE LOS RIOS		


			</td>
		
		</tr>

	</table>


EOD;

$pdf->writeHTML($bloque2, true, false, false, false, '');

// -----------------------------------------------------------------------------

/*==========================================
=            SALIDA DEL ARCHIVO            =
==========================================*/

$pdf->Output('contrato.pdf');

}

}

$contrato = new imprimirContrato();
$contrato -> idContratista = $_GET["idContratista"];
$contrato -> traerImpresionContrato();

?>