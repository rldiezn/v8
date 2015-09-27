<?php

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
	// define("DIRECCION","localhost");
	// define("USUARIO","root");
	// define("CLAVE","");
	// define("BASEDEDATOS","bocho_bd");

	define("DIRECCION","localhost");
	define("USUARIO","root");
	define("CLAVE","");
	define("BASEDEDATOS","bocho_bd");


	/*	Esta función permite conectarse a una base de datos, recibe:
			- La dirección ip dónde se encuentra la base de datos
			- El nombre de usuario de base de datos,
			- La contraseña del usuario
			- El nombre de la base de datos
		Retorna un identificador de conexión y se lleva a cabo con éxito
			de lo contrario retorna false
	*/

	    function bd_conectar($direccion,$usuario,$clave,$basededatos){
				$conexion =  mysqli_connect($direccion,$usuario,$clave);

				// $conexion =  mysql_connect('localhost', 'hotdot2', 'hotdot2');
				if (!$conexion) {
		 		   die('Could not connect: ' . mysql_error());
				}
				//mysql_query("SET NAMES 'utf8'");
				//mysqli_set_charset($conexion, 'utf8');
				$bd = mysqli_select_db($conexion, $basededatos);
				//$bd = mysql_select_db($basededatos, $conexion);
				if ($bd)
					return $conexion;
				else
					return false;
		}

	/*Esta función permite ejecutar un Data Manipulation Language, es decir,
		un update, insert o delete
		Recibe:
			$conexion: un id de conexión válida
			$consulta: una consulta update, insert o delete;
		Retorna un valor numérico:
			-1: si hay un error en la consulta
			0..n: el número de filas afectadas si se ejecuta la consulta
	*/

		function ejecutar_DML($conexion, $consulta, $valor){
			 $r = mysqli_query($conexion, $consulta);         //devuele true o false
			//$r = mysql_query($consulta, $conexion);
			$id     = mysqli_insert_id($conexion); 	
			$total  = mysqli_affected_rows($conexion);
			$retVal = ($valor == true) ? $id : $total;
			
			return $retVal;

		}

	/*Esta función permite ejecutar un Data Query Language, es decir, un select
		Recibe:
			$conexion: un id de conexión válida
			$consulta: una consulta update, insert o delete;
		Retorna un valor numérico:
			-1: si hay un error en la consulta
			arreglo bidimencional: con el resultado de la consulta
	*/

		function ejecutar_DQL($conexion, $consulta){

			$r = mysqli_query($conexion, $consulta);         //devuele true o false
			//$r = mysql_query($consulta, $conexion);
			if ($r){   //si retorna data

				 $filas = mysqli_num_rows($r);
				//$filas = mysql_num_rows($r);

				for ($i = 1; $i <= $filas; $i++){
					 $arr[] = mysqli_fetch_array($r, MYSQL_ASSOC);
					//$arr[] = mysql_fetch_array($r, MYSQL_ASSOC);
				}

				if(isset($arr)){
	                return $arr;
				}else{
	            	return -3;
				}
			}else{
	            return -1;
			}
		}

 	} catch (Exception $e) {
  echo 'Refrescar el Navegador: ';
}
?>
