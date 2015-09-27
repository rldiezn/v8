 /*
      Realizado por:
         *
	 * Fecha:
     *
     * En este archivo debe estar todo lo relacionado con la interactividad de la pagina
     * Esta estructura corresponde a una separación en capas para un mejor
     * mantenimiento y entendimiento.
     *
     *  NOTA: ESTOS ARCHIVOS PUEDEN SER OPTIMIZADOS Y MODIFICADOS
     *
     */
$( document ).ready(function() {
  //Oculto el Div de Busqueda 
  ocultarElem();

  //Preparo Evento : Mostrar Listado
  $( "#caja-fle" ).click(function() {
    $( "#cont-list-modelo" ).toggle( "slow" );
    
  });

  //Preparo Evento : Mostrar Listado
  $( ".nomModeloClic" ).click(function() {
    var modeloSeleccionar = $( this ).attr( "id" );
    $("#inpModelo").val(modeloSeleccionar);
    $("#inpNombreModelo").val(modeloSeleccionar);
  });

//Preparo Evento : Mostrar Almacenar primero valores BD
  $( "#btFinalizar" ).click(function() {
    //Capturo Datos    
    var inpNombreModelo = $("#inpNombreModelo").val();
    var inpKm = $("#inpKm").val();
    var inpColor = $("#inpColor").val();
    var inpRevision = $("#inpRevision").val();
    var inpDesc = $("#inpDesc").val();
    var inpPrecio = $("#inpPrecio").val();
    var inpFoto = $("#inpFoto").val();
    
    var inpNombre = $("#inpNombre").val();
    var inpCorreo = $("#inpCorreo").val();
    var inpTelefono = $("#inpTelefono").val();
    var inpAcepta = $("#inpAcepta").val();


    
    //Parametros de Funcion
    var divCont = "resul";
    var parametro = "cases=1&inpModelo="+inpNombreModelo+"&inpKm="+inpKm+"&inpColor="+inpColor+"&inpRevision="+inpRevision+"&inpDesc="+inpDesc+"&inpPrecio="+inpPrecio+"&inpFoto="+inpFoto+"&inpNombre="+inpNombre+"&inpCorreo="+inpCorreo+"&inpTelefono="+inpTelefono+"&inpAcepta="+inpAcepta;
    var url = "./php/function.php";
    ajaxContenedor(divCont, parametro, url);
    
    
  });


  





});

/*
**  Definicio de Funciones
**
*/


/* Nombre Funcion : ocultarElem
   Parametros: ninguno
   Salida    : ninguno
   Descrip   : Permite ocultar ciertos elementos 
*/

function ocultarElem(){
	$("#cont-list-modelo").hide();
}



/* Nombre Funcion : ajaxContenedor
   Parametros: divCont, parametro, url
   Salida    : arreglo
   Descrip   : Permite realizar comunicaciones asincronas
*/

function ajaxContenedor(divCont, parametro, url){
    $.ajax({
        type: "POST",
        url: url,
        data:parametro,
        beforeSend: function(datos){
          
        },
        success: function(datos){
            $("#"+divCont).html(datos);
            $("#"+divCont).css("display", "block");
        },
        error: function(datos,falla){
            $("#"+divCont).html('Error de Conexion.');
        }
    });
}
