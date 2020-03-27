/*=============================
=            CHECK            =
=============================*/

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'radio_minimal-blue'
})


/*=====  End of CHECK  ======*/


/*=============================================
=            GUARDAR Transportador           =
=============================================*/

function guardarTransportador() {

    var nombres = document.getElementById('nuevoSpeedy').value;
    var identificacion = document.getElementById('nuevaIdentificacion').value;
    var telefono = document.getElementById('nuevoTelefono').value;
    var email = document.getElementById('nuevoEmail').value;
    var contraseña = document.getElementById('nuevaContraseña').value;
    var codigo1 = document.getElementById('codigo1').value;
    var municipio = document.getElementById('nuevoMunicipio').value;
    var placaMoto = document.getElementById('nuevaPlacaMotoSpeedy').value;
    var placaCarro = document.getElementById('nuevaPlacaCarroSpeedy').value;

    if (municipio == 'TURBACO') {

        var letras = 'TBO';

    } else {

        var letras = municipio.substr(0, 3);

    }


    var codigoTransportador = letras + identificacion;

    if (document.getElementById("moto").checked == true) {
        var habilitadoMotoSpeedy = true;
    } else {
        var habilitadoMotoSpeedy = false;
    }

    if (document.getElementById("carro").checked == true) {
        var habilitadoCarroSpeedy = true;
    } else {
        var habilitadoCarroSpeedy = false;
    }

    console.log("habilitadoMotoSpeedy", habilitadoMotoSpeedy);

    console.log("habilitadoCarroSpeedy", habilitadoCarroSpeedy);

    $.ajax({
        url: 'https://us-central1-clubspeedy-dev.cloudfunctions.net/api/crearUsuario',
        method: 'POST',
        async: true,
        accept: "application/json",
        crossDomain: true,
        dataType: 'json',
        headers: {
            'Authorization': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c3VhcmlvIjp7InBhc3N3b3JkQ29tcHJvYmFjaW9uIjoiMTIzNDU2Iiwibm9tYnJlcyI6IkRhdmlkIFBlcmVpcmEiLCJoaXN0b3JpY29QYXNhamVybyI6W10sImF2YXRhciI6MTA0NzM5NDIyNSwicGxhY2FNb3RvIjoiIiwicm9sIjoiVVNFUiIsImNlZHVsYVByb3BpZXRhcmlvIjoiIiwibW90b1NwZWVkeVNvbGljaXR1ZCI6IiIsInBhc3N3b3JkIjoiOikiLCJ0aXBvU2VydmljaW8iOiIiLCJ2YWxvckNvbmJ1c3RpYmxlRGlhcmlvIjowLCJtZW5zYWplU2Vydmlkb3IiOlt7InZpc3RvIjpmYWxzZSwiaWQiOiIxNTc2NjgxNDk2OTE4IiwibWVzc2FnZSI6IkJpZW52ZW5pZG8gYSBTcGVlZHkifV0sImhpc3Rvcmljb01vdG9TcGVlZHkiOltdLCJlbWFpbCI6ImRhdmd1aTI0MjAxMUBnbWFpbC5jb20iLCJjYW1iaWFyVXN1YXJpbyI6ZmFsc2UsInVsdGltb0xvZ2luIjoiIiwiaWQiOjE1NzY2ODE0OTY5MTgsInRlbGVmb25vIjozMjI3Mzg3ODY3LCJzYWxkb0Rpc3BvbmlibGUiOjAsImlkZW50aWRhZCI6MTA0NzM5NDIyNSwiaGFiaWxpdGFkb01vdG9TcGVlZHkiOmZhbHNlLCJ2YWxvckNhcnJlcmFEaWFyaW8iOjAsImhhYmlsaXRhZG9BcHAiOnRydWV9LCJpYXQiOjE1NzY2ODE1NTEsImV4cCI6MTU4MjcyOTU1MX0.3Po5PWBZ5bBPyXsZI3kHAFdZEt9TW12ZucLAWmoojUs'
        },
        data: {
            password: contraseña,
            nombres: nombres,
            email: email,
            identificacion: identificacion,
            telefono: telefono,
            codigo1: codigo1,
            codigoTransportador: codigoTransportador,
            municipio: municipio,
            habilitadoTransportador: true,
            habilitadoMotoSpeedy: habilitadoMotoSpeedy,
            habilitadoCarroSpeedy: habilitadoCarroSpeedy,
            placaCarro: placaCarro,
            placaMoto: placaMoto
        }
    }).done(function(ok) {

        swal({

            type: "success",
            title: ok.message,
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnconfirm: false
        }).then((result) => {
            if (result.value) {

                window.location = "transportadores";

            }
        })
    }).fail(function(error) {

        swal({

            type: "error",
            title: error.responseJSON.message,
            closeOnconfirm: false
        })
        console.log("error: ", error.responseJSON.message);
    })
};


