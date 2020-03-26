<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Moto Speedys
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Moto Speedys</li>
    
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
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Identificación</th>
           <th>Telefono</th>
           <th>Correo</th>
           <th>Saldo</th>
           <th>Estado</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

           <?php

          $respuesta = ControladorSpeedys::ctrMostrarSpeedys();

          // var_dump($respuesta);

          $i = 0;

          for($f = 0; $f < count($respuesta["usuarios"]); $f++){

            if($respuesta["usuarios"][$f]["habilitadoMotoSpeedy"]){
              
              $i = $i + 1;
              echo ' <tr>
                <td>'.($i).'</td>
                <td>'.$respuesta["usuarios"][$f]["nombres"].'</td>
                <td>'.$respuesta["usuarios"][$f]["identificacion"].'</td>
                <td>'.$respuesta["usuarios"][$f]["telefono"].'</td>
                <td>'.$respuesta["usuarios"][$f]["email"].'</td>
                <td>$ '.number_format($respuesta["usuarios"][$f]["saldoMotoSpeedy"],2).'</td>';

                // if ($respuesta["usuarios"][$f]["motoSpeedySolicitud"] == "PENDIENTE") {
                  
                // echo '<td><button class="btn btn-warning btn-xs btnActivar" identificacion="'.$respuesta["usuarios"][$f]["identificacion"].'" placa="'.$respuesta["usuarios"][$f]["placaMoto"].'" cedulaPropi="'.$respuesta["usuarios"][$f]["cedulaPropietario"].'" estadoUsuario="1" cambiarUsuario="true">Pendiente</button></td>';

                // }else if ($respuesta["usuarios"][$f]["motoSpeedySolicitud"] == "RESUELTA") {

                   echo '<td><button class="btn btn-success btn-xs btnDesactivar" >Resuelta</button></td>';
         
                echo '<td>

                  <div class="btn-group">';

                if (isset($respuesta["usuarios"][$f]["placaMoto"])) {
                  
                    echo '<button class="btn btn-warning btnModalEditarMotoSpeedy" identificacion="'.$respuesta["usuarios"][$f]["identificacion"].'" nombres="'.$respuesta["usuarios"][$f]["nombres"].'" telefono="'.$respuesta["usuarios"][$f]["telefono"].'" email="'.$respuesta["usuarios"][$f]["email"].'" municipio="'.$respuesta["usuarios"][$f]["municipio"].'" password="'.$respuesta["usuarios"][$f]["password"].'" saldoMotoSpeedy="'.$respuesta["usuarios"][$f]["saldoMotoSpeedy"].'" placaMoto="'.$respuesta["usuarios"][$f]["placaMoto"].'" codigoLider="'.$respuesta["usuarios"][$f]["codigoLider"].'" codigoPasajero="'.$respuesta["usuarios"][$f]["codigoPasajero"].'" codigoTransportador="'.$respuesta["usuarios"][$f]["codigoTransportador"].'" codigo1="'.$respuesta["usuarios"][$f]["codigo1"].'" cambioUsuario="'.$respuesta["usuarios"][$f]["cambioUsuario"].'" habilitadoPasajero="'.$respuesta["usuarios"][$f]["habilitadoPasajero"].'" habilitadoLider="'.$respuesta["usuarios"][$f]["habilitadoLider"].'" saldoCarroSpeedy="'.$respuesta["usuarios"][$f]["saldoMotoCarroSpeedy"].'" placaCarro="'.$respuesta["usuarios"][$f]["placaCarro"].'" data-toggle="modal" data-target="#modalEditarMotoSpeedy"><i class="fa fa-pencil"></i></button>';

                }else{

                 echo '<button class="btn btn-warning btnModalEditarMotoSpeedy" identificacion="'.$respuesta["usuarios"][$f]["identificacion"].'" nombres="'.$respuesta["usuarios"][$f]["nombres"].'" telefono="'.$respuesta["usuarios"][$f]["telefono"].'" email="'.$respuesta["usuarios"][$f]["email"].'" municipio="'.$respuesta["usuarios"][$f]["municipio"].'" password="'.$respuesta["usuarios"][$f]["password"].'" saldoMotoSpeedy="'.$respuesta["usuarios"][$f]["saldoMotoSpeedy"].'" codigoLider="'.$respuesta["usuarios"][$f]["codigoLider"].'" codigoPasajero="'.$respuesta["usuarios"][$f]["codigoPasajero"].'" codigoTransportador="'.$respuesta["usuarios"][$f]["codigoTransportador"].'" codigo1="'.$respuesta["usuarios"][$f]["codigo1"].'" cambioUsuario="'.$respuesta["usuarios"][$f]["cambioUsuario"].'" habilitadoPasajero="'.$respuesta["usuarios"][$f]["habilitadoPasajero"].'" habilitadoLider="'.$respuesta["usuarios"][$f]["habilitadoLider"].'" saldoCarroSpeedy="'.$respuesta["usuarios"][$f]["saldoMotoCarroSpeedy"].'" data-toggle="modal" data-target="#modalEditarMotoSpeedy"><i class="fa fa-pencil"></i></button>';

                }
                    
                    echo
                    '<button class="btn btn-danger"  identificacion="'.$respuesta["usuarios"][$f]["identificacion"].'"><i class="fa fa-times"></i></button>

                  </div>  

                </td>

              </tr>';
            
            }
          }

        ?> 
          
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL EDITAR MotoSpeedy
======================================-->

