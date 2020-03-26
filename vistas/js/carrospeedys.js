/*=============================================
=            GUARDAR LIDER           =
=============================================*/

function guardarTransportadorCarro() {

  var nombres = document.getElementById('nuevoSpeedy').value;
  var identificacion = document.getElementById('nuevaIdentificacion').value;
  var telefono = document.getElementById('nuevoTelefono').value;
  var email = document.getElementById('nuevoEmail').value;
  var contraseña = document.getElementById('nuevaContraseña').value;
  var codigoTransportador = document.getElementById('codigoTransportador').value;
  var codigo1 = document.getElementById('codigo1').value;
  var municipio = document.getElementById('nuevoMunicipio').value;

  

    $.ajax({
      url: 'https://us-central1-clubspeedy-dev.cloudfunctions.net/api/crearUsuario',
      method: 'POST',
      async: true,
      accept: "application/json",
      crossDomain: true,
      dataType: 'json',
      headers: {
        'Authorization':'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c3VhcmlvIjp7InBhc3N3b3JkQ29tcHJvYmFjaW9uIjoiMTIzNDU2Iiwibm9tYnJlcyI6IkRhdmlkIFBlcmVpcmEiLCJoaXN0b3JpY29QYXNhamVybyI6W10sImF2YXRhciI6MTA0NzM5NDIyNSwicGxhY2FNb3RvIjoiIiwicm9sIjoiVVNFUiIsImNlZHVsYVByb3BpZXRhcmlvIjoiIiwibW90b1NwZWVkeVNvbGljaXR1ZCI6IiIsInBhc3N3b3JkIjoiOikiLCJ0aXBvU2VydmljaW8iOiIiLCJ2YWxvckNvbmJ1c3RpYmxlRGlhcmlvIjowLCJtZW5zYWplU2Vydmlkb3IiOlt7InZpc3RvIjpmYWxzZSwiaWQiOiIxNTc2NjgxNDk2OTE4IiwibWVzc2FnZSI6IkJpZW52ZW5pZG8gYSBTcGVlZHkifV0sImhpc3Rvcmljb01vdG9TcGVlZHkiOltdLCJlbWFpbCI6ImRhdmd1aTI0MjAxMUBnbWFpbC5jb20iLCJjYW1iaWFyVXN1YXJpbyI6ZmFsc2UsInVsdGltb0xvZ2luIjoiIiwiaWQiOjE1NzY2ODE0OTY5MTgsInRlbGVmb25vIjozMjI3Mzg3ODY3LCJzYWxkb0Rpc3BvbmlibGUiOjAsImlkZW50aWRhZCI6MTA0NzM5NDIyNSwiaGFiaWxpdGFkb01vdG9TcGVlZHkiOmZhbHNlLCJ2YWxvckNhcnJlcmFEaWFyaW8iOjAsImhhYmlsaXRhZG9BcHAiOnRydWV9LCJpYXQiOjE1NzY2ODE1NTEsImV4cCI6MTU4MjcyOTU1MX0.3Po5PWBZ5bBPyXsZI3kHAFdZEt9TW12ZucLAWmoojUs'
      },
       data: {
        password: contraseña,
        nombres : nombres,
        email: email,
        identificacion: identificacion,
        telefono: telefono,
        codigo1: codigo1,
        codigoTransportador: codigoTransportador,
        municipio: municipio,
        habilitadoTransportador: true,
        habilitadoCarroSpeedy: true
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

console.log("ok", ok);
        })

    }).fail(function(ok){

      swal({

        type: "error",
        title: ok.responseJSON.error,
        closeOnconfirm: false
        })
      console.log("error: ", ok.responseJSON.error);
    })
 };


/*=====  End of GUARDAR LIDER ======*/

 /*==============================================
 =            EDITAR CarroSpeedy           =
 ==============================================*/
 
 //Editar registros

