<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Ver Carro Speedys
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Carro Speedys</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          
          Agregar Carro Speedys

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

         </tr> 

        </thead>

        <tbody>

           <?php

          $respuesta = ControladorSpeedys::ctrMostrarSpeedys();

          // var_dump($respuesta);

          $i = 0;

          for($f = 0; $f < count($respuesta["usuarios"]); $f++){

            if($respuesta["usuarios"][$f]["habilitadoCarroSpeedy"]){
              
              $i = $i + 1;
              echo ' <tr>
                <td>'.($i).'</td>
                <td>'.$respuesta["usuarios"][$f]["nombres"].'</td>
                <td>'.$respuesta["usuarios"][$f]["identificacion"].'</td>
                <td>'.$respuesta["usuarios"][$f]["telefono"].'</td>
                <td>'.$respuesta["usuarios"][$f]["email"].'</td>
                <td>$ '.number_format($respuesta["usuarios"][$f]["saldoMotoCarroSpeedy"],2).'</td> 

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
MODAL EDITAR CarroSpeedy
======================================-->

<div id="modalEditarCarroSpeedy" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar CarroSpeedy</h4>

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

                <input type="text" class="form-control input" name="editarNombreCarroSpeedy" id="editarNombreCarroSpeedy" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA IDENTIFICACION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input" name="editarIdentificacionCarroSpeedy" id="editarIdentificacionCarroSpeedy" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input" name="editarTelefonoCarroSpeedy" id="editarTelefonoCarroSpeedy" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input" name="editarEmailCarroSpeedy" id="editarEmailCarroSpeedy"  required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA  CONTRASEÑA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input" name="editarPasswordCarroSpeedy" id="editarPasswordCarroSpeedy" placeholder="Contraseña">

              </div>

            </div>

            <div class="form-group">
              
             <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-map"></i></span>

                  <select class="form-control input" style="width: 100%" name="editarMunicipioCarroSpeedy" id="municipio" required>

                    <option id="editarMunicipioCarroSpeedy">Seleccionar Municipios</option>

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


            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="number" class="form-control input" name="editarSaldoCarroSpeedy" id="editarSaldoCarroSpeedy">

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input" name="editarPlacaCarroSpeedy" id="editarPlacaCarroSpeedy">

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary" id="btnEditarCarroSpeedy">Editar CarroSpeedy</button>

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

                  <input type="text" class="form-control input" name="nombreCarroSpeedy" id="nombreCarroSpeedy" readonly>

                </div>

              </div>

              <div class="col-xs-6">
              
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                  <input type="text" class="form-control input" name="idCarroSpeedy" id="idCarroSpeedy" readonly>

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



            <!-- ENTRADA PARA CHECKEAR LOS DOCUMENTOS DEL CarroSPEEDY-->

            <div class="form-group row" style="text-align: center; margin-top: 10px">

              <h4><b>Relaciones los documentos con los que cuenta el CarroSpeedy</b></h4>
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

          <button type="reset" class="btn btn-primary" id="btnGuardarDocumento">Activar CarroSpeedy</button>

        </div>

      </form>

    </div>

  </div>

</div>