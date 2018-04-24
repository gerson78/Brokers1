<?php
SESSION_START();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PIONEROS EN FINTECH EN COSTA RICA">
    <meta name="author" content="BROKERS CAPITAL COSTA RICA">
    <link rel="shortcut icon" href="assets/img/ICO1.ico">

    <title>BROKERS CAPITAL CR</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

 <body data-spy="scroll" data-offset="0" data-target="#theMenu">
<?php include_once("analyticstracking.php") ?>
<?php

include('cnx.php'); 
	
	if (!$con) {
    echo "Error: No se pudo conectar a MySQL ." . PHP_EOL;
    echo "errno de depuracin: " . mysqli_connect_errno() . PHP_EOL;
    exit;
	}
	
		if (isset ($_POST['cboClientes'])) { 
		$Val_cboClientes = $_POST['cboClientes'];
		//echo $Val_cboClientes;
		}

			 
		//VALIDACION PARA OBTENER EL CODIGO DEL VENDEDOR (CEDULA JURIDICA)
		if ($resultado = $con->query("SELECT val_parametro FROM sis_parametros WHERE cod_parametro = 'SIS015'")) {
			$myrow = $resultado->fetch_array(MYSQLI_ASSOC);
			$valor = $myrow["val_parametro"];
			$resultado->close();
		}
		
		//Se definen los valores de la session de usuario.
				$_SESSION['start'] = time(); // Taking now logged in time.
				//echo '$_SESSION[start]'.$_SESSION['start'].'<p>';
		// Ending a session in 30 minutes from the starting time.
				$_SESSION['expire'] = $_SESSION['start'] + ($valor * 60);
				//echo  '$_SESSION[expire]'.$_SESSION['expire'].'<p>';
		  
	if(trim($_POST["usuario"]) != "" && trim($_POST["password"]) != "")
		{
		$usuario = strtolower(htmlentities($_POST["usuario"],ENT_QUOTES));

		$password = $_POST["password"];
	
		
		if ($resultado = $con->query("SELECT cod_usuario, cod_clave, des_nombre, des_apellido1, num_identificacion, cod_perfil FROM sis_usuarios WHERE ind_estado = 'A' and cod_usuario = '$usuario' LIMIT 1")) {
			
			$passwordDB="vacio";
		while($row = $resultado->fetch_array(MYSQLI_ASSOC))
			{
				$_SESSION["k_username"] = $row["cod_usuario"];
				$nombre = $row["des_nombre"];
				$apellido = $row["des_apellido1"];
				$id_usuario = $row["num_identificacion"];
				$perfil = $row["cod_perfil"];
				
				if ($resultado){
				$passwordDB = $row['cod_clave'];
				}else{
					$passwordDB="";
				}
			}
			$resultado->close();
		}else{
			exit();
			echo $con->error;
		}

 
			
		
		if ($resultado){

			if (trim($passwordDB) == trim($password)){
				
				
				//Se verifica el vencimiento de la session activa de usuario.
				 $now = time(); // Checking the time now when home page starts.

	
				if ($now > $_SESSION['expire']) {
					session_destroy();
					 echo "<div class='text-center'>  Su session a expirado! Valida tu usuario nuevamente en <a href='login.php'>login</a>. </div>";
				}else{
				
				if (isset ($_SERVER["HTTP_CLIENT_IP"])) 
				{
					$dir_IP = $_SERVER["HTTP_CLIENT_IP"];
				}elseif (isset ($_SERVER["HTTP_X_FORWARDED_FOR"]))
				{
					$dir_IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
				}else{
				
					$dir_IP = $_SERVER["REMOTE_ADDR"];
				}
						
				$info=detect();
				
				//echo "Sistema operativo: ".$info["os"];
				//echo "Navegador: ".$info["browser"];
				//echo "Versi�n: ".$info["version"];
				//echo $_SERVER['HTTP_USER_AGENT'];
				
				$so = $info["os"];
				$version = $info["version"];
				$nav = $info["browser"];
				
				$SQL_bitacora = "INSERT INTO `sis_bitacora_accesos`(`fec_hora_acceso`, `cod_usuario`, `num_direccion_ip`, `des_navegador`, `des_version_navegador`, `des_sistema_operativo`, `des_archivo`)
				VALUES (now(),'$usuario', '$dir_IP','$nav','$version','$so','validar_usuario.php')";
				
				if (mysqli_connect_errno()) {
					printf("FallO la conexiOn: %s\n", mysqli_connect_error());
					exit();
				}else{
					$result_bitacora = mysqli_query($con,$SQL_bitacora) or die("Error en: $SQL_bitacora " . mysql_error());
				}
					
				
				if($result_bitacora === FALSE) {
					die(mysql_error()); // TODO: better error handling
				}
				
				
				//Validacion para saber si usaurio es ejecutivo activo.
				//VALIDACION PARA OBTENER EL CODIGO DEL VENDEDOR (CEDULA JURIDICA)
				if ($resultado = $con->query("SELECT `num_cedula`, `nom_ejecutivo`, `des_nick_name`, `cod_estado`, `des_email_1`, `des_email_2`, `des_telefono`
				FROM `sis_ejecutivos` WHERE num_cedula = '$id_usuario' AND cod_estado = 'A'")) {
					$rowValidaEjec = $resultado->fetch_array(MYSQLI_ASSOC);
					$num_cedula_ejec = $rowValidaEjec["num_cedula"];
					$nick_ejecutivo = $rowValidaEjec["des_nick_name"];
					$resultado->close();
				}

				
		  
				?>
	 <nav class="menu" id="theMenu">
	
							
		<div class="menu-wrap">
		
							
			<h1 class="logo"><a href="index.html#home">BROKERS CR</a></h1>
			<i class="fa fa-times menu-close"></i>
			<a href="index.php#home" class="smoothScroll">Inicio</a>
			<a href="index.php#about" class="smoothScroll">Acerca de</a>
			<a href="index.php#portfolio" class="smoothScroll">Portafolio</a>
			<a href="index.php#services" class="smoothScroll">Proyectos</a>
			<a href="index.php#contact" class="smoothScroll">Cont&aacutectenos </a>
			<a href="logOut.php" class="smoothScroll">Salir </a>
			<a href="#"><i class="fa fa-facebook"></i></a>
		
		
			<a href="#contact"><i class="fa fa-envelope"></i></a>
			<a class="linkedin" target="black" href="https://www.linkedin.com/company/masterzon?trk=biz-companies-cym"><i class="fa fa-linkedin"></i></a>
		</div>
		
		<!-- Menu button -->
		<div id="menuToggle"><i class="fa fa-bars"></i></div>
	</nav>
	
	
     <div class="text-center col-sm-8 col-sm-offset-2">
    <?php
				
						echo '<h2><spam>'.$nombre.'</spam>, que haremos hoy?</h2>';
				?>
	 </div>
	<section id="home" name="home"></section>
	<div id="panel">
    <div class="container">
     
		<div class="text-center our-services">
		
		
			<div class="row">
					<div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms"	data-wow-delay="300ms">
						
			
						
							<div class="service-info">
							
							<p><?php require('indicador1.php');?> </p>
						</div>
				
						<div class="service-info">
							
							<p><?php require('indicador1.php');?> </p>
						</div>
				
						
						
					</div>
				
						
					<div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms"	data-wow-delay="550ms">
						<div class="service-info">
							
							<p><?php require('indicador1.php');?> </p>
						</div>
						
						<div class="service-info">
							
							<p><?php require('indicador1.php');?> </p>
						</div>
						
					</div>
					
				
						
						<div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms"	data-wow-delay="550ms">
						<div class="service-info">
							
							<p><?php require('indicador1.php');?> </p>
						</div>
						
						<div class="service-info">
							
							<p><?php require('indicador1.php');?> </p>
						</div>
						
						
					</div>
					
						
						
					 <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="850ms">
					<div class="service-info">
							
							<p><?php require('indicador1.php');?> </p>
						</div>
						
						<div class="service-info">
							
							<p><?php require('indicador1.php');?> </p>
						</div>
			
					</div> 
	
				
				<div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="650ms">
				<div class="service-info">
							
							<p><?php require('indicador1.php');?> </p>
						</div>
				</div> 
					
					<div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="750ms">
					<div class="service-info">
							
							<p><?php require('indicador1.php');?> </p>
						</div>
					</div>
        
				<div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
						<div class="service-info">
							
							<p><?php require('indicador1.php');?> </p>
						</div>
					</div>
	
					<div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
						<div class="service-info">
							
							<p><?php require('indicador1.php');?> </p>
						</div>
					</div>
				
					
			</div>    

		
		</div>
    </div>
 
  </section><!--/#services-->
  	
				<?php
			}
			}else{
				SESSION_DESTROY();
				echo '<h2>Password incorrecto'.'</h2>';
				echo '<p><a href="login.php">Login</a></p>';
				}
		
		}else{ 
			SESSION_DESTROY();
		echo '<h2>Usuario no existe en la base de datos</h2>'; 
		}
		mysqli_free_result($result);		
	}else{ 	
		SESSION_DESTROY();
	echo '<h2>Debe especificar un usuario y password</h2>'; 	
	echo '<p><a href="login.php">Login</a></p>';
	}
	mysqli_close($con);

?>

     	<?php 
     	/**
     	 * Funcion que devuelve un array con los valores:
     	 *	os => sistema operativo
     	 *	browser => navegador
     	 *	version => version del navegador
     	 */
     	function detect()
     	{
     		$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
     		$os=array("WIN","MAC","LINUX");
     	
     		# definimos unos valores por defecto para el navegador y el sistema operativo
     		$info['browser'] = "OTHER";
     		$info['os'] = "OTHER";
     	
     		# buscamos el navegador con su sistema operativo
     		foreach($browser as $parent)
     		{
     			$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
     			$f = $s + strlen($parent);
     			$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
     			$version = preg_replace('/[^0-9,.]/','',$version);
     			if ($s)
     			{
     				$info['browser'] = $parent;
     				$info['version'] = $version;
     			}
     		}
     	
     		# obtenemos el sistema operativo
     		foreach($os as $val)
     		{
     			if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
     				$info['os'] = $val;
     		}
     	
     		# devolvemos el array de valores
     		return $info;
     	}
     	?>
    <footer id="footer">
 	 <div class="container text-center">
  
        <hr>
  			<div> <p>&copy; Copyright 2016 Brokers Capital CR S.A.</p></div>
    	<div class="social-icons">
          <ul>
         	<li><a class="linkedin" target="black" href="https://www.linkedin.com/company/masterzon?trk=biz-companies-cym"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>  
      </div> 
          
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
     
    </div>  
  </footer>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="assets/js/classie.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/smoothscroll.js"></script>
	<script src="assets/js/jquery.stellar.min.js"></script>
	<script src="assets/js/fancybox/jquery.fancybox.js"></script>    
	<script src="assets/js/main.js"></script>
		<script>
		$(function(){
			$.stellar({
				horizontalScrolling: false,
				verticalOffset: 40
			});
		});
		</script>
		
		<script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });
	   </script>

  </body>	
</html>