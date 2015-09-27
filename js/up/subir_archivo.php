<?php
//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{

	//obtenemos el archivo a subir
	$file = $_FILES['archivo']['name'];

	//si no es así, lo creamos
	$destino =  "images/img/";

	$archivo = $_FILES['archivo'];
	$extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
	$time = time();
	$token = $_GET['token'];
    $nombre = $token."_".$time.".".$extension;

	//comprobamos si el archivo ha subido
	if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"images/img/".$nombre))
	{
	   echo 1;

	}else {
        echo 0;
    }
}else{
	throw new Exception("Error Processing Request", 1);
}


?>
