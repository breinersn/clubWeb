/*==============================================
 =            EDITAR MotoSpeedy           =
 ==============================================*/
 
 //Editar registros

$(".tablas").on("click", ".btnModalEditarMotoSpeedy", function(){

  var nombres = $(this).attr("nombres");
  var telefono = $(this).attr("telefono");
  var email = $(this).attr("email");
  var identificacion = $(this).attr("identificacion");
  var password = $(this).attr("password");
  var municipio = $(this).attr("municipio");
  var saldoMotoSpeedy = $(this).attr("saldoMotoSpeedy");
  var placaMoto = $(this).attr("placaMoto");
  var codigoLider= $(this).attr("codigoLider");
  var codigoPasajero = $(this).attr("codigoPasajero");
  var codigoTransportador = $(this).attr("codigoTransportador");
  var codigo1 = $(this).attr("codigo1");
  var cambioUsuario = $(this).attr("cambioUsuario");
  var habilitadoPasajero = $(this).attr("habilitadoPasajero");
  var habilitadoLider = $(this).attr("habilitadoLider");
  var habilitado = $(this).attr("habilitado");;
  var saldoCarroSpeedy = $(this).attr("saldoCarroSpeedy");
  var placaCarro = $(this).attr("placaCarro");
  var habilitadoCarroSpeedy = $(this).attr("habilitadoCarroSpeedy");
  var habilitadoMotoSpeedy = $(this).attr("habilitadoMotoSpeedy");

  $("#editarNombreMotoSpeedy").val(nombres);
  $("#editarTelefonoMotoSpeedy").val(telefono);
  $("#editarEmailMotoSpeedy").val(email);
  $("#editarIdentificacionMotoSpeedy").val(identificacion);
  $("#editarPasswordMotoSpeedy").val(password);
  $("#editarMunicipioMotoSpeedy").val(municipio);
  $("#editarMunicipioMotoSpeedy").html(municipio);
  $("#editarSaldoMotoSpeedy").val(saldoMotoSpeedy);
  $("#editarPlacaMotoSpeedy").val(placaMoto);


  $("#btnEditarMotoSpeedy").click(function(event) {

    var nombres = document.getElementById('editarNombreMotoSpeedy').value;
    var telefono = document.getElementById('editarTelefonoMotoSpeedy').value;
    var email = document.getElementById('editarEmailMotoSpeedy').value;
    var identi = document.getElementById('editarIdentificacionMotoSpeedy').value;
    var password = document.getElementById('editarPasswordMotoSpeedy').value;
    var municipio = document.getElementById('municipio').value;
    var saldoMotoSpeedy = document.getElementById('editarSaldoMotoSpeedy').value;
    var placaMoto = document.getElementById('editarPlacaMotoSpeedy').value;

    console.log("nombres", nombres);
    console.log("telefono", telefono);
    console.log("email", email);
    console.log("identi", identi);
    console.log("password", password);
    console.log("municipio", municipio);
    console.log("saldoMotoSpeedy", saldoMotoSpeedy);

    $.ajax({
      url: 'https://us-central1-clubspeedy-dev.cloudfunctions.net/api/editWeb',
      method: 'POST',
      async: true,
      accept: "application/json",
      crossDomain: true,
      dataType: 'json',
       data: {
        identificacion: identi,
        nombres : nombres,
        telefono: telefono,
        email: email,
        password: password,
        municipio: municipio,
        saldoMotoSpeedy: saldoMotoSpeedy,
        placaMoto: placaMoto,
        codigoLider: codigoLider,
        codigoPasajero: codigoPasajero,
        codigoTransportador: codigoTransportador,
        codigo1: codigo1,
        habilitado: habilitado,
        cambioUsuario: cambioUsuario,
        habilitadoPasajero: habilitadoPasajero,
        habilitadoLider: false,
        saldoMotoCarroSpeedy: saldoCarroSpeedy,
        placaCarro: placaCarro
        }
    }).done(function(ok) {

      swal({

        type: "success",
        title: ok.message,
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        closeOnconfirm: false
        }).then((result) =>{
          if(result.value){
        
          window.location = "speedys";

          }

        })

    }).fail(function(ok){

      swal({

        type: "error",
        title: ok.message,
        closeOnconfirm: false
        })
      console.log("error: ", ok);
    })

  });
 });

 
 /*=====  End of EDITAR MotoSpeedy  ======*/