/*=====  End of GUARDAR TRANSPORTADOR ======*/


/*==============================================
=            EDITAR TRANSPORTADOR           =
==============================================*/

//Editar registros

$(".tablas").on("click", ".btnModalEditarTransportador", function() {

    var nombres = $(this).attr("nombres");
    var telefono = $(this).attr("telefono");
    var email = $(this).attr("email");
    var identificacion = $(this).attr("identificacion");
    var password = $(this).attr("password");
    var municipio = $(this).attr("municipio");
    var codigoLider = $(this).attr("codigoLider");
    var codigoPasajero = $(this).attr("codigoPasajero");
    var codigoTransportador = $(this).attr("codigoTransportador");
    var codigo1 = $(this).attr("codigo1");
    var cambioUsuario = $(this).attr("cambioUsuario");
    var habilitadoPasajero = $(this).attr("habilitadoPasajero");
    var habilitadoLider = $(this).attr("habilitadoLider");
    var habilitado = $(this).attr("habilitado");;
    console.log("habilitado", habilitado);
    var saldoCarroSpeedy = $(this).attr("saldoCarroSpeedy");
    var saldoMotoSpeedy = $(this).attr("saldoMotoSpeedy");
    var placaCarro = $(this).attr("placaCarro");
    var placaMoto = $(this).attr("placaMoto");
    var habilitadoCarroSpeedy = $(this).attr("habilitadoCarroSpeedy");
    var habilitadoMotoSpeedy = $(this).attr("habilitadoMotoSpeedy");
    var habilitadoTransportador = $(this).attr("habilitadoTransportador");
    var habilitadoLider = $(this).attr("habilitadoLider");


    if (habilitadoLider) {
        var habilitadoLider = true;
    } else {
        var habilitadoLider = false;
    }

    if (habilitado) {
        var habilitado = true;
    } else {
        var habilitado = false;
    }

    if (habilitadoPasajero) {
        var habilitadoPasajero = true;
    } else {
        var habilitadoPasajero = false;
    }

    if (habilitadoTransportador) {
        var habilitadoTransportador = true;
    } else {
        var habilitadoTransportador = false;
    }


    console.log("habilitadoLider", habilitadoLider);

    if (habilitadoCarroSpeedy) {
        document.getElementById("editarCarro").checked = true;
    } else {
        document.getElementById("editarCarro").checked = false;
    }

    if (habilitadoMotoSpeedy) {
        document.getElementById("editarMoto").checked = true;
    } else {
        document.getElementById("editarMoto").checked = false;
    }

    if (habilitadoLider) {
        document.getElementById("editarLider").checked = true;
    } else {
        document.getElementById("editarLider").checked = false;
    }

    if (habilitado) {
        document.getElementById("habilitado").checked = true;
    } else {
        document.getElementById("habilitado").checked = false;
    }

    $("#editarNombreTransportador").val(nombres);
    $("#editarTelefonoTransportador").val(telefono);
    $("#editarEmailTransportador").val(email);
    $("#editarIdentificacionTransportador").val(identificacion);
    $("#editarPasswordTransportador").val(password);
    $("#editarMunicipioTransportador").val(municipio);
    $("#editarMunicipioTransportador").html(municipio);
    $("#editarCodigoLider").val(codigo1);
    $("#editarPlacaMotoSpeedy").val(placaMoto);
    $("#editarPlacaCarroSpeedy").val(placaCarro);
    $("#editarSaldoMotoSpeedy").val(saldoMotoSpeedy);
    $("#editarSaldoCarroSpeedy").val(saldoCarroSpeedy);

    $("#btnEditarTransportador").click(function(event) {

        var nombres = document.getElementById('editarNombreTransportador').value;
        var telefono = document.getElementById('editarTelefonoTransportador').value;
        var email = document.getElementById('editarEmailTransportador').value;
        var identi = document.getElementById('editarIdentificacionTransportador').value;
        var password = document.getElementById('editarPasswordTransportador').value;
        var municipio = document.getElementById('municipio').value;
        var placaCarro = document.getElementById('editarPlacaCarroSpeedy').value;
        var placaMoto = document.getElementById('editarPlacaMotoSpeedy').value;
        var saldoMotoSpeedy = document.getElementById('editarSaldoMotoSpeedy').value;
        var saldoCarroSpeedy = document.getElementById('editarSaldoCarroSpeedy').value;

        if (document.getElementById("editarMoto").checked == true) {
            var habilitadoMotoSpeedy = true;
        } else {
            var habilitadoMotoSpeedy = false;
            placaMoto = "";
            saldoMotoSpeedy = 0;
        }

        if (document.getElementById("editarCarro").checked == true) {
            var habilitadoCarroSpeedy = true;
        } else {
            var habilitadoCarroSpeedy = false;
            placaCarro = "";
            saldoCarroSpeedy = 0;
        }

        if (document.getElementById("editarLider").checked == true) {
            var habilitadoLider = true;
        } else {
            var habilitadoLider = false;
        }

        if (document.getElementById("habilitado").checked == true) {
            var habilitado = true;
        } else {
            var habilitado = false;
        }

        console.log("habilitadoMotoSpeedy", habilitadoMotoSpeedy);

        console.log("habilitadoCarroSpeedy", habilitadoCarroSpeedy);

        $.ajax({
            url: 'https://us-central1-clubspeedy-dev.cloudfunctions.net/api/editWeb',
            method: 'POST',
            async: true,
            accept: "application/json",
            crossDomain: true,
            dataType: 'json',
            data: {
                identificacion: identi,
                nombres: nombres,
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
                habilitadoPasajero: habilitadoPasajero,
                habilitadoLider: habilitadoLider,
                saldoMotoCarroSpeedy: saldoCarroSpeedy,
                placaCarro: placaCarro,
                habilitadoMotoSpeedy: habilitadoMotoSpeedy,
                habilitadoCarroSpeedy: habilitadoCarroSpeedy,
                habilitadoTransportador: habilitadoTransportador
            }
        }).done(function(ok) {

            swal({

                type: "success",
                title: ok.message,
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnconfirm: false
            }).then((result) => {
                if (result.value) {

                    window.location = "transportadores";

                }

            })

        }).fail(function(ok) {

            swal({

                type: "error",
                title: ok.message,
                closeOnconfirm: false
            })
            console.log("error: ", ok);
        })

    });
});


