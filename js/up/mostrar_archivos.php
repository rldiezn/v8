<?php
$directorio_escaneado = scandir('images/img/');
$archivos = array();
$token    = $_GET["token"];

foreach ($directorio_escaneado as $item) {
    if ($item != '.' and $item != '..') {

        $NOM = explode("_", $item);

        if ($token == $NOM[0]){
        	$archivos[] = $item;
        }

    }
}
echo json_encode($archivos);
?>