$(".tablas").on("click", ".btnModalEditarCarroSpeedy", function(){

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

  $("#editarNombreCarroSpeedy").val(nombres);
  $("#editarTelefonoCarroSpeedy").val(telefono);
  $("#editarEmailCarroSpeedy").val(email);
  $("#editarIdentificacionCarroSpeedy").val(identificacion);
  $("#editarPasswordCarroSpeedy").val(password);
  $("#editarMunicipioCarroSpeedy").val(municipio);
  $("#editarMunicipioCarroSpeedy").html(municipio);
  $("#editarSaldoCarroSpeedy").val(saldoCarroSpeedy);
  $("#editarPlacaCarroSpeedy").val(placaCarro);


  $("#btnEditarCarroSpeedy").click(function(event) {

    var nombres = document.getElementById('editarNombreCarroSpeedy').value;
    var telefono = document.getElementById('editarTelefonoCarroSpeedy').value;
    var email = document.getElementById('editarEmailCarroSpeedy').value;
    var identi = document.getElementById('editarIdentificacionCarroSpeedy').value;
    var password = document.getElementById('editarPasswordCarroSpeedy').value;
    var municipio = document.getElementById('municipio').value;
    var saldoCarroSpeedy = document.getElementById('editarSaldoCarroSpeedy').value;
    var placaCarro = document.getElementById('editarPlacaCarroSpeedy').value;

    console.log("nombres", nombres);
    console.log("telefono", telefono);
    console.log("email", email);
    console.log("identi", identi);
    console.log("password", password);
    console.log("municipio", municipio);
    console.log("saldoCarroSpeedy", saldoCarroSpeedy);

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
        
          window.location = "carrospeedys";

          }

        })

    }).fail(function(ok){

      swal({

        type: "error",
        title: error.responseJSON.message,
        closeOnconfirm: false
        })
      console.log("error: ", ok);
    })

  });
 });

 
 /*=====  End of EDITAR CarroSpeedy  ======*/


/*=====  End of FIREBASE  ======*/

/*=============================================
DESACTIVAR MOTOSPEEDY
=============================================*/

$(document).on("click", ".btnDesactivarCarro", function(){

	var estadoUsuario = $(this).attr("estadoUsuario");
  var identi = $(this).attr("identificacion");
  var placa = $(this).attr("placa");
  var cedulaPro = $(this).attr("cedulaPropi");
  var cambiarUsuario = $(this).attr("cambiarUsuario");
  console.log("cambiarUsuario", cambiarUsuario);

  	$.ajax({
	  url: 'https://us-central1-speedy-dev-d2d52.cloudfunctions.net/api/serMotoSpeedyDesprobado',
 		method: 'POST',
 		async: true,
 		accept: "application/json",
 		crossDomain: true,
 		dataType: 'json',
	  data: {
            VigenciaSoat: "",
            tarjetaPropiedad: "NO",
            licencia : "NO",
            fotoCarro: "NO",
            tecnomecanica : "NO",
            soat: "NO",
	          identidad: identi,
            placaMoto: placa,
            cedulaPropietario: cedulaPro
	        }
  	}).done(function(resp) {

      console.log("resp", resp);

      swal({

        type: "success",
        title: "¡El Motspeedy ha sido actualizado correctamente!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        closeOnconfirm: false
        }).then((result) =>{
          if(result.value){
        
          window.location = "speedys";

          }
        })

    }).fail(function(error){

      swal({

        type: "error",
        title: "¡El Motspeedy ya esta activo!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        closeOnconfirm: false
        }).then((result) =>{
          if(result.value){
        
          window.location = "speedys";

          }
        })
      console.log("error: ",error);
    })

  	if(estadoUsuario == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desaprobado');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',0);

  	}

})

/*=======================================
=            ELIMINAR SPEEDY            =
=======================================*/

