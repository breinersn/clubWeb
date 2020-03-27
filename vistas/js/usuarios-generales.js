/*=======================================
=     BANEAR Y DESBANEAR USUARIO        =
=======================================*/

$(document).on("click", ".btnBanear", function() {

    var estadoUsuario = $(this).attr("estadoUsuario");
    var identi = $(this).attr("identificacion");
    var habilitadoApp = $(this).attr("estadoUsuario");

    //console.log("estadoUsuario", estadoUsuario);

    $.ajax({
        url: 'https://us-central1-mototaxi-e3065.cloudfunctions.net/api/usuarioBaneado',
        method: 'POST',
        async: true,
        accept: "application/json",
        crossDomain: true,
        dataType: 'json',
        data: {
            identidad: identi,
            habilitadoApp: habilitadoApp
        },
        headers: {
            'Authorization': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c3VhcmlvIjp7InBhc3N3b3JkQ29tcHJvYmFjaW9uIjoiMTIzNDU2Iiwibm9tYnJlcyI6IkRhdmlkIFBlcmVpcmEiLCJoaXN0b3JpY29QYXNhamVybyI6W10sImF2YXRhciI6MTA0NzM5NDIyNSwicGxhY2FNb3RvIjoiIiwicm9sIjoiVVNFUiIsImNlZHVsYVByb3BpZXRhcmlvIjoiIiwibW90b1NwZWVkeVNvbGljaXR1ZCI6IiIsInBhc3N3b3JkIjoiOikiLCJ0aXBvU2VydmljaW8iOiIiLCJ2YWxvckNvbmJ1c3RpYmxlRGlhcmlvIjowLCJtZW5zYWplU2Vydmlkb3IiOlt7InZpc3RvIjpmYWxzZSwiaWQiOiIxNTc2NjgxNDk2OTE4IiwibWVzc2FnZSI6IkJpZW52ZW5pZG8gYSBTcGVlZHkifV0sImhpc3Rvcmljb01vdG9TcGVlZHkiOltdLCJlbWFpbCI6ImRhdmd1aTI0MjAxMUBnbWFpbC5jb20iLCJjYW1iaWFyVXN1YXJpbyI6ZmFsc2UsInVsdGltb0xvZ2luIjoiIiwiaWQiOjE1NzY2ODE0OTY5MTgsInRlbGVmb25vIjozMjI3Mzg3ODY3LCJzYWxkb0Rpc3BvbmlibGUiOjAsImlkZW50aWRhZCI6MTA0NzM5NDIyNSwiaGFiaWxpdGFkb01vdG9TcGVlZHkiOmZhbHNlLCJ2YWxvckNhcnJlcmFEaWFyaW8iOjAsImhhYmlsaXRhZG9BcHAiOnRydWV9LCJpYXQiOjE1NzY2ODE1NTEsImV4cCI6MTU4MjcyOTU1MX0.3Po5PWBZ5bBPyXsZI3kHAFdZEt9TW12ZucLAWmoojUs'
        },
        success: function(respuesta) {
            console.log("respuesta", respuesta);

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "El usuario ha sido actualizado",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {

                    if (result.value) {

                        window.location = "usuarios-generales";

                    }

                });
            }
        }

    })

    if (estadoUsuario == 1) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Si');
        $(this).attr('estadoUsuario', 0);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('No');
        $(this).attr('estadoUsuario', 1);

    }

})

/*========================================
=            ELIMINAR USUARIO            =
========================================*/

