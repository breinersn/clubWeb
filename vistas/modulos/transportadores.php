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
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          
          Agregar Transportador

        </button>

         <button type="button" class="btn btn-default pull-right" id="daterange-btn">

          <?php

            if (isset($_GET["fechaInicial"])) {

              echo '<input type="text" style="text-align: center" class="form-control input" name="fechaInicial" id="fechaInicial" value="'.$_GET["fechaInicial"].'">
              <input type="text" style="text-align: center" class="form-control input" name="fechaFinal" id="fechaFinal" value="'.$_GET["fechaFinal"].'">';

            }

          ?>
            
            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

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
           <th>Codigo Lider</th>
           <th>Codigo Transportador</th>
           <th>Saldo</th>
           <th>Estado</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

          <?php

          $respuesta = ControladorSpeedys::ctrMostrarSpeedys();

          // var_dump($respuesta["usuarios"][109]);

          $i = 0;

          for($f = 0; $f < count($respuesta["usuarios"]); $f++){

            if($respuesta["usuarios"][$f]["habilitadoTransportador"]){
              
              $i = $i + 1;
              echo ' <tr>
                <td>'.($i).'</td>
                <td>'.$respuesta["usuarios"][$f]["nombres"].'</td>
                <td>'.$respuesta["usuarios"][$f]["identificacion"].'</td>
                <td>'.$respuesta["usuarios"][$f]["telefono"].'</td>
                <td>'.$respuesta["usuarios"][$f]["email"].'</td>
                <td>'.$respuesta["usuarios"][$f]["codigo1"].'</td>
                <td>'.$respuesta["usuarios"][$f]["codigoTransportador"].'</td>
                <td>$ '.number_format($respuesta["usuarios"][$f]["saldoMotoSpeedy"],2).'</td>';

                   echo '<td><button class="btn btn-success btn-xs btnDesactivar" >Resuelta</button></td>';
                      
                echo '<td>

                  <div class="btn-group">';

                  if (isset($respuesta["usuarios"][$f]["placaMoto"])) {
                    
                    echo '<button class="btn btn-warning btnModalEditarTransportador" identificacion="'.$respuesta["usuarios"][$f]["identificacion"].'" nombres="'.$respuesta["usuarios"][$f]["nombres"].'" telefono="'.$respuesta["usuarios"][$f]["telefono"].'" email="'.$respuesta["usuarios"][$f]["email"].'" municipio="'.$respuesta["usuarios"][$f]["municipio"].'" password="'.$respuesta["usuarios"][$f]["password"].'" saldoMotoSpeedy="'.$respuesta["usuarios"][$f]["saldoMotoSpeedy"].'" placaMoto="'.$respuesta["usuarios"][$f]["placaMoto"].'" codigoLider="'.$respuesta["usuarios"][$f]["codigoLider"].'" codigoPasajero="'.$respuesta["usuarios"][$f]["codigoPasajero"].'" codigoTransportador="'.$respuesta["usuarios"][$f]["codigoTransportador"].'" codigo1="'.$respuesta["usuarios"][$f]["codigo1"].'" cambioUsuario="'.$respuesta["usuarios"][$f]["cambioUsuario"].'" habilitadoPasajero="'.$respuesta["usuarios"][$f]["habilitadoPasajero"].'" habilitadoLider="'.$respuesta["usuarios"][$f]["habilitadoLider"].'" habilitadoTransportador="'.$respuesta["usuarios"][$f]["habilitadoTransportador"].'" habilitado="'.$respuesta["usuarios"][$f]["habilitado"].'" saldoCarroSpeedy="'.$respuesta["usuarios"][$f]["saldoMotoCarroSpeedy"].'" placaCarro="'.$respuesta["usuarios"][$f]["placaCarro"].'" habilitadoCarroSpeedy="'.$respuesta["usuarios"][$f]["habilitadoCarroSpeedy"].'" habilitadoMotoSpeedy="'.$respuesta["usuarios"][$f]["habilitadoMotoSpeedy"].'" habilitadoLider="'.$respuesta["usuarios"][$f]["habilitadoLider"].'" data-toggle="modal" data-target="#modalEditarTransportador"><i class="fa fa-pencil"></i></button>';

                  }else{

                    echo '<button class="btn btn-warning btnModalEditarTransportador" identificacion="'.$respuesta["usuarios"][$f]["identificacion"].'" nombres="'.$respuesta["usuarios"][$f]["nombres"].'" telefono="'.$respuesta["usuarios"][$f]["telefono"].'" email="'.$respuesta["usuarios"][$f]["email"].'" municipio="'.$respuesta["usuarios"][$f]["municipio"].'" password="'.$respuesta["usuarios"][$f]["password"].'" saldo="'.$respuesta["usuarios"][$f]["saldoMotoSpeedy"].'" codigoLider="'.$respuesta["usuarios"][$f]["codigoLider"].'" codigoPasajero="'.$respuesta["usuarios"][$f]["codigoPasajero"].'" codigoTransportador="'.$respuesta["usuarios"][$f]["codigoTransportador"].'" codigo1="'.$respuesta["usuarios"][$f]["codigo1"].'" cambioUsuario="'.$respuesta["usuarios"][$f]["cambioUsuario"].'" habilitadoPasajero="'.$respuesta["usuarios"][$f]["habilitadoPasajero"].'" habilitadoLider="'.$respuesta["usuarios"][$f]["habilitadoLider"].'" saldoCarroSpeedy="'.$respuesta["usuarios"][$f]["saldoMotoCarroSpeedy"].'" habilitadoTransportador="'.$respuesta["usuarios"][$f]["habilitadoTransportador"].'" habilitadoCarroSpeedy="'.$respuesta["usuarios"][$f]["habilitadoCarroSpeedy"].'" habilitadoMotoSpeedy="'.$respuesta["usuarios"][$f]["habilitadoMotoSpeedy"].'" data-toggle="modal" data-target="#modalEditarTransportador"><i class="fa fa-pencil"></i></button>';
                  }

                    echo '<button class="btn btn-success btnTotalComision" email="'.$respuesta["usuarios"][$f]["email"].'"><i class="fa fa-money"></i></button>
                    <button class="btn btn-primary btnVerPagos" email="'.$respuesta["usuarios"][$f]["email"].'" nombres="'.$respuesta["usuarios"][$f]["nombres"].'"><i class="fa fa-usd"></i></button>

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
MODAL AGREGAR TRANSPORTADOR
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

          <h4 class="modal-title">Agregar Transportador</h4>

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

                <input type="hidden" class="form-control input" name="nuevoSpeedy" id="nuevoSpeedy" placeholder="Ingresar nombre" required>

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

            <!-- SELECCIONAR MUNICIPIO -->

            <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-map"></i></span>

                  <select class="form-control select2" style="width: 100%" name="nuevoMunicipio" id="nuevoMunicipio" required>

                    <option>Seleccionar Municipios</option>

                    <option>Seleccionar Municipios</option>
                    <option>BOGOTA</option>
                    <option>MEDELLIN</option>
                    <option>BUCARAMANGA</option>
                    <option>CALI</option>
                    <option>TURBACO</option>

                    <!-- <?php 

                      // $item = null;
                      // $valor = null;

                      // $municipios = ControladorSpeedys::ctrMostrarMunicipios($item, $valor);

                      // foreach ($municipios as $key => $value) {
                        
                      //   echo '<option value="'.$value["municipio"].'">'.$value["municipio"].'</option>';
                      // }

                    ?> -->

                  </select>
                
                </div>

              </div>
              
               <!-- ENTRADA PARA FECHA Y HORA -->
            
            <div class="form-group row">

              <div class="col-xs-12">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                  <input type="text" class="form-control input-sm" name="codigo1" id="codigo1" required placeholder="Codigo Lider">

                </div>

              </div>

            </div>

             <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">Habilitar Como MotoSpeedy</span>
                </div>
                <input type="checkbox" class="minimal" name="moto" id="moto"> 
              </div>
            </span>

            <div class="placaMoto"></div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input" name="nuevaPlacaMotoSpeedy" id="nuevaPlacaMotoSpeedy" placeholder="Placa Moto">

              </div>

            </div>

            <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">Habilitar Como CarroSpeedy</span>
                </div>
                <input type="checkbox" class="minimal" name="carro" id="carro"> 
              </div>
            </span>

            <div class="form-group">

              <div class="col-xs-6">

                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                  <input type="text" class="form-control input" name="nuevaPlacaCarroSpeedy" id="nuevaPlacaCarroSpeedy" placeholder="Placa Carro">

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

          <button type="button" class="btn btn-primary" onclick="guardarTransportador()">Guardar MotoSpeedy</button>

        </div>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TRANSPORTADOR
======================================-->

<div id="modalEditarTransportador" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Transportador</h4>

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

                <input type="text" class="form-control input" name="editarNombreTransportador" id="editarNombreTransportador" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA IDENTIFICACION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input" name="editarIdentificacionTransportador" id="editarIdentificacionTransportador" required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input" name="editarTelefonoTransportador" id="editarTelefonoTransportador" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input" name="editarEmailTransportador" id="editarEmailTransportador"  required readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA  CONTRASEÑA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input" name="editarPasswordTransportador" id="editarPasswordTransportador" placeholder="Contraseña">

              </div>

            </div>

            <div class="form-group">
              
             <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-map"></i></span>

                  <select class="form-control input" style="width: 100%" name="editarMunicipioTransportador" id="municipio" required>

                    <option id="editarMunicipioTransportador">Seleccionar Municipios</option>

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

             <!-- ENTRADA PARA FECHA Y HORA -->
            
            <div class="form-group row">

              <div class="col-xs-12">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                  <input type="text" class="form-control input-sm" name="editarCodigoLider" id="editarCodigoLider" required>

                </div>

              </div>

            </div>

             <span>
              <div class="form-group row" style="text-align: center;">
                <div class="col-xs-6">
                  <span class="input-group">Habilitar Como MotoSpeedy</span>
                </div>
                <div class="col-xs-6">
                  <input type="checkbox" name="editarMoto" id="editarMoto">
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

          <button type="button" class="btn btn-primary" id="btnEditarTransportador">Editar Transportador</button>

        </div>

      </form>

    </div>

  </div>

</div>



<div id="modalAgregarComision" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ingresar Comision</h4>

        </div>

        <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"></span>

                  <div id="emailComision" style="text-align: center; font-size: 18px;">
              
                    <span>
                      
                    </span>

                  </div>
                
              </div>

            </div>

            <!-- ENTRADA PARA LA IDENTIFICACION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-usd"></i></span> 

                <input type="text" class="form-control input" name="pagoComision" id="pagoComision" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input" name="fechaComision" id="fechaComision" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <select class="form-control select2" style="width: 100%" name="tipoTransportador" id="tipoTransportador" required>
                  
                  <option>Seleccione a que vehiculo va dirigido la comision</option>
                  <option value="Moto">Moto</option>
                  <option value="Carro">Carro</option>

                </select>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary" onclick="btnGuardarPago()">Relacionar pago</button>

        </div>

      </form>

    </div>

  </div>

</div>

<script type="text/javascript">
  
  $(".tablas").on("click", ".btnVerPagos", function(){

    var email = $(this).attr("email");
    var nombres = $(this).attr("nombres");

    localStorage.setItem("email", email);

    $("#emailTransportador").val(email);
    $("#modalVerPagos").modal();
    
  });

</script>

<!--=====================================
      MODAL VER PAGOS
======================================-->

<div id="modalVerPagos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ingresar Comision</h4>

        </div>

        <input type="text" name="emailTransportador" id="emailTransportador">

        <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
        
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

              echo "<script>
                var email = document.getElementById('emailTransportador').value;
                console.log('email', email);
              </script>";
              

              $respuesta = ControladorSpeedys::ctrMostrarSpeedys();

              // var_dump($respuesta);

              $i = 1;

              for($f = 0; $f < count($respuesta["usuarios"]); $f++){

                if (isset($_POST["email"]) || !empty($_POST["email"])) {

                  $item = $respuesta["usuarios"][$f]["email"];
                  $valor = $_POST["email"];

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

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary" onclick="btnGuardarPago()">Relacionar pago</button>

        </div>

      </form>

    </div>

  </div>

</div>