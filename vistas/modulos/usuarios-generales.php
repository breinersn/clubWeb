<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Usuarios</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          
          Agregar Usuarios

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
           <th>Contraseña</th>
           <th>Codigo Lider</th>
           <th>Codigo Usuario</th>
           <th>Baneado</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $respuesta = ControladorUsuariosGenerles::ctrMostrarUsuariosGenerles();

          //var_dump($respuesta);

          for($f = 0; $f < count($respuesta["usuarios"]); $f++){

            if (isset($_GET["codigoLider"]) || !empty($_GET["codigoLider"])) {

              $item = $respuesta["usuarios"][$f]["codigo1"];
              $valor = $_GET["codigoLider"];

              if ($item == $valor) {
                var_dump("Codigo Usuario: ", $item);
                echo "<br>";
                var_dump("Codigo Lider: ", $valor);
                echo "<br>";
              }
              

            }else{

              $item = 1;
              $valor = 1;

            }

            // print_r($item);
            // print_r($valor);

            if( $valor == $item){
           
              echo ' <tr>
              <td>'.($f+1).'</td>
              <td>'.$respuesta["usuarios"][$f]["nombres"].'</td>
              <td>'.$respuesta["usuarios"][$f]["identificacion"].'</td>
              <td>'.$respuesta["usuarios"][$f]["telefono"].'</td>
              <td>'.$respuesta["usuarios"][$f]["email"].'</td>
              <td>'.$respuesta["usuarios"][$f]["password"].'</td>
              <td>'.$respuesta["usuarios"][$f]["codigo1"].'</td>';

              if ($respuesta["usuarios"][$f]["habilitadoTransportador"]) {
                echo '<td>'.$respuesta["usuarios"][$f]["codigoTransportador"].'</td>';
              }else{
                echo '<td>'.$respuesta["usuarios"][$f]["codigoPasajero"].'</td>';
              }

              if ($respuesta["usuarios"][$f]["habilitado"] == true) {
                
              echo '<td><button class="btn btn-success btn-s btnBanear" identificacion="'.$respuesta["usuarios"][$f]["identificacion"].'" estadoUsuario=1>No</button></td>';

              }else{

                 echo '<td><button class="btn btn-danger btn-s btnBanear" identificacion="'.$respuesta["usuarios"][$f]["identificacion"].'" estadoUsuario=0>Si</button></td>';
              }
                    
              echo '<td>

                <div class="btn-group">';

                if (isset($respuesta["usuarios"][$f]["placaMoto"])) {

                  echo '<button class="btn btn-warning btnModalEditarPasajero" identificacion="'.$respuesta["usuarios"][$f]["identificacion"].'" nombres="'.$respuesta["usuarios"][$f]["nombres"].'" telefono="'.$respuesta["usuarios"][$f]["telefono"].'" email="'.$respuesta["usuarios"][$f]["email"].'" municipio="'.$respuesta["usuarios"][$f]["municipio"].'" password="'.$respuesta["usuarios"][$f]["password"].'" saldoMotoSpeedy="'.$respuesta["usuarios"][$f]["saldoMotoSpeedy"].'" placaMoto="'.$respuesta["usuarios"][$f]["placaMoto"].'" codigoLider="'.$respuesta["usuarios"][$f]["codigoLider"].'" codigoPasajero="'.$respuesta["usuarios"][$f]["codigoPasajero"].'" codigoTransportador="'.$respuesta["usuarios"][$f]["codigoTransportador"].'" codigo1="'.$respuesta["usuarios"][$f]["codigo1"].'" cambioUsuario="'.$respuesta["usuarios"][$f]["cambioUsuario"].'" habilitadoPasajero="'.$respuesta["usuarios"][$f]["habilitadoPasajero"].'" habilitadoLider="'.$respuesta["usuarios"][$f]["habilitadoLider"].'" habilitadoTransportador="'.$respuesta["usuarios"][$f]["habilitadoTransportador"].'" habilitado="'.$respuesta["usuarios"][$f]["habilitado"].'" saldoCarroSpeedy="'.$respuesta["usuarios"][$f]["saldoMotoCarroSpeedy"].'" placaCarro="'.$respuesta["usuarios"][$f]["placaCarro"].'" habilitadoCarroSpeedy="'.$respuesta["usuarios"][$f]["habilitadoCarroSpeedy"].'" habilitadoMotoSpeedy="'.$respuesta["usuarios"][$f]["habilitadoMotoSpeedy"].'" habilitadoLider="'.$respuesta["usuarios"][$f]["habilitadoLider"].'" data-toggle="modal" data-target="#modalEditarPasajero"><i class="fa fa-pencil"></i></button>';

                   }else{

                    echo '<button class="btn btn-warning btnModalEditarPasajero" identificacion="'.$respuesta["usuarios"][$f]["identificacion"].'" nombres="'.$respuesta["usuarios"][$f]["nombres"].'" telefono="'.$respuesta["usuarios"][$f]["telefono"].'" email="'.$respuesta["usuarios"][$f]["email"].'" municipio="'.$respuesta["usuarios"][$f]["municipio"].'" password="'.$respuesta["usuarios"][$f]["password"].'" saldo="'.$respuesta["usuarios"][$f]["saldoMotoSpeedy"].'" codigoLider="'.$respuesta["usuarios"][$f]["codigoLider"].'" codigoPasajero="'.$respuesta["usuarios"][$f]["codigoPasajero"].'" codigoTransportador="'.$respuesta["usuarios"][$f]["codigoTransportador"].'" codigo1="'.$respuesta["usuarios"][$f]["codigo1"].'" cambioUsuario="'.$respuesta["usuarios"][$f]["cambioUsuario"].'" habilitadoPasajero="'.$respuesta["usuarios"][$f]["habilitadoPasajero"].'" habilitadoLider="'.$respuesta["usuarios"][$f]["habilitadoLider"].'" saldoCarroSpeedy="'.$respuesta["usuarios"][$f]["saldoMotoCarroSpeedy"].'" habilitadoTransportador="'.$respuesta["usuarios"][$f]["habilitadoTransportador"].'" habilitadoCarroSpeedy="'.$respuesta["usuarios"][$f]["habilitadoCarroSpeedy"].'" habilitadoMotoSpeedy="'.$respuesta["usuarios"][$f]["habilitadoMotoSpeedy"].'" data-toggle="modal" data-target="#modalEditarPasajero"><i class="fa fa-pencil"></i></button>';
                  }

                    echo '<button class="btn btn-danger btnEliminarPasajero" email="'.$respuesta["usuarios"][$f]["email"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR CONTRATISTA
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" action="" >

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Usuario</h4>

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

                <input type="text" class="form-control input" name="nuevoNombres" id="nuevoNombres" placeholder="Ingresar Nombres" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL APELLIDO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input" name="nuevoApellidos" id="nuevoApellidos" placeholder="Ingresar Apellidos" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA IDENTIFICACION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input" name="nuevaIdentificacion" id="nuevaIdentificacion" placeholder="Ingresar Identificación" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL TELEFONO -->
 
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input" name="nuevoTelefono" id="nuevoTelefono" placeholder="Ingresar Telefono" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input" name="nuevoEmail" id="nuevoEmail" placeholder="Ingresar Correo" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA ONTRASEÑA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input" name="nuevaContraseña" id="nuevaContraseña" placeholder="Contraseña" required>

              </div>

            </div>
              
               <!-- ENTRADA PARA FECHA Y HORA -->
            
            <div class="form-group row">

              <div class="col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                  <input type="text" class="form-control input-sm" name="codigo1" id="codigo1" required placeholder="Codigo Lider">

                </div>

              </div>

              <div class="col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 

                  <input type="text" class="form-control input-sm" name="codigo2" id="codigo2" required placeholder="Codigo Pasajero">

                </div>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary" onclick="guardarUsuarioGeneral()">Guardar Usuario</button>

        </div>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR Pasajero
======================================-->

<div id="modalEditarPasajero" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Usuario</h4>

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

                <input type="text" class="form-control input" name="editarNombrePasajero" id="editarNombrePasajero" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA IDENTIFICACION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input" name="editarIdentificacionPasajero" id="editarIdentificacionPasajero" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input" name="editarTelefonoPasajero" id="editarTelefonoPasajero" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input" name="editarEmailPasajero" id="editarEmailPasajero"  required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA  CONTRASEÑA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input" name="editarPasswordPasajero" id="editarPasswordPasajero" placeholder="Contraseña">

              </div>

            </div>

            <div class="form-group">
              
             <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-map"></i></span>

                  <select class="form-control input" style="width: 100%" name="editarMunicipioPasajero" id="municipio" required>

                    <option id="editarMunicipioPasajero">Seleccionar Municipios</option>

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

            <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">Habilitar Como MotoSpeedy</span>
                </div>
                <div class="col-xs-6">
                  <input type="checkbox" name="editarMotoPasajero" id="editarMotoPasajero">
                </div> 
              </div>
            </span>

            <div class="form-group row">

              <div class="col-xs-6">
              
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                  <input type="text" class="form-control input" name="editarPlacaMotoSpeedy" id="editarPlacaMotoSpeedy" placeholder="Placa Moto">

                </div>

              </div>

              <div class="col-xs-6">
              
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-usd"></i></span> 

                  <input type="text" class="form-control input" name="editarSaldoMotoSpeedy" id="editarSaldoMotoSpeedy" placeholder="Saldo Carro">

                </div>

              </div>

            </div>

            <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">Habilitar Como CarroSpeedy</span>
                </div>
                <div class="col-xs-6">
                  <input type="checkbox" name="editarCarro" id="editarCarro">
                </div>
              </div>
            </span>

            <div class="form-group row">

              <div class="col-xs-6">
              
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                  <input type="text" class="form-control input" name="editarPlacaCarroSpeedy" id="editarPlacaCarroSpeedy" placeholder="Placa Carro">

                </div>

              </div>

              <div class="col-xs-6">
              
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-usd"></i></span> 

                  <input type="text" class="form-control input" name="editarSaldoCarroSpeedy" id="editarSaldoCarroSpeedy" placeholder="Saldo Carro">

                </div>

              </div>

            </div>


            <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">Habilitar Como Lider</span>
                </div>
                <div class="col-xs-6">
                  <input type="checkbox" name="editarLider" id="editarLider">
                </div>
              </div>
            </span>


            <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">Usuario Habilitado</span>
                </div>
                <div class="col-xs-6">
                  <input type="checkbox" name="habilitado" id="habilitado">
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

          <button type="button" class="btn btn-primary" id="btnEditarPasajero">Editar Usuario</button>

        </div>

      </form>

    </div>

  </div>

</div>