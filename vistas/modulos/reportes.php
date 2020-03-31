<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Solicitudes Eliminadas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Solicitudes Eliminadas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          
          Agregar Moto Speedys

        </button> -->

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas tabla_solicitudes_eliminadas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Tipo</th>
           <th>Municipio</th>
           <th>Destino</th>
           <th>Origen</th>
           <th>Pasajero</th>
           <th>Estado</th>
           <th>Acciones</th> 

         </tr> 

        </thead>

         <tbody>

          <?php

          $respuesta = ControladorSolicitudes::ctrMostrarSolicitudesEliminadas();

          var_dump($respuesta["solicitudeseliminadas"][0]["tipo"]);

          $i = 0;

          for($f = 0; $f < count($respuesta["solicitudeseliminadas"]); $f++){
              
            $i = $i + 1;
            echo ' <tr>
              <td>'.($i).'</td>
              <td>'.$respuesta["solicitudeseliminadas"][$f]["tipo"].'</td>
              <td>'.$respuesta["solicitudeseliminadas"][$f]["municipio"].'</td>
              <td>'.$respuesta["solicitudeseliminadas"][$f]["descripcionDestino"].'</td>
              <td>'.$respuesta["solicitudeseliminadas"][$f]["descripcionOrigen"].'</td>
              <td>'.$respuesta["solicitudeseliminadas"][$f]["estado"].'</td>
              <td>'.$respuesta["solicitudeseliminadas"][$f]["municipio"].'</td>
              <td>

                <div class="btn-group">

                  <button class="btn btn-success btnTotalComision" emailPasajero="'.$respuesta["solicitudeseliminadas"][$f]["emailPasajero"].'"><i class="fa fa-money"></i></button>
                  <button class="btn btn-primary btnVerPagos" emailPasajero="'.$respuesta["solicitudeseliminadas"][$f]["emailPasajero"].'" ><i class="fa fa-usd"></i></button>
                  <button class="btn btn-danger btnEliminarUsuario" emailPasajero="'.$respuesta["solicitudeseliminadas"][$f]["emailPasajero"].'"><i class="fa fa-times"></i></button>

                </div>  

              </td>

            </tr>';
          
          }

        ?> 
          
        </tbody>

       
       </table>

      </div>

    </div>

  </section>

</div>


<script type="text/javascript">
  
  /*========================================================
=            Cargada Automatica del DataTable            =
========================================================*/

$(document).ready(function(){

  $('.tabla_solicitudes_eliminada').dataTable().fnDestroy();

  tabla = $('.tabla_solicitudes_eliminada').DataTable( {
      "ajax": {
        'method':'get',
        "url": "https://us-central1-clubspeedy-dev.cloudfunctions.net/api/getSolicitudesEliminadas",
      },
      "columns": [
        { "data": "tipo" },
        { "data": "municipio" },
        { "data": "descripcionDestino" },
        { "data": "descripcionOrigen" },
        { "data": "nombrePasajero" },
        { "data": "estado" },
        { render: (data, type, row) => {
          return `<div class="btn-group">
                    <button class="btn btn-warning btn-sm btnModalActualizarServicio" data-toggle="modal" data-target="#modalActualizarSolicitud">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-primary btn-sm btnCargarTecnicos" data-toggle="modal" data-target="#modalListaTecnicos">
                      <i class="fa fa-ship"></i>
                    </button>
                    <button class="btn btn-info btn-sm btnCargarUsuarios" data-toggle="modal" data-target="#modalListaUsuarios">
                      <i class="fa fa-users"></i>
                    </button>
                    <button class="btn btn-success btn-sm btnCargarActivos" data-toggle="modal" data-target="#modalListaActivos">
                      <i class="fa fa-desktop"></i>
                    </button>
                    <button class="btn btn-danger btn-sm btnEliminarSolicitud">
                      <i class="fa fa-times"></i>
                    </button>
                  </div>`;
                  }
        }
      ]
  });

});

/*=====  End of Cargada Automatica del DataTable  ======*/


</script>