$(document).on("click", ".btnEliminarSpeedy", function(){

  var identi = $(this).attr("identificacion");

  console.log("identi", identi);

    $.ajax({
    url: 'https://us-central1-mototaxi-e3065.cloudfunctions.net/api/userDelete/'+identi,
    method: 'GET',
    async: true,
    accept: "application/json",
    crossDomain: true,
    dataType: 'json',
    //data: { identidad: identi },
    headers: {
        'Authorization':'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c3VhcmlvIjp7InBhc3N3b3JkQ29tcHJvYmFjaW9uIjoiMTIzNDU2Iiwibm9tYnJlcyI6IkRhdmlkIFBlcmVpcmEiLCJoaXN0b3JpY29QYXNhamVybyI6W10sImF2YXRhciI6MTA0NzM5NDIyNSwicGxhY2FNb3RvIjoiIiwicm9sIjoiVVNFUiIsImNlZHVsYVByb3BpZXRhcmlvIjoiIiwibW90b1NwZWVkeVNvbGljaXR1ZCI6IiIsInBhc3N3b3JkIjoiOikiLCJ0aXBvU2VydmljaW8iOiIiLCJ2YWxvckNvbmJ1c3RpYmxlRGlhcmlvIjowLCJtZW5zYWplU2Vydmlkb3IiOlt7InZpc3RvIjpmYWxzZSwiaWQiOiIxNTc2NjgxNDk2OTE4IiwibWVzc2FnZSI6IkJpZW52ZW5pZG8gYSBTcGVlZHkifV0sImhpc3Rvcmljb01vdG9TcGVlZHkiOltdLCJlbWFpbCI6ImRhdmd1aTI0MjAxMUBnbWFpbC5jb20iLCJjYW1iaWFyVXN1YXJpbyI6ZmFsc2UsInVsdGltb0xvZ2luIjoiIiwiaWQiOjE1NzY2ODE0OTY5MTgsInRlbGVmb25vIjozMjI3Mzg3ODY3LCJzYWxkb0Rpc3BvbmlibGUiOjAsImlkZW50aWRhZCI6MTA0NzM5NDIyNSwiaGFiaWxpdGFkb01vdG9TcGVlZHkiOmZhbHNlLCJ2YWxvckNhcnJlcmFEaWFyaW8iOjAsImhhYmlsaXRhZG9BcHAiOnRydWV9LCJpYXQiOjE1NzY2ODE1NTEsImV4cCI6MTU4MjcyOTU1MX0.3Po5PWBZ5bBPyXsZI3kHAFdZEt9TW12ZucLAWmoojUs'
    },
    success: function(respuesta){
      swal({

        type: "success",
        title: "¡El Speedy ha sido borrado correctamente!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        closeOnconfirm: false
        }).then((result) =>{
          if(result.value){
        
          window.location = "speedys";

          }
        })
    }

  })

})


/*=========================================================
=            ACTIVAR Y REGISTRA DOC MOTOSPEEDY            =
=========================================================*/

