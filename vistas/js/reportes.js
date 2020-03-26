
console.log("cargarDataTableReportes");
/*=============================================
VARIABLE LOCAL STORAGE
=============================================*/

if(localStorage.getItem("capturarRango") != null){

	$("#daterange-btn span").html(localStorage.getItem("capturarRango"));

}else{

	$("#daterange-btn span").html('<i class="fa fa-calendar"></i> Rango de fecha');

}



/*=============================================
RANGO DE FECHAS
=============================================*/

$('#daterange-btn').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY/MM/DD');

    var fechaFinal = end.format('YYYY/MM/DD');

    var capturarRango = $("#daterange-btn span").html();
    console.log("capturarRango", capturarRango);
   
   	localStorage.setItem("capturarRango", capturarRango);

   	window.location = "index.php?ruta=transportadores&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

	localStorage.removeItem("capturarRango");
	localStorage.clear();
	window.location = "transportadores";
})

/*=============================================
CAPTURAR HOY
=============================================*/
$(".daterangepicker.opensleft .ranges li").on("click", function(){

	var textoHoy = $(this).attr("data-range-key");

	if(textoHoy == "Hoy"){

		var d = new Date();
		
		var dia = d.getDate();
		var mes = d.getMonth()+1;//en javascript me arroja solo 11 meses asi que le sumamos 1
		var año = d.getFullYear();

		dia = ("0"+dia).slice(-2);
		mes = ("0"+mes).slice(-2);

		var fechaInicial = año+"/"+mes+"/"+dia;
		var fechaFinal = año+"/"+mes+"/"+dia;	

    	localStorage.setItem("capturarRango", "Hoy");

    	window.location = "index.php?ruta=transportadores&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

	}

})

/*===============================================
=            TABLA DINAMICA REPORTES            =
===============================================*/
$('#email').change(function(){
  $('.tabla_reportes').dataTable().fnDestroy();
  var email = $(this).val();

  cargarDataTableReportes(email);
})

function cargarDataTableReportes(email){

  var email = email;
  console.log("email", email);

  var url = "https://us-central1-clubspeedy-dev.cloudfunctions.net/api/totalComision";

  $('.tabla_reportes').DataTable({
      "ajax":{
        "url": url,
        "method": 'POST',
        "data": {email: email}
      },
      "columns": [
        { "data": "valorFinal" },
        { "data": "tipo" },
        { "data": "municipio" },
        { "data": "descripcion" },
        { "data": "descripcionOrigen" },
        { "data": "descripcionDestino" },
        { "data": "fechaCreacion" },
        { "data": "fechaActualizacion" },
        { "data": "emailPasajero" }
      ]
  });
};

/*=====  End of TABLA DINAMICA REPORTES  ======*/
