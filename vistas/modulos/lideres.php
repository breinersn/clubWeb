<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Lideres
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Lideres</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

      <div class="col-lg-7 col-xs-12">
        
        <div class="box box-success">

          <div class="box-header with-border">
      
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLider">
              
              Agregar Lideres

            </button>

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
               <th>Codigo</th>
               <th>Usuarios</th>
               <th>Acciones</th>

             </tr> 

            </thead>

            <tbody>

            <?php

              $respuesta = ControladorSpeedys::ctrMostrarSpeedys();

              //var_dump($respuesta["usuarios"]);

              for($f = 0; $f < count($respuesta["usuarios"]); $f++){

                if($respuesta["usuarios"][$f]["habilitadoLider"]){
               
                  echo ' <tr>
                  <td>'.($f+1).'</td>
                  <td>'.$respuesta["usuarios"][$f]["nombres"].'</td>
                  <td>'.$respuesta["usuarios"][$f]["identificacion"].'</td>
                  <td>'.$respuesta["usuarios"][$f]["telefono"].'</td>
                  <td>'.$respuesta["usuarios"][$f]["email"].'</td>
                  <td>'.$respuesta["usuarios"][$f]["password"].'</td>
                  <td>'.$respuesta["usuarios"][$f]["codigoLider"].'</td>
                  <td><button class="btn btn-success btn-s btnVerUsuarios" codigo="'.$respuesta["usuarios"][$f]["codigoLider"].'" nombres="'.$respuesta["usuarios"][$f]["nombres"].'"><i class="fa fa-users"></i></button></td>';
                   
                        
                  echo '<td>

                    <div class="btn-group">

                      <button class="btn btn-warning btnModalEditarLider" identificacion="'.$respuesta["usuarios"][$f]["identificacion"].'" nombres="'.$respuesta["usuarios"][$f]["nombres"].'" telefono="'.$respuesta["usuarios"][$f]["telefono"].'" email="'.$respuesta["usuarios"][$f]["email"].'" municipio="'.$respuesta["usuarios"][$f]["municipio"].'" password="'.$respuesta["usuarios"][$f]["password"].'" data-toggle="modal" data-target="#modalEditarLider"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>

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

      </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-warning">

          <div class="box-header with-border">
      
            <h4>
              
              Usuarios Vinculados Al Lider

            </h4>

          </div>

          <div class="box-header with-border"></div>

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive tablas">
              
              <thead>

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

              </thead>

              <tbody>

                <?php

                  $respuesta = ControladorUsuariosGenerles::ctrMostrarUsuariosGenerles();

                  //var_dump($respuesta);

                  for($f = 0; $f < count($respuesta["usuarios"]); $f++){

                    if (isset($_GET["codigoLider"]) || !empty($_GET["codigoLider"])) {

                      $item = $respuesta["usuarios"][$f]["codigo1"];
                      $valor = $_GET["codigoLider"];


                    }else{

                      $item = 1;
                      $valor = 2;

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

                        <div class="btn-group">

                          <button class="btn btn-warning btnModalEditarPasajero" identificacion="'.$respuesta["usuarios"][$f]["identificacion"].'" nombres="'.$respuesta["usuarios"][$f]["nombres"].'" telefono="'.$respuesta["usuarios"][$f]["telefono"].'" email="'.$respuesta["usuarios"][$f]["email"].'" municipio="'.$respuesta["usuarios"][$f]["municipio"].'" password="'.$respuesta["usuarios"][$f]["password"].'" data-toggle="modal" data-target="#modalEditarPasajero"><i class="fa fa-pencil"></i></button>

                          <button class="btn btn-danger btnEliminarPasajero" email="'.$respuesta["usuarios"][$f]["email"].'"><i class="fa fa-times"></i></button>

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

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CONTRATISTA
======================================-->

<div id="modalAgregarLider" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" action="" >

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Líder</h4>

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

                <input type="text" class="form-control input" name="nombreLider" id="nombreLider" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA IDENTIFICACION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input" name="identificacionLider" id="identificacionLider" placeholder="Ingresar Identificación" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL TELEFONO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input" name="telefonoLider" id="telefonoLider" placeholder="Ingresar Telefono" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input" name="emailLider" id="emailLider" placeholder="Ingresar Correo" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA ONTRASEÑA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input" name="contraseñaLider" id="contraseñaLider" placeholder="Contraseña" required>

              </div>

            </div>

            <!-- SELECCIONAR MUNICIPIO -->

            <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-map"></i></span>

                  <select class="form-control select2" style="width: 100%" name="municipioLider" id="municipioLider" required>

                    <option>Seleccionar Municipios</option>
                    <option>BOGOTA</option>
                    <option>MEDELLIN</option>
                    <option>BUCARAMANGA</option>
                    <option>CALI</option>
                    <option>TURBACO</option>

                    <!-- <?php 

                      $item = null;
                      $valor = null;

                      $municipios = ControladorSpeedys::ctrMostrarMunicipios($item, $valor);

                      foreach ($municipios as $key => $value) {
                        
                        echo '<option value="'.$value["municipio"].'">'.$value["municipio"].'</option>';
                      }

                    ?> -->

                  </select>
                
                </div>

              </div>
              
               <!-- ENTRADA PARA FECHA Y HORA -->
            
            <div class="form-group row">

              <div class="col-xs-12">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                  <input type="text" class="form-control input-sm" name="codigoLider" id="codigoLider" required placeholder="Codigo Lider">

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

          <button type="button" class="btn btn-primary" onclick="guardarLider()">Guardar Lider</button>

        </div>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR LIDER
======================================-->

<div id="modalEditarLider" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Lider</h4>

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

                <input type="text" class="form-control input" name="editarNombreLider" id="editarNombreLider" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA IDENTIFICACION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input" name="editarIdentificacionLider" id="editarIdentificacionLider" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input" name="editarTelefonoLider" id="editarTelefonoLider" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input" name="editarEmailLider" id="editarEmailLider"  required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA  CONTRASEÑA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input" name="editarPasswordLider" id="editarPasswordLider" placeholder="Contraseña">

              </div>

            </div>

            <div class="form-group">
              
             <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-map"></i></span>

                  <select class="form-control input" style="width: 100%" name="editarMunicipioLider" id="municipio" required>

                    <option id="editarMunicipioLider">Seleccionar Municipios</option>

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

            <!-- <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">SOAT</span>
                </div>
                <div class="col-xs-6">
                  <input type="checkbox" value="SI" name="habilitado" id="habilitado">
                </div> 
              </div>
            </span> -->

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary" id="btnEditarLider">Editar Lider</button>

        </div>

      </form>

    </div>

  </div>

</div>