/*=====  End of EDITAR TRANSPORTADOR  ======*/

function formato(fecha) {
    return fecha.replace(/^(\d{4})-(\d{2})-(\d{2})$/g, '$3/$2/$1');
}

/*=============================================
=            REVISAR COMISION           =
=============================================*/

$(".tablas").on("click", ".btnTotalComision", function() {

    var email = $(this).attr("email");
    var fechaInicial = document.getElementById('fechaInicial').value;
    var fechaFinal = document.getElementById('fechaFinal').value;


    $.ajax({
        url: 'https://us-central1-clubspeedy-dev.cloudfunctions.net/api/totalComision',
        method: 'POST',
        async: true,
        accept: "application/json",
        crossDomain: true,
        dataType: 'json',
        data: {
            email: email
        }
    }).done(function(ok) {

        var total = 0;
        for (var i = ok.arraySolicitudes.length - 1; i >= 0; i--) {

            var fechaNum = parseInt(ok.arraySolicitudes[i].fechaActualizacion);

            let diaActual = new Date(fechaInicial).getDate();
            let mesActual = new Date(fechaInicial).getMonth();
            let anoActual = new Date(fechaInicial).getFullYear();
            console.log("mesActual", mesActual);

            let diaSolicitud = new Date(parseInt(fechaNum)).getDate();
            let mesSolicitud = new Date(parseInt(fechaNum)).getMonth();
            let anoSolicitud = new Date(parseInt(fechaNum)).getFullYear();
            console.log("mesSolicitud", mesSolicitud);


            if ((diaActual == diaSolicitud) && (mesActual == mesSolicitud) && (anoActual == anoSolicitud)) {
                var total = total + ok.arraySolicitudes[i].valorFinal;
            }
        }

        var totalidad = total * 15 / 100;

        var producido = total.toLocaleString('en');
        var comision = totalidad.toLocaleString('en');

        swal({

            type: "warning",
            title: "Ingresos",
            html: "<b>Producido:</b> $ " + producido + "<br> <b>Comisión:</b> $ " + comision + "",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            confirmButtonText: "Confirmar pago de comision?"
        }).then((result) => {
            if (result.value) {

                $("#modalAgregarComision").modal();

                localStorage.setItem("email", email);

            }
        })
    }).fail(function(error) {
        console.log("error: ", error.responseJSON.message);
    })
});


