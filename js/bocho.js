jQuery(document).ready(function(){
	//AGREGAR REGLAS EN VALIDATE
	$.validator.addMethod("correo", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
    });

	

	// $("#btnBocho").click(function(){
	// 	var posicion = $("#contact").offset().top;			
	// 	$("html, body").animate({scrollTop:posicion+"px"});
	// });

	// Configura las validaciones del formulario por medio se jQuery Validate.
	$('#form_bocho').validate({
		errorElement: 'label',
		success: "valid",
		rules: {
			inpNombreModelo: {
				required: true,
			},
			inpKm: {
				required: true,
			},
			inpColor: {
				required: true,
			},
			inpRevision: {
				required: true,
			},
			inpDesc: {
				required: true,
			},
			inpPrecio: {
				required: true,
			},
		},
		messages: {
			inpNombreModelo: {
			    required:'Por favor Ingrese el Nombre del Modelo.',
			},
			inpKm: {
				required:'Por favor Ingrese el  kilometraje Recorrido.',
			}, 
			inpColor: {
			    required:'Por favor Ingrese el color del Vehiculo.',
			},
			inpRevision: {
				required:'Por favor Ingrese la fecha de la ultima revision.',
			},
			inpDesc: {
				required:'Por favor Ingrese alguna descripción del vehiculo.',
			},
			inpPrecio: {
				required:'Por favor Ingrese el precio considerando para su venta.',
			},
		},
		submitHandler: function(form) {
			var parametros = $( "#form_bocho" ).serialize();
            var caso = "&cases=1";
            var paran = parametros + caso;

            $.ajax({
              type: "POST",
              url: "http://indesol-local.com/vocho/php/function.php",
              data: paran,
              success: function(data){
				var data = JSON.parse(data);//tranforme
	                if(data.status=="success"){
	                  // Cambiar el ID
	                  $('#btnBocho').fadeOut();
	                  $('#module-msj').html("<div id='module-success' class='alert alert-success' role='alert'>Datos Almacenados Exitosamente</div>").fadeIn();
	                  $('#id_bocho').val(data.id);
	                  //Scroll para el otro Formulario
	                  var posicion = $("#contact").offset().top;			
					  $("html, body").animate({scrollTop:posicion+"px"});

	                } else {
	                  $('#module-msj').html("<div id='module-warning' class='alert alert-danger' role='alert'>"+data.msg+"</div>").fadeIn();
	                }
              },
              error: function(datos,falla){
                alert("Ha ocurrido un error en la aplicacion. Por favor reporta el incidente al Area de TI");
              },
              complete: function(datos){
                $('.loading-form').html('').fadeOut();
              },
              // dataType: 'json'
            });//fin ajax

          }
		
	});

 $("#btnVendedor").click(function(){
	
 		var inpNombre = $("#inpNombre").val();
 		var inpCorreo = $("#inpCorreo").val();	
 		var inpTelefono = $("#inpTelefono").val();		

 		if( $("#inpNombre").val().length == 0) {

 			$("#inpNombre-id").html("Ingrese un Nombre.");


 		}else if($("#inpCorreo").val().length == 0){

 			$("#inpCorreo-id").html("Ingrese un Correo.");

 		}else if ($("#inpTelefono").val().length == 0) {

			$("#inpTelefono-id").html("Ingrese un Telefono.");
		

 		}else{
 			$("#inpNombre-id").html(" ");
 			$("#inpCorreo-id").html(" ");
 			$("#inpTelefono-id").html(" ");

	 		var parametros = $( "#form_vendedor" ).serialize();
	        var caso = "&cases=2";
	        var paran = parametros + caso;
	        $.ajax({
	          type: "POST",
	          url: "http://indesol-local.com/vocho/php/function.php",
	          data: paran,
	          success: function(data){
              // console.log(data); 

				 if(data.status=="success"){
	                  // Cambiar el ID
	                 mostrarModal('Mensaje Operacion', ' Datos Alamcenados correctamente, pronto nos pondremos en contacto con usted.',  'type-danger', [ {
		                label: 'Aceptar',
		                cssClass: 'btn-success',
		                action: function(dialogItself){
		                     //Scroll para el otro Formulario
	                  		var posicion = $("#front").offset().top;			
					  		$("html, body").animate({scrollTop:posicion+"px"});
		                    dialogItself.close();
		                }
		            } ]);

	                } else {

		               mostrarModal('Mensaje Operacion', ' Datos Alamcenados correctamente, pronto nos pondremos en contacto con usted.',  'type-danger', [ {
		                label: 'Aceptar',
		                cssClass: 'btn-success',
		                action: function(dialogItself){
		                     //Scroll para el otro Formulario
	                  		var posicion = $("#front").offset().top;			
					  		$("html, body").animate({scrollTop:posicion+"px"});
		                    dialogItself.close();
		                }
		            } ]);
		                  
	                }


	          },
	          error: function(datos,falla){
	            alert("Ha ocurrido un error en la aplicacion. Por favor reporta el incidente al Area de TI");
	          },
	          complete: function(datos){
	            $('.loading-form').html('').fadeOut();
	          },
	          //dataType: 'json'
	        });//fin ajaxalert("prueba");

 		}

 });



//////////////////////////////////////////////////////////////////////////////////////////////////////////
// CASE : 008  /////////////////////---------------SUBIR FOTOS -----------////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

     //$(".messages").hide();
	//queremos que esta variable sea global
	var fileExtension = "";
	//función que observa los cambios del campo file y obtiene información
	$(':file').change(function()
	{
		//obtenemos un array con los datos del archivo
		var file = $("#imagen")[0].files[0];
		//obtenemos el nombre del archivo
		var fileName = file.name;
		//obtenemos la extensión del archivo
		fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
		//obtenemos el tamaño del archivo
		var fileSize = file.size;
		//obtenemos el tipo de archivo image/png ejemplo
		var fileType = file.type;
		//mensaje con la información del archivo
		showMessage("<span class='msjinfo'>Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
	});
        

	
  //al enviar el formulario
  $('#bSubirFoto').click(function(){

    var url   = document.URL;
    var myarr = url.split("/");
    
    //información del formulario
    var iNombreFile   = $("#iNombreFile").val();
    var formData      = new FormData($("#form_bocho")[0]);
    var message       = ""; 
    var file          = $("#imagen")[0].files[0];
    var fileName      = file.name;
    //obtenemos la extensión del archivo
    var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
    var ruta = "http://indesol-local.com/vocho/images/bocho";
    //hacemos la petición ajax  
                
      if(iNombreFile == undefined || fileName == '' || fileExtension == '' || isImage(fileExtension)  == false ){
        message = $("<span class='msjerror'>Debe Adjuntar una imagen</span>");
        showMessage(message)
    }else{
                
      		$.ajax({
        			url: 'http://indesol-local.com/vocho/upload.php',  // leonard 
        			type: 'POST',
        			// Form data
        			//datos del formulario
        			data: formData,
        			//necesario para subir archivos via ajax
        			cache: false,
        			contentType: false,
        			processData: false,
        			//mientras enviamos el archivo
        			beforeSend: function(){
        			    message = $("<span class='msjalerta'>Subiendo la imagen, por favor espere...</span>");
        			    showMessage(message)     	
        			},
        			//una vez finalizado correctamente
        			success: function(data){
        			    message = $("<span class='msjactivo'>La imagen ha subido correctamente.</span>");
        			    showMessage(message);
        			    if(isImage(fileExtension))
        			    {   $("#iNombreFile").val(data); 
        			        $(".showImage").html("<img src='"+ruta+"/"+data+"' width='100px' height='100px' />");
        			    }
        			},
        			//si ha ocurrido un error
        			error: function(){
        			    message = $("<span class='msjerror'>Ha ocurrido un error.</span>");
        			    showMessage(message);
        			}
      		});
      }
	});

});//fin dela jax

//como la utilizamos demasiadas veces, creamos una función para 
//evitar repetición de código
function showMessage(message){
	$(".messages").html("").show();
	$(".messages").html(message);
}

//comprobamos si el archivo a subir es una imagen
//para visualizarla una vez haya subido
function isImage(extension)
{
	switch(extension.toLowerCase()) 
	{
	    case 'jpg': case 'gif': case 'png': case 'jpeg':
	        return true;
	    break;
	    default:
	        return false;
	    break;
    }
}


/*Muestra el dialogo de JQuery con el título, el mensaje y los botones especificados
 @Recibe  : titulo : titulo mensaje; pmensaje:mensaje a mostrar; botones: nombre del boton
 @Retorna : false or true
 */
function mostrarModal(titulo, mensaje, type, botones){
    BootstrapDialog.show({
        title: titulo,
        message: mensaje,
        closable: false,
        buttons: botones,
        type: type
    });
}
