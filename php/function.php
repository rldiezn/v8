<?php
    include("conn.php");
    /*
      Realizado por:

         *
	 * Fecha:
     *
     * En este archivo debe estar todo lo relacionado con el manejador de base
     * de datos MySQL, es decir, si se desea cambiar al manejador PostgreSQL,
     * lo único que debe ser necesario cambiar es este archivo,
     * por ConexionPostgreSQL.php (ejemplo) el cual debe contener los mismos
     * métodos con diferentes implementaciones(las relacionadas a postgreSQL).
     *
     * Esta estructura corresponde a una separación en capas para un mejor
     * mantenimiento y entendimiento.
     *
     *  NOTA: ESTOS ARCHIVOS PUEDEN SER OPTIMIZADOS Y MODIFICADOS
     *
     */

    /*
     * Las siguientes definiciones de constantes se pueden usar de forma directa
     * sin anteponer el símbolo $.
    */
try {

 /* Función permite obtener el admin de la pagina
        @Recibe:  $codigo
        @Retorna: arreglo
    */
    function  admin_contenido($pagina){

        $conexion = bd_conectar(DIRECCION,USUARIO,CLAVE,BASEDEDATOS);

        if (!$conexion){
            return "Error de Conexion.";
        }else{
            $sql = "SELECT * FROM  `bocho_bd`.`admin_contenido` AS admin WHERE admin.pagina = '".$pagina."'";
        }

        $r = ejecutar_DQL($conexion,$sql);
        return $r;
    }

    /* Función permite obtener el admin de la pagina
        @Recibe:  $codigo
        @Retorna: arreglo
    */
    function  buscar_admin_contenido($detalle,  $busqueda){
        $indice = null;
        $total =  count($detalle);
        for ($i=0; $i<$total; $i++){
            $clave = array_search($busqueda, $detalle[$i]); // $clave = 2;
            if ($clave){
                $indice = $i;
                break;
            }
         } 

        return ($indice == null )? "No hay Valor" : $detalle[$indice]["descripcion"];
        
    }

    /* Función permite insertar Datos Bocho
        @Recibe:  $nom_vendedor, $correo, $tlf_vendedor, $terminos, $modelo, $km, $color, $ultima_rev, $desc, $foto1, $foto2, $precio, $cont
        @Retorna:  entero
    */
    function  insertar_bocho($modelo, $km, $color, $ultima_rev, $desc, $foto1, $foto2, $precio){

        $conexion = bd_conectar(DIRECCION,USUARIO,CLAVE,BASEDEDATOS);

        if (!$conexion){
            return "Error de Conexion.";
        }else{
             $sql = "INSERT INTO `bocho_bd`.`ofertas` (`modelo`, `km`, `color`, `ultima_rev`, `desc`, `foto1`, `foto2`, `precio`) 
                                               VALUES ('".$modelo."', '".$km."', '".$color."', '".$ultima_rev."', '".$desc."', '".$foto1."', '".$foto2."', '".$precio."');";
            
             $r = ejecutar_DML($conexion,$sql, true);
    
            return $r;
        }
    }


    function insertar_vendedor($id_bocho, $nom_vendedor, $correo, $tlf_vendedor){

        $conexion = bd_conectar(DIRECCION,USUARIO,CLAVE,BASEDEDATOS);

        if (!$conexion){
            return "Error de Conexion.";
        }else{
             $sql = "UPDATE `bocho_bd`.`ofertas` SET `nom_vendedor` = '".$nom_vendedor."', `correo` = '".$correo."', `tlf_vendedor` = '".$tlf_vendedor."', `terminos` = '1' WHERE `ofertas`.`codigo` = ".$id_bocho;
             $r = ejecutar_DML($conexion,$sql, false);
    
            return $r;
        }
 
    }

    /* Función permite obtener el detalle del vocho
        @Recibe:  $codigo
        @Retorna: arreglo
    */
    function  detalle_vocho($codigo){

        $conexion = bd_conectar(DIRECCION,USUARIO,CLAVE,BASEDEDATOS);

        if (!$conexion){
            return "Error de Conexion.";
        }else{
            $sql = "SELECT * FROM  `ofertas` LIMIT 0 , 30";
        }

        $r = ejecutar_DQL($conexion,$sql);
        return $r;
    }


    /* Esta funcion permite validar las sql inyeccion
        @Recibe: $mensaje
        @Retorna: arreglo
    */
    function validarInyeccion($mensaje){
        $nopermitidos = array("'",'\\','<','>','&lt;','&gt;',"\"", '&ntilde;');
        $mensaje = str_replace($nopermitidos, "", $mensaje);
                $Value = strtoupper(trim($mensaje));
                return utf8_decode(htmlentities($Value, ENT_QUOTES, 'UTF-8'));
    }


///////////////////////////////////// PROCESOS ///////////////////////////////////////////////
//VALIDAR BLOQUE DE CONTROL, PERMITE ANULAR EL ERROR DE RECIBIR UN PARAMETRO CUANDO NO SE INDICA NADA
        if(isset($_REQUEST["cases"])){
             $cases = $_REQUEST["cases"];
        }else{
             $cases = null;
        }
    switch ($cases){
        case 1:         
            $modelo       = validarInyeccion($_POST["inpNombreModelo"]);
            $km           = validarInyeccion($_POST["inpKm"]);
            $color        = validarInyeccion($_POST["inpColor"]);
            $ultima_rev   = validarInyeccion($_POST["inpRevision"]);
            $desc         = validarInyeccion($_POST["inpDesc"]);
            $precio       = validarInyeccion($_POST["inpPrecio"]);

             $foto1  = validarInyeccion($_POST["iNombreFile"]);
            // $foto2  = validarInyeccion($_POST["inpFoto"]);
            // $precio = validarInyeccion($_POST["inpPrecio"]); 
          
            
            $foto2 ="carro.png";

            //SQL = INSERTO DATOS VOCHO
            $insert =  insertar_bocho($modelo, $km, $color, $ultima_rev, $desc, $foto1, $foto2, $precio);

            if($insert > 0){
                $result["status"] = "success";
                $result["id"] = $insert;
            } else {
                $result["status"] = "error";
                $result["msg"] = "Ha ocurrido un error al crear el registro";
            }
            echo json_encode($result);
            
        break;
        case 2:

            $nom_vendedor = validarInyeccion($_POST["inpNombre"]);
            $correo       = validarInyeccion($_POST["inpCorreo"]);
            $tlf_vendedor = validarInyeccion($_POST["inpTelefono"]);
            $id_bocho     = validarInyeccion($_POST["id_bocho"]);
            //SQL = INSERTO DATOS VOCHO
            $insert =  insertar_vendedor($id_bocho, $nom_vendedor, $correo, $tlf_vendedor);

            print_r($insert); exit; 

            if($insert > 0){
                $result["status"] = "success";
                $result["id"] = $insert;
            } else {
                $result["status"] = "error";
                $result["msg"] = "Ha ocurrido un error al crear el registro";
            }
            
           
            echo json_encode($result);
        break;
        
    }

 	} catch (Exception $e) {
  echo 'Refrescar el Navegador: ';
}
?>