$(".tabla").on("click", ".btnRelDocumentosCarro", function(){

  var identi = $(this).attr("identificacion");
  var nombre = $(this).attr("nombre");
  var placa = $(this).attr("placaCarro");
  var propietario = $(this).attr("propietarioCarro");
  var vigenciaSoat = $(this).attr("vigenciaSoatCarro");
  var tarjetaPropiedad = $(this).attr("tarjetaPropiedadCarro");
  var licencia = $(this).attr("licenciaCarro");
  var fotoCarro = $(this).attr("fotoCarro");
  var tecnomecanica = $(this).attr("tecnomecanicaCarro");
  var soat = $(this).attr("soatCarro");
  var municipio = $(this).attr("municipioCarro");
  var saldoDisponibleCarro = $(this).attr("saldoDisponibleCarro");


console.log("identificacion", identi);
console.log("nombre", nombre);

console.log("placa", placa);

console.log("propietario", propietario);

  if (soat == "SI") {
    document.getElementById("soatCarro").checked = true;
  }else{
    document.getElementById("soatCarro").checked = false;
  }

  if (tarjetaPropiedad == "SI") {
    document.getElementById("tarjetaCarro").checked = true;
  }else{
    document.getElementById("tarjetaCarro").checked = false;
  }

  if (licencia == "SI") {
    document.getElementById("licenciaCarro").checked = true;
  }else{
    document.getElementById("licenciaCarro").checked = false;
  }

  if (fotoCarro == "SI") {
    document.getElementById("fotoCarro").checked = true;
  }else{
    document.getElementById("fotoCarro").checked = false;
  }

  if (tecnomecanica == "SI") {
    document.getElementById("tecnomecanicaCarro").checked = true;
  }else{
    document.getElementById("tecnomecanicaCarro").checked = false;
  }

  $("#fechaVigencia").val(vigenciaSoat);
  $("#idMotoSpeedy").val(identi);
  $("#nombreMotoSpeedy").val(nombre);
  $("#placaCarro").val(placa);
  $("#cedulaPropietario").val(propietario);
  $("#municipioPrestacionServicio").val(municipio);
  $("#municipioPrestacionServicio").html(municipio);
  $("#saldoDisponibleCarro").val(saldoDisponibleCarro);

  $("#btnGuardarDocumentoCarro").click(function(event) {

    var identificacion = document.getElementById('idMotoSpeedy').value;
    var placa = document.getElementById('placaCarro').value;
    var propietario = document.getElementById('cedulaPropietario').value;
    var fechaVigencia = document.getElementById('fechaVigenciaCarro').value;
    var soat = document.getElementById('soatCarro').value;
    var tecnomecanica = document.getElementById('tecnomecanicaCarro').value;
    var licencia = document.getElementById('licenciaCarro').value;
    var fotoCarro = document.getElementById('fotoCarro').value;
    var tarjeta = document.getElementById('tarjetaCarro').value;
    var municipio = document.getElementById('municipio').value;
    var saldoDisponibleCarro = document.getElementById('saldoDisponibleCarro').value;

    if (document.getElementById("fotoCarro").checked == false) {
       var fotoCarro = 'NO';
    }
    if (document.getElementById("soatCarro").checked == false) {
      var soat = 'NO';
    }
    if (document.getElementById("licenciaCarro").checked == false) {
      var licencia = 'NO';
    }
    if (document.getElementById("tecnomecanicaCarro").checked == false) {
      var tecnomecanica = 'NO';
    }
    if (document.getElementById("tarjetaCarro").checked == false) {
      var tarjeta = 'NO';
    }

    console.log("fotoCarro", fotoCarro);
    console.log("soat", soat);
    console.log("licencia", licencia);
    console.log("tecnomecanica", tecnomecanica);
    console.log("tarjeta", tarjeta);
    console.log("saldoDisponibleCarro", saldoDisponibleCarro);


    $.ajax({
      url: 'https://us-central1-mototaxi-e3065.cloudfunctions.net/api/serCarroSpeedyAprobado',
      method: 'POST',
      async: true,
      accept: "application/json",
      crossDomain: true,
      dataType: 'json',
       data: {
        identidad: identificacion,
        placaCarro: placa,
        cedulaPropietarioCarro: propietario,
        vigenciaSoatCarro: fechaVigencia,
        tarjetaPropiedadCarro: tarjeta,
        licenciaCarro : licencia,
        fotoCarro: fotoCarro,
        tecnomecanicaCarro : tecnomecanica,
        soatCarro: soat,
        municipioCarro: municipio,
        saldoDisponibleCarro: saldoDisponibleCarro
        }
    }).done(function(resp) {

      console.log("resp", resp);

      swal({

        type: "success",
        title: "¡El Carrospeedy ha sido actualizado correctamente!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        closeOnconfirm: false
        }).then((result) =>{
          if(result.value){
        
          window.location = "carrospeedys";

          }
        })

    }).fail(function(error){

      swal({

        type: "error",
        title: error.responseJSON.message,
        closeOnconfirm: false
        })
      console.log("error: ",error);
    })

  });

});


/*=====  End of ACTIVAR Y REGISTRA DOC MOTOSPEEDY  ======*/