<div id="modalEditarMotoSpeedy" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar MotoSpeedy</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input" name="editarNombreMotoSpeedy" id="editarNombreMotoSpeedy" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA IDENTIFICACION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input" name="editarIdentificacionMotoSpeedy" id="editarIdentificacionMotoSpeedy" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input" name="editarTelefonoMotoSpeedy" id="editarTelefonoMotoSpeedy" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input" name="editarEmailMotoSpeedy" id="editarEmailMotoSpeedy"  required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA  CONTRASEÑA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input" name="editarPasswordMotoSpeedy" id="editarPasswordMotoSpeedy" placeholder="Contraseña">

              </div>

            </div>

            <div class="form-group">
              
             <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-map"></i></span>

                  <select class="form-control input" style="width: 100%" name="editarMunicipioMotoSpeedy" id="municipio" required>

                    <option id="editarMunicipioMotoSpeedy">Seleccionar Municipios</option>

                    <option>BOGOTA</option>
                    <option>MEDELLIN</option>
                    <option>BUCARAMANGA</option>
                    <option>CALI</option>

                    <?php 

                      // $item = null;
                      // $valor = null;

                      // $municipios = ControladorSpeedys::ctrMostrarMunicipios($item, $valor);

                      // foreach ($municipios as $key => $value) {
                        
                      //   echo '<option value="'.$value["municipio"].'">'.$value["municipio"].'</option>';
                      // }

                    ?>

                  </select>
                
                </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-usd"></i></span> 

                <input type="number" class="form-control input" name="editarSaldoMotoSpeedy" id="editarSaldoMotoSpeedy">

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input" name="editarPlacaMotoSpeedy" id="editarPlacaMotoSpeedy">

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary" id="btnEditarMotoSpeedy">Editar MotoSpeedy</button>

        </div>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR MOTO
======================================-->

<div id="modalAgregarDocumentos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Documentos</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- ENTRADA PARA EL NOMBRE -->

             <div class="form-group row">

              <div class="col-xs-6">
              
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                  <input type="text" class="form-control input" name="nombreMotoSpeedy" id="nombreMotoSpeedy" readonly>

                </div>

              </div>

              <div class="col-xs-6">
              
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                  <input type="text" class="form-control input" name="idMotoSpeedy" id="idMotoSpeedy" readonly>

                </div>

              </div>

            </div>
            
            <div class="form-group row">

              <div class="col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                  <input type="text" class="form-control input" name="placaMoto" id="placaMoto" required>

                </div>

              </div>

              <div class="col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                  <input type="text" class="form-control input" name="cedulaPropietario" id="cedulaPropietario" required readonly>
                
                </div>

              </div>

            </div>

            <div class="form-group row">

              <div class="col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon">Municipio</span> 

                </div>

              </div>

              <div class="col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-map"></i></span>

                  <select class="form-control input" style="width: 100%" name="municipioAdministrador" id="municipio" required>

                    <option id="municipioPrestacionServicio">Seleccionar Municipios</option>

                    <?php 

                      $item = null;
                      $valor = null;

                      $municipios = ControladorSpeedys::ctrMostrarMunicipios($item, $valor);

                      foreach ($municipios as $key => $value) {
                        
                        echo '<option value="'.$value["municipio"].'">'.$value["municipio"].'</option>';
                      }

                    ?>

                  </select>
                
                </div>

              </div>

            </div>

            <div class="form-group row">

              <div class="col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon">Saldo Disponible</span> 

                </div>

              </div>

              <div class="col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-usd"></i></span> 

                  <input type="text" class="form-control input" name="saldoDisponible" id="saldoDisponible" required>
                
                </div>

              </div>

            </div>



            <!-- ENTRADA PARA CHECKEAR LOS DOCUMENTOS DEL MOTOSPEEDY-->

            <div class="form-group row" style="text-align: center; margin-top: 10px">

              <h4><b>Relaciones los documentos con los que cuenta el MotoSpeedy</b></h4>
            </div>
              
            <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">SOAT</span>
                </div>
                <input type="checkbox" value="SI" name="soat" id="soat"> 
              </div>
            </span>

            <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">FECHA VIGENCIA DEL SOAT</span>
                </div>
                <div class="col-xs-6">
                  <input type="date" style="text-align: center; margin-top: -8px" class="form-control input border border-light" name="fechaVigencia" id="fechaVigencia" placeholder="Ingresar la fecha de vigencia del SOAT" data-inputmask="'alias': 'dd/mm/yy'" data-mask required>
                </div>
              </div>
            </span>

            <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">TARJETA</span>
                </div>
                <div class="col-xs-6">
                  <input type="checkbox" value="SI" name="tarjeta" id="tarjeta"> 
                </div>
              </div>
            </span>

            <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">LICENCIA</span>
                </div>
                <div class="col-xs-6">
                  <input type="checkbox" value="SI" name="licencia" id="licencia">
                </div>
              </div>
            </span>

            <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">FOTO MOTO</span>
                </div>
                <div class="col-xs-6">
                  <input type="checkbox" value="SI" name="fotoMoto" id="fotoMoto">
                </div>
              </div>
            </span>

            <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">TECNOMECANICA</span>
                </div>
                <div class="col-xs-6">
                  <input type="checkbox" value="SI" name="tecnomecanica" id="tecnomecanica">
                </div>
              </div>
            </span>

          </div>
        
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="reset" class="btn btn-primary" id="btnGuardarDocumento">Activar MotoSpeedy</button>

        </div>

      </form>

    </div>

  </div>

</div>