/*=====  End of GUARDAR TRANSPORTADOR ======*/

/*=============================================
VARIABLE LOCAL STORAGE
=============================================*/

if (localStorage.getItem("email") != null) {

    $("#emailComision span").html(localStorage.getItem("email"));

}

/*=====  End of VARIABLE LOCALSTORAGE  ======*/


/*=============================================
=            GUARDAR PAGO COMISION           =
=============================================*/

function btnGuardarPago() {

    var fechaPago = document.getElementById('fechaComision').value;
    var comision = document.getElementById('pagoComision').value;
    var tipo = document.getElementById('tipoTransportador').value;
    var email = localStorage.getItem("email");

    $.ajax({
        url: 'https://us-central1-clubspeedy-dev.cloudfunctions.net/api/pagoIndividualComision',
        method: 'POST',
        async: true,
        accept: "application/json",
        crossDomain: true,
        dataType: 'json',
        data: {
            comision: comision,
            fecha: fechaPago,
            email: email,
            tipo: tipo
        }
    }).done(function(ok) {

        swal({

            type: "success",
            title: ok.message,
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnconfirm: false
        }).then((result) => {
            if (result.value) {

                window.location = "transportadores";

            }
        })
    }).fail(function(error) {

        swal({

            type: "error",
            title: error.responseJSON.message,
            closeOnconfirm: false
        })
        console.log("error: ", error.responseJSON.message);
    })

};

/*==============================================
=            VER PAGOS Y COMISIONES            =
==============================================*/

$(".tablas").on("click", ".btnVerPagos", function() {

    var email = $(this).attr("email");
    var nombres = $(this).attr("nombres");

    localStorage.setItem("email", email);

    $("#emailTransportador").val(email);
    $("#modalVerPagos").modal();

    // swal({
    //   title: '¿Desea ver los pagos de '+nombres+'?',
    //   text: "¡Si no es haci, puede cancelar la accíón!",
    //   type: 'warning',
    //   showCancelButton: true,
    //   confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     cancelButtonText: 'Cancelar',
    //     confirmButtonText: 'Si, ver pagos!'
    // }).then(function(result){

    //   if(result.value){

    //     window.location = "index.php?ruta=reportes&email="+email;

    //   }

    // })


});


/*=====  End of VER PAGOS Y COMISIONES  ======*/


/*=============================================
ACTIVAR MOTOSPEEDY
=============================================*/