$(document).on("click", ".btnEliminarPasajero", function() {

    var email = $(this).attr("email");

    console.log("email", email);

    $.ajax({
        url: 'https://us-central1-clubspeedy-dev.cloudfunctions.net/api/userDeleteWeb/',
        method: 'POST',
        async: true,
        accept: "application/json",
        crossDomain: true,
        dataType: 'json',
        data: { email: email }
    }).done(function(ok) {
        swal({
            title: '¿Está seguro de borrar el usuario?',
            text: "¡Si no lo está puede cancelar la accíón!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, borrar usuario!'
        }).then((result) => {
            if (result.value) {

                window.location = "usuarios-generales";

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

});

/*=====  End of ELIMINAR USUARIO  ======*/


/*=============================================
=            GUARDAR USUARIO GENERAL           =
=============================================*/

function guardarUsuarioGeneral() {

    var nombres = document.getElementById('nuevoNombres').value;
    var apellidos = document.getElementById('nuevoApellidos').value;
    var identificacion = document.getElementById('nuevaIdentificacion').value;
    var telefono = document.getElementById('nuevoTelefono').value;
    var email = document.getElementById('nuevoEmail').value;
    var contraseña = document.getElementById('nuevaContraseña').value;
    var avatar = document.getElementById('nuevaIdentificacion').value;
    var codigo1 = document.getElementById('codigo1').value;
    var codigo2 = document.getElementById('codigo2').value;


    $.ajax({
        url: 'https://us-central1-clubspeedy-dev.cloudfunctions.net/api/createUsers',
        //url: 'https://us-central1-mototaxi-e3065.cloudfunctions.net/api/userRegister',
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
            apellidos: apellidos,
            email: email,
            identidad: identificacion,
            telefono: telefono,
            codigoLider: codigo1,
            codigoPasajero: codigo2
        }
    }).done(function(resp) {

        swal({

            type: "success",
            title: "¡El Usuario ha sido creado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnconfirm: false
        }).then((result) => {
            if (result.value) {

                window.location = "usuarios-generales";

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


/*=====  End of GUARDAR USUARIO GENERAL ======*/



/*==============================================
=            EDITAR Pasajero           =
==============================================*/

//Editar registros

$(".tablas").on("click", ".btnModalEditarPasajero", function() {

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

    if (habilitadoCarroSpeedy) {
        document.getElementById("editarCarro").checked = true;
    } else {
        document.getElementById("editarCarro").checked = false;
    }

    if (habilitadoMotoSpeedy) {
        document.getElementById("editarMotoPasajero").checked = true;
    } else {
        document.getElementById("editarMotoPasajero").checked = false;
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

    $("#editarNombrePasajero").val(nombres);
    $("#editarTelefonoPasajero").val(telefono);
    $("#editarEmailPasajero").val(email);
    $("#editarIdentificacionPasajero").val(identificacion);
    $("#editarPasswordPasajero").val(password);
    $("#editarMunicipioPasajero").val(municipio);
    $("#editarMunicipioPasajero").html(municipio);
    $("#editarCodigoLider").val(codigo1);
    $("#editarPlacaMotoSpeedy").val(placaMoto);
    $("#editarPlacaCarroSpeedy").val(placaCarro);
    $("#editarSaldoMotoSpeedy").val(saldoMotoSpeedy);
    $("#editarSaldoCarroSpeedy").val(saldoCarroSpeedy);


    $("#btnEditarPasajero").click(function(event) {

        var nombres = document.getElementById('editarNombrePasajero').value;
        var telefono = document.getElementById('editarTelefonoPasajero').value;
        var email = document.getElementById('editarEmailPasajero').value;
        var identi = document.getElementById('editarIdentificacionPasajero').value;
        var password = document.getElementById('editarPasswordPasajero').value;
        var municipio = document.getElementById('editarMunicipioPasajero').value;
        var placaCarro = document.getElementById('editarPlacaCarroSpeedy').value;
        var placaMoto = document.getElementById('editarPlacaMotoSpeedy').value;
        var saldoMotoSpeedy = document.getElementById('editarSaldoMotoSpeedy').value;
        var saldoCarroSpeedy = document.getElementById('editarSaldoCarroSpeedy').value;

        if (document.getElementById("editarMotoPasajero").checked == true) {
            var habilitadoMotoSpeedy = true;
            var habilitadoTransportador = true;

        } else {
            var habilitadoMotoSpeedy = false;
            placaMoto = "";
            saldoMotoSpeedy = 0;
        }

        if (document.getElementById("editarCarro").checked == true) {
            var habilitadoCarroSpeedy = true;
            var habilitadoTransportador = true;

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

                    window.location = "usuarios-generales";

                }

            })

        }).fail(function(ok) {

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