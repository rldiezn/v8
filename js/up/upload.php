<?php
//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{

	//obtenemos el archivo a subir
	$file = $_FILES['archivo']['name'];

	//si no es así, lo creamos
	$destino =  "images/img/";

	//comprobamos si el archivo ha subido
	if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"images/img/".$file))
	{
	   sleep(3);//retrasamos la petición 3 segundos
	   echo $file;//devolvemos el nombre del archivo para pintar la imagen

	}
}else{
	throw new Exception("Error Processing Request", 1);
}


function obtenerExtensionFichero($str){
    return (explode(".", $str));
}

?>