$(document).on("click", ".btnActivar", function() {

    var estadoUsuario = $(this).attr("estadoUsuario");
    var identi = $(this).attr("identificacion");
    var placa = $(this).attr("placa");
    var cedulaPro = $(this).attr("cedulaPropi");
    var cambiarUsuario = $(this).attr("cambiarUsuario");
    console.log("cambiarUsuario", cambiarUsuario);

    $.ajax({
        url: 'https://us-central1-mototaxi-e3065.cloudfunctions.net/api/serMotoSpeedyAprobado',
        method: 'POST',
        async: true,
        accept: "application/json",
        crossDomain: true,
        dataType: 'json',
        data: {
            ident: identi,
            placaMoto: placa,
            cedulaPropietario: cedulaPro,
            cambiarUsuario: cambiarUsuario
        },
        headers: {
            'Authorization': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c3VhcmlvIjp7InBhc3N3b3JkQ29tcHJvYmFjaW9uIjoiMTIzNDU2Iiwibm9tYnJlcyI6IkRhdmlkIFBlcmVpcmEiLCJoaXN0b3JpY29QYXNhamVybyI6W10sImF2YXRhciI6MTA0NzM5NDIyNSwicGxhY2FNb3RvIjoiIiwicm9sIjoiVVNFUiIsImNlZHVsYVByb3BpZXRhcmlvIjoiIiwibW90b1NwZWVkeVNvbGljaXR1ZCI6IiIsInBhc3N3b3JkIjoiOikiLCJ0aXBvU2VydmljaW8iOiIiLCJ2YWxvckNvbmJ1c3RpYmxlRGlhcmlvIjowLCJtZW5zYWplU2Vydmlkb3IiOlt7InZpc3RvIjpmYWxzZSwiaWQiOiIxNTc2NjgxNDk2OTE4IiwibWVzc2FnZSI6IkJpZW52ZW5pZG8gYSBTcGVlZHkifV0sImhpc3Rvcmljb01vdG9TcGVlZHkiOltdLCJlbWFpbCI6ImRhdmd1aTI0MjAxMUBnbWFpbC5jb20iLCJjYW1iaWFyVXN1YXJpbyI6ZmFsc2UsInVsdGltb0xvZ2luIjoiIiwiaWQiOjE1NzY2ODE0OTY5MTgsInRlbGVmb25vIjozMjI3Mzg3ODY3LCJzYWxkb0Rpc3BvbmlibGUiOjAsImlkZW50aWRhZCI6MTA0NzM5NDIyNSwiaGFiaWxpdGFkb01vdG9TcGVlZHkiOmZhbHNlLCJ2YWxvckNhcnJlcmFEaWFyaW8iOjAsImhhYmlsaXRhZG9BcHAiOnRydWV9LCJpYXQiOjE1NzY2ODE1NTEsImV4cCI6MTU4MjcyOTU1MX0.3Po5PWBZ5bBPyXsZI3kHAFdZEt9TW12ZucLAWmoojUs'
        },
        success: function(respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "El usuario ha sido actualizado",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {

                    if (result.value) {

                        window.location = "speedys";

                    }

                });


            }
        }

    })

    if (estadoUsuario == 1) {

        $(this).removeClass('btn-warning');
        $(this).addClass('btn-success');
        $(this).html('Activado');
        $(this).attr('estadoUsuario', 0);

    } else {

        $(this).addClass('btn-danger');
        $(this).removeClass('btn-success');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario', 1);

    }

})


/*=============================================
DESACTIVAR MOTOSPEEDY
=============================================*/

