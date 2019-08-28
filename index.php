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
		
	<?php 
		include_once("analyticstracking.php");
		
		
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
		 
		// echo $ruta_imagen;
		// echo $text_capcha;
		?>
	
	<!-- Menu -->
	<nav class="menu" id="theMenu">
	
							
		<div class="menu-wrap">
		
							
			<h1 class="logo"><a href="index.html#home">BROKERS CR</a></h1>
			<i class="fa fa-times menu-close"></i>
			<a href="#home" class="smoothScroll">Inicio</a>
			<a href="#about" class="smoothScroll">Acerca de</a>
			<a href="#portfolio" class="smoothScroll">Portafolio</a>
			<a href="#services" class="smoothScroll">Proyectos</a>
			<a href="#contact" class="smoothScroll">Cont&aacutectenos </a>
			<a href="login.php" class="smoothScroll">Ingresar </a>
			<a href="#"><i class="fa fa-facebook"></i></a>
		
		
			<a href="#contact"><i class="fa fa-envelope"></i></a>
			<a class="linkedin" target="black" href="https://www.linkedin.com/company/masterzon?trk=biz-companies-cym"><i class="fa fa-linkedin"></i></a>
		</div>
		
		<!-- Menu button -->
		<div id="menuToggle"><i class="fa fa-bars"></i></div>
	</nav>

	<section id="home" name="home"></section>
	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h1>BROKERS CAPITAL</h1>
				</div>
			</div><! --/row -->
		</div><! --/container -->
	</div><! --/headerwrap -->

	<div id="contactwrap">
		<div class="container">
			<div class="row">
		<!--	<div class="col-lg-6">
			<p>Encu&eacutentrenos en el Centro Comercial Sabana Sur,</p>
			<p>Local #56.</p>
			<p>
				<small>
				San José, Costa Rica.<br/>
				</small>
			</p>
			<p>
				<small>
				Teléfono + 506 4033 8771<br/>
				<br></small><br/><h1> Info@brokerscapitalcr.com </h1>
			</p>
			</div>
			-->	
			
	<?php
				
				if (isset($_POST['email']) and isset($_POST['nombre']) and isset($_POST['mensaje'])){
					
					$v_correo =$_POST['email'];
					$v_nombre =$_POST['nombre'];				 
					$v_mensaje =$_POST['mensaje'];
					$v_captura =$_POST['captura'];
					$v_capchaDB =$_POST['capchaDB'];
					
					
					//echo $v_capchaDB.'<p>';
					//echo $v_captura;
					//echo $v_mensaje;
					
					//para el envío en formato HTML
					$headers = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
						
					//dirección del remitente
					$headers .= "From: Brokerscapitalcr.com <info@brokerscapitalcr.com>\r\n";
						
					//direcciones que recibián copia
					$headers .= $v_correo;
		 
						
					$cuerpo = '
					<html>
					<head>					
						<title>BROKERS CAPITAL</title>
					</head>
					<body background="http://www.brokerscapitalcr.com/assets/img/fondo_brokers.png">
				 	 		
					<p><b>Su cometario fue : </b> '.$v_mensaje.'</p>
					<p><hr> </p>			  		
					</body>
					</html>
					';
				
					if ($v_capchaDB  ==  $v_captura)	{
					//Correo a MASTERZON.
					mail('info@brokerscapitalcr.com',"Nueva CONSULTA/COMENTARIO, desde Brokerscapitalcr.com",$cuerpo,$headers);
					
					//Correo al cliente indicando que la consulta fue canalizada y será atendida.
					mail($v_correo,"Gracias por su comentario, en breve le responderemos.","<b>".$cuerpo."</b>",$headers);
	
						echo '<label> Mensaje enviado correctamente, GRACIAS por escribirnos!</label> ';
					}else{
						echo '<label> Hubo un error con el captcha, vuelve a intentarlo por favor!</label> ';
					}
					
				 }
				?>
					 
			<div class="col-lg-6">
					  <form name="form1" method="post" action="index.php">
					
					  <div>
					    <label for="exampleInputName1">Su nombre</label>
					    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo por favor" value="<?php if (isset($_POST['nombre'])) {echo $v_nombre;}  ?>" required="required">
					    <label for="exampleInputEmail1">Su correo</label>
					    <input type="email" class="form-control" id="email" name="email" placeholder="Correo electronico" value="<?php if (isset($_POST['email'])) {echo $v_correo;}  ?>" required="required">
					    <label for="exampleInputText1">Mensaje</label><br>
					     <input type="text" height="200" class="form-control" name="mensaje" id="mensaje" placeholder="Su mensaje" value="<?php if (isset($_POST['mensaje'])) {echo $v_mensaje;}  ?>" required="required">
					  </div>
					  <br>
					   <button type="submit"  class="btn btn-default">Enviar comentario</button>  
					   <div class="col-lg-4">
					   <div class="input-group">
     
							<?php
								echo '<input type="text" height="200" class="form-control" name="captura" id="captura" placeholder="Captcha " value="" required="required">';
							?>
							<input type="hidden" name="capchaDB" value="<?php echo $text_capcha; ?>">
						   <span class="form-group input-group-btn">
							<button type="button" class="btn btn-default" name="cambio" id="cambio" onClick="window.location.reload();"> <i class="fa fa-refresh "></i></button>
						
						  </span>
						</div>
						<?php 
						 	echo "<img class='img-responsive' src='$ruta_imagen' height='100' width='250'> ";
						?>
						 </div>
					</form>
					
				</div>
			
			</div><! --/row -->
		</div><!-- /container -->
	</div>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
