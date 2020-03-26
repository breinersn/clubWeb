
 /*==============================================
 =            EDITAR USUARIO GENERAL            =
 ==============================================*/
 
 //Editar registros

$(".tablas").on("click", ".btnEditarSpeedy", function(){

  var nombre = $(this).attr("nombres");
  var telefono = $(this).attr("telefono");
  var email = $(this).attr("email");
  var identi = $(this).attr("identificacion");


console.log("hola", hola);

  $("#editarSpeedy").val(nombre);
  $("#editarcelSpeedy").val(telefono);
  $("#editarmailSpeedy").val(email);
  $("#editarIdenSpeedy").val(identi);
 
  $("#btnEditarUserSpeedy").click(function(event) {

    var nombres = document.getElementById('editarSpeedy').value;
    var telefono = document.getElementById('editarcelSpeedy').value;
    var email = document.getElementById('editarmailSpeedy').value;
    var identi = document.getElementById('editarIdenSpeedy').value;
    var avatar = document.getElementById('editarIdenSpeedy').value;
    
    /*var contraseña = document.getElementById('editarContraseña').value;
    var confirmarContraseña = document.getElementById('editarConfirmarContraseña').value;*/

    console.log("nombres", nombres);

    $.ajax({
      url: 'https://us-central1-mototaxi-e3065.cloudfunctions.net/api/userEditProfile',
      method: 'POST',
      async: true,
      accept: "application/json",
      crossDomain: true,
      dataType: 'json',
       data: {
        identidad: identi,
        nombres : nombres,
        telefono: telefono,
        email: email,
        avatar: avatar
        }
    }).done(function(resp) {
      
       swal({
            title: "El usuario ha sido actualizado",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          }).then(function(result) {
            
              if (result.value) {

              window.location = "speedys";

            }

          });


    }, function(error){
      console.log("error: ",error);
    })

  });
 });

 
 /*=====  End of EDITAR USUARIO GENERAL  ======*/

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
            fotoMoto: "NO",
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

  if (soat == "SI") {
    document.getElementById("soat").checked = true;
  }else{
    document.getElementById("soat").checked = false;
  }

  if (tarjetaPropiedad == "SI") {
    document.getElementById("tarjeta").checked = true;
  }else{
    document.getElementById("tarjeta").checked = false;
  }

  if (licencia == "SI") {
    document.getElementById("licencia").checked = true;
  }else{
    document.getElementById("licencia").checked = false;
  }

  if (fotoMoto == "SI") {
    document.getElementById("fotoMoto").checked = true;
  }else{
    document.getElementById("fotoMoto").checked = false;
  }

  if (tecnomecanica == "SI") {
    document.getElementById("tecnomecanica").checked = true;
  }else{
    document.getElementById("tecnomecanica").checked = false;
  }

  $("#fechaVigencia").val(vigenciaSoat);
  $("#idMotoSpeedy").val(identi);
  $("#nombreMotoSpeedy").val(nombre);
  $("#placaMoto").val(placa);
  $("#cedulaPropietario").val(propietario);
  $("#municipioPrestacionServicio").val(municipio);
  $("#municipioPrestacionServicio").html(municipio);

  $("#btnGuardarDocumentoCarro").click(function(event) {

    var identificacion = document.getElementById('idMotoSpeedy').value;
    var placa = document.getElementById('placaMoto').value;
    var propietario = document.getElementById('cedulaPropietario').value;
    var fechaVigencia = document.getElementById('fechaVigencia').value;
    var soat = document.getElementById('soat').value;
    var tecnomecanica = document.getElementById('tecnomecanica').value;
    var licencia = document.getElementById('licencia').value;
    var fotoMoto = document.getElementById('fotoMoto').value;
    var tarjeta = document.getElementById('tarjeta').value;
    var municipio = document.getElementById('municipio').value;

    if (document.getElementById("fotoMoto").checked == false) {
       var fotoMoto = 'NO';
    }
    if (document.getElementById("soat").checked == false) {
      var soat = 'NO';
    }
    if (document.getElementById("licencia").checked == false) {
      var licencia = 'NO';
    }
    if (document.getElementById("tecnomecanica").checked == false) {
      var tecnomecanica = 'NO';
    }
    if (document.getElementById("tarjeta").checked == false) {
      var tarjeta = 'NO';
    }

    console.log("fotoMoto", fotoMoto);
    console.log("soat", soat);
    console.log("licencia", licencia);
    console.log("tecnomecanica", tecnomecanica);
    console.log("tarjeta", tarjeta);


    $.ajax({
      url: 'http://localhost:5000/speedy-dev-d2d52/us-central1/api/serCarroSpeedyAprobado',
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
        municipioCarro: municipio
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
        
          window.location = "carrospeedys";

          }
        })

    }).fail(function(error){

      swal({

        type: "error",
        title: "¡El Motspeedy no pudo ser activado o ya esta activo!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        closeOnconfirm: false
        }).then((result) =>{
          if(result.value){
        
          window.location = "carrospeedys";

          }
        })
      console.log("error: ",error);
    })

  });

});


/*=====  End of ACTIVAR Y REGISTRA DOC MOTOSPEEDY  ======*/