$(document).on("click", ".btnDesactivar", function() {

    var estadoUsuario = $(this).attr("estadoUsuario");
    var identi = $(this).attr("identificacion");
    var placa = $(this).attr("placa");
    var cedulaPro = $(this).attr("cedulaPropi");
    var cambiarUsuario = $(this).attr("cambiarUsuario");
    console.log("cambiarUsuario", cambiarUsuario);

    $.ajax({
        url: 'https://us-central1-mototaxi-e3065.cloudfunctions.net/api/serMotoSpeedyDesprobado',
        method: 'POST',
        async: true,
        accept: "application/json",
        crossDomain: true,
        dataType: 'json',
        data: {
            identidad: identi,
            placaMoto: placa,
            cedulaPropietario: cedulaPro
        },
        headers: {
            'Authorization': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c3VhcmlvIjp7InBhc3N3b3JkQ29tcHJvYmFjaW9uIjoiMTIzNDU2Iiwibm9tYnJlcyI6IkRhdmlkIFBlcmVpcmEiLCJoaXN0b3JpY29QYXNhamVybyI6W10sImF2YXRhciI6MTA0NzM5NDIyNSwicGxhY2FNb3RvIjoiIiwicm9sIjoiVVNFUiIsImNlZHVsYVByb3BpZXRhcmlvIjoiIiwibW90b1NwZWVkeVNvbGljaXR1ZCI6IiIsInBhc3N3b3JkIjoiOikiLCJ0aXBvU2VydmljaW8iOiIiLCJ2YWxvckNvbmJ1c3RpYmxlRGlhcmlvIjowLCJtZW5zYWplU2Vydmlkb3IiOlt7InZpc3RvIjpmYWxzZSwiaWQiOiIxNTc2NjgxNDk2OTE4IiwibWVzc2FnZSI6IkJpZW52ZW5pZG8gYSBTcGVlZHkifV0sImhpc3Rvcmljb01vdG9TcGVlZHkiOltdLCJlbWFpbCI6ImRhdmd1aTI0MjAxMUBnbWFpbC5jb20iLCJjYW1iaWFyVXN1YXJpbyI6ZmFsc2UsInVsdGltb0xvZ2luIjoiIiwiaWQiOjE1NzY2ODE0OTY5MTgsInRlbGVmb25vIjozMjI3Mzg3ODY3LCJzYWxkb0Rpc3BvbmlibGUiOjAsImlkZW50aWRhZCI6MTA0NzM5NDIyNSwiaGFiaWxpdGFkb01vdG9TcGVlZHkiOmZhbHNlLCJ2YWxvckNhcnJlcmFEaWFyaW8iOjAsImhhYmlsaXRhZG9BcHAiOnRydWV9LCJpYXQiOjE1NzY2ODE1NTEsImV4cCI6MTU4MjcyOTU1MX0.3Po5PWBZ5bBPyXsZI3kHAFdZEt9TW12ZucLAWmoojUs'
        },
        success: function(respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "El usuario ha sido actualizado",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {

                    if (result.value) {

                        window.location = "speedys";

                    }

                });


            }
        }

    })

    if (estadoUsuario == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desaprobado');
        $(this).attr('estadoUsuario', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoUsuario', 0);

    }

})

/*=======================================
=            ELIMINAR SPEEDY            =
=======================================*/

$(document).on("click", ".btnEliminarSpeedy", function() {

    var identi = $(this).attr("identificacion");

    console.log("identi", identi);

    $.ajax({
        url: 'https://us-central1-mototaxi-e3065.cloudfunctions.net/api/userDelete/' + identi,
        method: 'GET',
        async: true,
        accept: "application/json",
        crossDomain: true,
        dataType: 'json',
        //data: { identidad: identi },
        headers: {
            'Authorization': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c3VhcmlvIjp7InBhc3N3b3JkQ29tcHJvYmFjaW9uIjoiMTIzNDU2Iiwibm9tYnJlcyI6IkRhdmlkIFBlcmVpcmEiLCJoaXN0b3JpY29QYXNhamVybyI6W10sImF2YXRhciI6MTA0NzM5NDIyNSwicGxhY2FNb3RvIjoiIiwicm9sIjoiVVNFUiIsImNlZHVsYVByb3BpZXRhcmlvIjoiIiwibW90b1NwZWVkeVNvbGljaXR1ZCI6IiIsInBhc3N3b3JkIjoiOikiLCJ0aXBvU2VydmljaW8iOiIiLCJ2YWxvckNvbmJ1c3RpYmxlRGlhcmlvIjowLCJtZW5zYWplU2Vydmlkb3IiOlt7InZpc3RvIjpmYWxzZSwiaWQiOiIxNTc2NjgxNDk2OTE4IiwibWVzc2FnZSI6IkJpZW52ZW5pZG8gYSBTcGVlZHkifV0sImhpc3Rvcmljb01vdG9TcGVlZHkiOltdLCJlbWFpbCI6ImRhdmd1aTI0MjAxMUBnbWFpbC5jb20iLCJjYW1iaWFyVXN1YXJpbyI6ZmFsc2UsInVsdGltb0xvZ2luIjoiIiwiaWQiOjE1NzY2ODE0OTY5MTgsInRlbGVmb25vIjozMjI3Mzg3ODY3LCJzYWxkb0Rpc3BvbmlibGUiOjAsImlkZW50aWRhZCI6MTA0NzM5NDIyNSwiaGFiaWxpdGFkb01vdG9TcGVlZHkiOmZhbHNlLCJ2YWxvckNhcnJlcmFEaWFyaW8iOjAsImhhYmlsaXRhZG9BcHAiOnRydWV9LCJpYXQiOjE1NzY2ODE1NTEsImV4cCI6MTU4MjcyOTU1MX0.3Po5PWBZ5bBPyXsZI3kHAFdZEt9TW12ZucLAWmoojUs'
        },
        success: function(respuesta) {
            swal({

                type: "success",
                title: "¡El Speedy ha sido borrado correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnconfirm: false
            }).then((result) => {
                if (result.value) {

                    window.location = "speedys";

                }
            })
        }

    })

})

