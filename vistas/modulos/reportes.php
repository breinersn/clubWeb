<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Transportadores
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Transportadores</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Comision</th>
           <th>Tipo</th>

         </tr> 

        </thead>

        <tbody>

          <?php

          date_default_timezone_set('America/Bogota');
          

          $respuesta = ControladorSpeedys::ctrMostrarSpeedys();

          // var_dump($respuesta);

          $i = 1;

          for($f = 0; $f < count($respuesta["usuarios"]); $f++){

            if (isset($_GET["email"]) || !empty($_GET["email"])) {

              $item = $respuesta["usuarios"][$f]["email"];
              $valor = $_GET["email"];

            }else{

              $item =2;
              $valor = 1;

            }

            if( $valor == $item){

              for ($j=0; $j <count($respuesta["usuarios"][$f]["pagoComisiones"]); $j++) {

                $fecha = date("d-m-Y", strtotime($respuesta["usuarios"][$f]["pagoComisiones"][$j]["fecha"])); 

                echo ' <tr>
                <td>'.($i).'</td>
                <td>'.$fecha.'</td>
                <td>$ '.number_format($respuesta["usuarios"][$f]["pagoComisiones"][$j]["comision"],2).'</td>
                <td>'.$respuesta["usuarios"][$f]["pagoComisiones"][$j]["tipo"].'</td>

              </tr>';

              }

              $i = $i + 1;          

            }
          }

        ?> 
          
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>
