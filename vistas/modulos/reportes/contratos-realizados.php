 <?php

  if (isset($_GET["fechaInicial"])) {
    
      $fechaInicial = $_GET["fechaInicial"]; 
      $fechaFinal = $_GET["fechaFinal"];

  }else{

      $fechaInicial = null; 
      $fechaFinal = null;

  }

  $contratos = ControladorContratistas::ctrMostrarContratosRangoFecha($fechaInicial, $fechaFinal);

  $arrayFechas = array();
  $arrayContratos = array();
  $sumaContratos = array();

  $i = 0;
  foreach ($contratos as $key => $value) {

    #Capturamos sólo el año y el mes
    $fecha = substr($value["fecha"],0,7);

    #Introducir las fechas en arrayFechas
    array_push($arrayFechas, $fecha);

    $i = $i + 1; 
  }

  $noRepetirFechas = array_unique($arrayFechas);


?>

<!--=============================================
=            Section comment block            =
=============================================-->

<div class="box box-solid bg-teal-gradient">
  
  <div class="box-header">
    
    <i class="fa fa-th"></i>

      <h3 class="box-title">Gráfica</h3>

  </div>

  <div class="box-body border-radius-none nuevoGraficoContratos">

    <div class="chart" id="line-chart-contratos" style="height: 250px;"></div>

  </div>

</div>

<script>
  
 var line = new Morris.Line({
    element          : 'line-chart-contratos',
    resize           : true,
    data             : [

    <?php

      if($noRepetirFechas != null){

        foreach($noRepetirFechas as $key){
          echo "{ y: '".$key."', contratos: ".$i." },";
        }

      echo "{y: '".$key."', contratos: ".$i." }";

      }else{

         echo "{ y: '0', contratos: '0' }";

      }

    ?>


    ],
    xkey             : 'y',
    ykeys            : ['Contratos'],
    labels           : ['Contratos'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    gridTextSize     : 10
  });

</script>