/*=========================================================
=            ACTIVAR Y REGISTRA DOC MOTOSPEEDY            =
=========================================================*/

$(".tablas").on("click", ".btnRelDocumentos", function() {

    var identi = $(this).attr("identificacion");
    var nombre = $(this).attr("nombre");
    var placa = $(this).attr("placa");
    var propietario = $(this).attr("propietario");
    var vigenciaSoat = $(this).attr("vigenciaSoat");
    var tarjetaPropiedad = $(this).attr("tarjetaPropiedad");
    var licencia = $(this).attr("licencia");
    var fotoMoto = $(this).attr("fotoMoto");
    var tecnomecanica = $(this).attr("tecnomecanica");
    var soat = $(this).attr("soat");
    var municipio = $(this).attr("municipio");
    var saldoDisponible = $(this).attr("saldoDisponible");

    console.log("municipio:", municipio);

    if (soat == "SI") {
        document.getElementById("soat").checked = true;
    } else {
        document.getElementById("soat").checked = false;
    }

    if (tarjetaPropiedad == "SI") {
        document.getElementById("tarjeta").checked = true;
    } else {
        document.getElementById("tarjeta").checked = false;
    }

    if (licencia == "SI") {
        document.getElementById("licencia").checked = true;
    } else {
        document.getElementById("licencia").checked = false;
    }

    if (fotoMoto == "SI") {
        document.getElementById("fotoMoto").checked = true;
    } else {
        document.getElementById("fotoMoto").checked = false;
    }

    if (tecnomecanica == "SI") {
        document.getElementById("tecnomecanica").checked = true;
    } else {
        document.getElementById("tecnomecanica").checked = false;
    }

    $("#fechaVigencia").val(vigenciaSoat);
    $("#idMotoSpeedy").val(identi);
    $("#nombreMotoSpeedy").val(nombre);
    $("#placaMoto").val(placa);
    $("#cedulaPropietario").val(propietario);
    $("#municipioPrestacionServicio").val(municipio);
    $("#municipioPrestacionServicio").html(municipio);
    $("#saldoDisponible").html(saldoDisponible);

    $("#btnGuardarDocumento").click(function(event) {

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
        var saldoDisponible = document.getElementById('saldoDisponible').value;

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
        console.log("municipio:", municipio);
        console.log("saldoDisponible:", saldoDisponible);
        console.log("vigenciaSoat:", fechaVigencia);
        console.log("identificacion:", identificacion);
        console.log("placaMoto:", placa);
        console.log("cedulaPropietario:", propietario);

        $.ajax({
            url: 'https://us-central1-mototaxi-e3065.cloudfunctions.net/api/serMotoSpeedyAprobado',
            method: 'POST',
            async: true,
            accept: "application/json",
            crossDomain: true,
            dataType: 'json',
            data: {
                identidad: identificacion,
                placaMoto: placa,
                cedulaPropietario: propietario,
                vigenciaSoatMoto: fechaVigencia,
                tarjetaPropiedadMoto: tarjeta,
                licenciaMoto: licencia,
                fotoMoto: fotoMoto,
                tecnomecanicaMoto: tecnomecanica,
                soatMoto: soat,
                municipio: municipio,
                saldoDisponible: saldoDisponible
            }
        }).done(function(resp) {

            console.log("resp", resp);

            swal({

                type: "success",
                title: "¡El Motspeedy ha sido actualizado correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnconfirm: false
            }).then((result) => {
                if (result.value) {

                    window.location = "speedys";

                }
            })

        }).fail(function(error) {

            swal({

                type: "error",
                title: error.responseJSON.message,
                closeOnconfirm: false
            })
            console.log("error: ", error);
        })

    });

});