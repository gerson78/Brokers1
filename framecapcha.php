	
		<?php 
		 
		include('cnx.php'); 
		
		if (!$con) {
				echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
				echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
				exit;
				}
		
		$time6 = time();
	   //print substr($time6, -1);
	   $idCapCha = substr($time6, -1);
		
		//VALIDACION PARA OBTENER EL CODIGO DEL VENDEDOR (CEDULA JURIDICA)
	 	$queryCAPCHA = "SELECT `cod_capcha`, `des_ruta_imagen`, `des_text_capcha`, `fec_modificacion`, `usr_modificacion` FROM `sis_datos_capcha` WHERE cod_capcha = '$idCapCha'";
		$resultCAPCHA  = mysqli_query($con , $queryCAPCHA) or die("Error en: $queryCAPCHA " . mysql_error());
	
		if($resultCAPCHA === FALSE) {
			die(mysql_error()); // TODO: better error handling
		}
	
		$rowCAPCHA = mysqli_fetch_array($resultCAPCHA, MYSQL_ASSOC);
		$ruta_imagen = $rowCAPCHA["des_ruta_imagen"];
		$text_capcha = $rowCAPCHA["des_text_capcha"];
		 
			 echo "<img class='img-responsive' src='$ruta_imagen' height='100' width='250'> ";
		?>