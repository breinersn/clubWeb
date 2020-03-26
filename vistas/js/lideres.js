/*=============================================
=            GUARDAR LIDER           =
=============================================*/

function guardarLider() {

 	var nombres = document.getElementById('nombreLider').value;
	var identificacion = document.getElementById('identificacionLider').value;
	var telefono = document.getElementById('telefonoLider').value;
	var email = document.getElementById('emailLider').value;
	var contraseña = document.getElementById('contraseñaLider').value;
	var avatar = document.getElementById('emailLider').value;
	var codigoLider = document.getElementById('codigoLider').value;
	var municipio = document.getElementById('municipioLider').value;
	

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
      	codigoLider: codigoLider,
      	avatar: avatar,
        municipio: municipio,
        habilitadoLider: true
        }
   	}).done(function(ok) {
      console.log("ok", ok);

   		swal({

        type: "success",
        title: ok.message,
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        closeOnconfirm: false
        }).then((result) =>{
          if(result.value){
        
          window.location = "lideres";

          }

console.log("ok", ok);
        })

   	}).fail(function(ok){
      console.log("error: ", ok.responseJSON.message);
      swal({

        type: "error",
        title: ok.responseJSON.message,
        closeOnconfirm: false
        })
      
    })
 };


/*=====  End of GUARDAR LIDER ======*/


/*==============================================
 =            EDITAR LIDER           =
 ==============================================*/
 
 //Editar registros

$(".tablas").on("click", ".btnModalEditarLider", function(){

  var nombres = $(this).attr("nombres");
  var telefono = $(this).attr("telefono");
  var email = $(this).attr("email");
  var identificacion = $(this).attr("identificacion");
  var password = $(this).attr("password");
  var municipio = $(this).attr("municipio");

  $("#editarNombreLider").val(nombres);
  $("#editarTelefonoLider").val(telefono);
  $("#editarEmailLider").val(email);
  $("#editarIdentificacionLider").val(identificacion);
  $("#editarPasswordLider").val(password);
  $("#editarMunicipioLider").val(municipio);
  $("#editarMunicipioLider").html(municipio);

  // if (habilitado) {
  //   document.getElementById("habilitado").checked = true;
  // }else{
  //   document.getElementById("habilitado").checked = false;
  // }
 
  $("#btnEditarLider").click(function(event) {

    var nombres = document.getElementById('editarNombreLider').value;
    var telefono = document.getElementById('editarTelefonoLider').value;
    var email = document.getElementById('editarEmailLider').value;
    var identi = document.getElementById('editarIdentificacionLider').value;
    var password = document.getElementById('editarPasswordLider').value;
    var municipio = document.getElementById('editarMunicipioLider').value;

    console.log("nombres", nombres);
    console.log("telefono", telefono);
    console.log("email", email);
    console.log("identi", identi);
    console.log("password", password);
    console.log("municipio", municipio);

    $.ajax({
      url: 'https://us-central1-clubspeedy-dev.cloudfunctions.net/api/editApp',
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
        municipio: municipio
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
        
          window.location = "lideres";

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

 /*=====  End of EDITAR USUARIO GENERAL  ======*/

/*=============================================
 =            VER USUARIOS DE LIDER            =
 =============================================*/
 
 $(document).on("click", ".btnVerUsuarios", function(){

  var codigoLider = $(this).attr("codigo");
  var nombres = $(this).attr("nombres");
  console.log("nombres", nombres);
  console.log("codigoLider", codigoLider);

  window.location = "index.php?ruta=lideres&codigoLider="+codigoLider;

 });
 
 /*=====  End of VER USUARIOS DE LIDER  ======*/

 //DETECTAMOS EL CAMBIO DEL FILTRO, DESTRUIMOS EL DATATABLE, Y LLAMAMOS A LA FUNCION (CARGARDATATABLE)
// $(document).on("click", ".btnVerUsuarios", function(){

//   $('.tabla_usuarios').dataTable().fnDestroy();
//   var codigoLider = $(this).attr("codigo");
//   var nombres = $(this).attr("nombres");
//   console.log("nombres", nombres);
//   console.log("codigoLider", codigoLider);

//   cargarDataTableUsuario(codigoLider);
// });

 /*================================================
 =            Listar tabla de usuarios            =
 ================================================*/
 
// function cargarDataTableUsuario(codigoLider) {

//     $('.tabla_usuarios').DataTable( {
//         "ajax": {
//           'method':'post',
//           "url": "https://us-central1-clubspeedy-dev.cloudfunctions.net/api/verUsuariosDebajo",
//           "data": d => {
//               d.codigo = codigoLider
//             },
//         },
//         "columns": [
//           { "data": "nombres" },
//           { "data": "identificacion" },
//           { "data": "municipio" },
//           { "data": "password" },
//           { "data": "telefono" },
//           { "data": "codigoTransportador" },
//           { render: (data, type, row) => {
//             return `<div class="btn-group">
//                       <button class="btn btn-warning btn-sm btnModalActualizarServicio" data-toggle="modal" data-target="#modalActualizarSolicitud">
//                         <i class="fa fa-pencil"></i>
//                       </button>
//                       <button class="btn btn-primary btn-sm btnModalActualizar" data-toggle="modal" data-target="#modalActualizarSolicitud">
//                         <i class="fa fa-user"></i>
//                       </button>
//                       <button class="btn btn-success btn-sm btnModalActualizar" data-toggle="modal" data-target="#modalActualizarSolicitud">
//                         <i class="fa fa-desktop"></i>
//                       </button>
//                     </div>`;
//                     }
//           },
//         ]
//     });
// }; 
 
 /*=====  End of Listar tabla de usuarios  ======*/
 
  