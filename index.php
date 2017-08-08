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
			<a href="#contact" class="smoothScroll">Cont&aacutectenos</a>
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
	
	<section id="about" name="about"></section>
	<div id="aboutwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 name">
				
					     
					     <MARQUEE SCROLLDELAY =100 DIRECTION=up>
					     <p><b>ALIADOS</b></p> 
					    <a href="http://lexincorp.com/" target="_black">     <img class="img-responsive" src="assets/img/lexincorp.png" height="50" width="150"> </a>
					     <a href="https://www.linkedin.com/in/hernan-castro-29258a3/" target="_black">    <img class="img-responsive" src="assets/img/agm.png" height="50" width="100">  </a>
					   <a href="http://ariaslaw.com/en" target="_black">  <img class="img-responsive" src="assets/img/arias.png" height="50" width="100">  </a>				    
					     <a href="http://www.crconsulting.co.cr/" target="_black">  <img class="img-responsive" src="assets/img/crconsulting.png" height="50" width="100"> </a>
 
					      </MARQUEE>
					     
					<MARQUEE SCROLLDELAY =100 DIRECTION=down>	<p><b>MIEMBROS DE</b></p>
 
					   <a href="http://www.colegiocienciaseconomicas.cr/" target="_black">  <img class="img-responsive" src="assets/img/colegioprofesionales.png" height="100" width="86"> </a>
					   <br>
					   <a href="http://costarica.ahk.de/es/" target="_black">  <img class="img-responsive" src="assets/img/camaraalemana.png" height="50" width="250"> </a>
			 
					        </MARQUEE>
				
					<!-- <div class="name-label"></div> -->
				</div><! --/col-lg-4-->
				<div class="col-lg-8 name-desc">
				  	
					<h2>SOMOS<br/><b>BROKERS</b></h2>
					<div class="name-zig"></div>
					
					<div class="col-md-6">
						<p>Brokers Capital Consultores Financieros S.A, es una firma costarricense fundada en el año 2014, dedicada a la oferta de servicios financieros con un enfoque innovador, mediante el desarrollo constante de herramientas tecnologías.</p>
						<p>Brokers, es la empresa pionera en servicios Fintech en Costa Rica y con proyección en la región centroamericana.</p>
					</div>
					<div class="col-md-6">
						<p>El equipo de trabajo de Brokers, está conformado por profesionales en finanzas, economía y tecnología, con amplia experiencia en el mercado  de valores costarricense. Este equipo es complementado con aliados estratégicos de primer orden, tanto a nivel local como internacional..</p>
						
					</div>
					
				</div><! --/col-lg-8-->
		
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /aboutwrap -->
	
	<! -- PORTFOLIO SECTION -->
	<section id="portfolio" name="portfolio"></section>
	<div id="portfoliowrap">
		<div class="container">
			<div class="row">
				<h1> NUESTROS SERVICIOS</h1>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
					<div class="project-wrapper">
	                    <div class="project">
	                        <div class="photo-wrapper">
	                            <div class="photo">
	                            	<a class="fancybox" href="assets/img/portfolio/business-257911_640.jpg"><img class="img-responsive" src="assets/img/portfolio/top100-gifts-animados-viaje-10.gif" alt="Mercados Internacionales"></a>
	                            </div>
	                            <div class="overlay">23</div>
	                        </div>
	                    </div>
	                </div>Mercados internacionales
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
					<div class="project-wrapper">
	                    <div class="project">
	                        <div class="photo-wrapper">
	                            <div class="photo">
	                            	<a class="fancybox" href="assets/documentos/LatamInvestor2017.pdf" target="black"><img class="img-responsive" src="assets/img/portfolio/investor2.png" alt=""></a>
	                            </div>
	                            <div class="overlay"></div>
	                        </div>
	                    </div>
	                </div><font>Sistema de Portafolios</font>
				</div><!-- col-lg-4 -->
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
					<div class="project-wrapper">
	                    <div class="project">
	                        <div class="photo-wrapper">
	                            <div class="photo">
	                            	<a class="fancybox" href="assets/documentos/Masterzon.com.pdf" target="black"><img class="img-responsive" src="assets/img/portfolio/masterzon.jpg" alt=""></a>
	                            </div>
	                            <div class="overlay"></div>
	                        </div>
	                    </div>
	                </div>Masterzon.com
				</div>
				</div><!-- /row -->
	
			<div class="row mt">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
					<div class="project-wrapper">
	                    <div class="project">
	                        <div class="photo-wrapper">
	                            <div class="photo">
	                            	<a class="fancybox" href="assets/img/portfolio/profin.JPG"><img class="img-responsive" src="assets/img/portfolio/LogoProfinNew.PNG" alt=""></a>
	                            </div>
	                            <div class="overlay"></div>
	                        </div>
	                    </div>PROFIN
	                </div>
				</div><!-- col-lg-4 -->
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
					<div class="project-wrapper">
	                    <div class="project">
	                        <div class="photo-wrapper">
	                            <div class="photo">
	                            	<a class="fancybox" href="assets/img/portfolio/teach.JPG"><img class="img-responsive" src="assets/img/portfolio/teach2.gif" alt=""></a>
	                            </div>
	                            <div class="overlay"></div>
	                        </div>
	                    </div>Capacitaciones
	                </div>
				</div><!-- col-lg-4 -->
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
				<div class="project-wrapper">
	                    <div class="project">
	                       <div class="photo-wrapper">
	                            <div class="photo">
	                            	<a class="fancybox" href="assets/documentos/LaEraFintech.pdf"  target="black"><img class="img-responsive" src="assets/img/portfolio/1k7ibc.gif" alt=""></a>
	                            </div>
	                            <div class="overlay"></div>
	                        </div>
	                    </div>
	                </div>Desarrollo de Plataformas Fintech
					
					
				</div><!-- col-lg-4 -->
			</div><!-- /row -->
		</div><! --/container -->
	<!--	<div class="container">
			<div class="row mt centered">
				<h1> <img  src="assets/img/news.jpg" width="40"> NOTICIAS </h1>
				<div class="col-lg-4 proc">
				<a class="fancybox" href="http://www.elfinancierocr.com/m/finanzas/bancredito-Sugef-plan-fortalecimiento-Gobierno_0_1153084693.html?utm_source=Email&utm_medium=newsletter&utm_campaign=Newsletter+elfinanciero+Vespertino+06-04-17+17%3A04%3A03&utm_content=-2017-04-07-01"  target="black">
					 <img class="img-circle" src="assets/img/financiero.png" width="50"> 
					 </a>
					<h3>6 Abril, 2017</h3>
					<a class="fancybox" href="http://www.elfinancierocr.com/m/finanzas/bancredito-Sugef-plan-fortalecimiento-Gobierno_0_1153084693.html?utm_source=Email&utm_medium=newsletter&utm_campaign=Newsletter+elfinanciero+Vespertino+06-04-17+17%3A04%3A03&utm_content=-2017-04-07-01"  target="black">
					<p>Sugef aprobó plan de fortalecimiento de Bancrédito.</p>
					</a>
				</div>
				<div class="col-lg-4 proc">
				</div>
				<div class="col-lg-4 proc">
				<a class="fancybox" href="http://presidencia.go.cr/comunicados/2017/04/gobierno-confirma-respaldo-a-bancredito/"  target="black">
				<img class="img-circle" src="assets/img/casaPresidencial.png" width="70"> 
				</a>
					<h3>6 Abril, 2017</h3>
					<a class="fancybox" href="http://presidencia.go.cr/comunicados/2017/04/gobierno-confirma-respaldo-a-bancredito/"  target="black">
					<p>Gobierno confirma respaldo a Bancrédito.</p>
					</a>
				</div>
				 
			</div> 
		</div> -->
	</div> <! --/Portfoliowrap -->

	<! -- PORTFOLIO SEPARATOR -->
	<div class="sep portfolio" data-stellar-background-ratio="0.5"></div>
	
	
	<! -- SERVICE SECTION -->
	<section id="services" name="services"></section>
	<div id="servicewrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8-offset-2 centered">
					<h1>Historias de &Eacutexito</h1>
					<h3>Rese&ntilde;a de proyectos desarrollados</h3>
					
				</div><!-- /col-lg-8 -->
			</div><! --/row -->
			
			<div class="row mt">
				<div class="col-lg-3 service">
					<a target="black" href="https://www.baccredomatic.com/es-cr/inversiones/puesto-de-bolsa"><img class="img-responsive" src="assets/img/bac.png" width="150" ><br/></a><small>BAC Puesto de Bolsa.</small>
					<p class="text">Asesoría y diseño para el desarrollo e implementación de un sistema informático para el monitoreo, control y análisis de portafolios de inversión individuales.</p>
				</div>
				<div class="col-lg-3 service">
					<a target="black" href="https://www.linkedin.com/company/15230080"><img class="img-responsive" src="assets/img/logo_oficial_celeste.png" width="40" ><br/></a><small>Masterzon CR S.A.</small>
					<p class="text">Estructuración del proyecto Masterzon CR S.A, incluyendo diseño de procesos operativos, plan de negocios, modelo financiero y negociación  de fideicomiso.</p>
					
				</div>
				<div class="col-lg-3 service">
					<a target="black" href="https://www.masterzon.com"><img class="img-responsive" src="assets/img/masterzonCOM.png" width="150" ><br/></a><small>Masterzon.com</small>
					<p class="text">Desarrollo de la plataforma tipo fintech www.masterzon.com para la realización de operaciones de factoring, lending y crowdfunfing.</p>
				</div>
				<div class="col-lg-3 service"> 
					<p><img class="img-responsive" src="assets/img/portfolio/lataminvestor.PNG" width="150" ></p>
					<p class="text">En conjunto con <a target="black" href="https://www.linkedin.com/company/cr-consulting_2">Crconsulting</a>, se diseno Latam Investor, 
					para el monitoreo y análisis de portafolios financieros. Facilita la administración de carteras individuales y mancomunadas; activas y pasivas, generando información de valor para los clientes.</p>
				</div>
			</div><! --/row -->
			<div class="row mt">
				<div class="col-lg-3 service">
					<i class="fa fa-globe"></i><a target="black" href="http://enerplanetcr.com/web/index.php?option=com_contact&view=contact&id=1&Itemid=6"><img class="img-responsive" src="assets/img/enerplanet.jpg" width="150" ><br/></a><small>Enerplanet S.A.</small>
					<p class="text">Estructuración financiera para proyecto de energía renovable,  de tecnología tersmosolar, en el Club Los Jaúles de la Asociación de Empleados de la Caja Costarricense del Seguro Social (ASECCSS).</p>
				</div>
				<!-- <div class="col-lg-3 service">
					<i class="fa fa-globe"></i><p>CLOUD SERVICES<br/><small>LOREM IPSUM DOLOR</small></p>
					<p class="text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
				</div>
				<div class="col-lg-3 service">
					<i class="fa fa-lock"></i><p>SECURED ACCOUNTS<br/><small>LOREM IPSUM DOLOR</small></p>
					<p class="text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
				</div>
				<div class="col-lg-3 service">
					<i class="fa fa-thumbs-up"></i><p>100% SATISFACTION<br/><small>LOREM IPSUM DOLOR</small></p>
					<p class="text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
				</div> -->
			</div><! --/row -->
			
		</div><! --/container -->
	</div><! --/servicewrap -->
	
	<div id="testimonials">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 mt">
				
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <!-- Wrapper for slides -->
					  <div class="carousel-inner">
					    <div class="item active mb centered">
					      <h3>ELIO ROJAS ROJAS (Socio)</h3>
					      <p>Economista </p>
					      <p>Gerente de Masterzon CR, Profesor Universidad Latina. Ex: Corredor de Bolsa en BCR Valores y BAC San José Puesto de Bolsa.</p>
					      <p><img class="img-circle" src="assets/img/ELIO.jpg" width="80"></p>
					    </div>

					    <div class="item mb centered">
					      <h3>JOSE RIVAS RAMÍREZ (Socio Fundador)</h3>
					      <P> Administrador de Empresas con énfasis en Comercio Internacional </P>
					      <p>Director de Operaciones de Masterzon CR. Ex: Director Grupo KLM y Coordinador de Compras de ASECCSS. Miembro de la Cámara de Comercio de Costa Rica. </p>
					      <p><img class="img-circle" src="assets/img/JOSE.png" width="80"></p>
					    </div>

					    <div class="item mb centered">
					      <h3>GERSON GUILLÉN SOLANO (Socio)</h3>
					      <p>Ingeniero de Sistemas </p>
					      <p>Coordinador de TI en Masterzon. Ex: Analista de Sistemas en BCR Valores,  Popular Valores y Evertec.</p>
					      <p><img class="img-circle" src="assets/img/GERSON.png" width="80"></p>
					    </div>

					<div class="item mb centered">
					      <h3>RAFAEL EDUARDO VILLALOBOS AZOFEIFA (Socio)</h3>
					      <p>Director de Financiero de Masterzon CR, Profesor UCR. Ex: Corredor de Bolsa de Popular Valores, Gestor de Riesgo Popular SAFI, Especialista de Riesgos Financieros en BCR Valores,  Interfin Valores.</p>
					      <p><img class="img-circle" src="assets/img/RAFA.jpg" width="80"></p>
					    </div>
					    
					    
					    <div class="item mb centered">
					      <h3>VICTOR BEJARANO CUBERO (Asociado)</h3>
					      <p> Master Administración de Negocios, con énfasis en Mercadeo</p>
					      <p>Ejecutivo Senior en Masterzon CR. Ex: Evertec, Banco Lafise, Banco Fincomer, VALCO, Banco de Fomento Agrícola, Banco Interfin.</p>
					      <p><img class="img-circle" src="assets/img/VICTOR.png" width="80"></p>
					    </div>
					    
					     <div class="item mb centered">
					      <h3>ENRIQUE ARGUEDAS VENEGAS (Asociado)</h3>
					      <p> MBA, Finanzas</p>
					      <p>Consultor Financiero de Brokers Capital, Profesor UNED. Ex: Cooredor de Bolsa en BCR Valores, BN Valores, BICSA y Banco Anglo.</p>
					      <p><img class="img-circle" src="assets/img/ENRIQUE.png" width="80"></p>
					    </div>
					    
					     <div class="item mb centered">
					      <h3>CESAR PERALTA HERNÁNDEZ (Asociado)</h3>
					      <p> Economía y Finanzas, Universidad de Standford</p>
					      <p>Asesor Patrimonial Senior de Brokers Capital, Presidente de Hotel Los Ángeles. Ex: Lehman Brothers, Citigroup, Credit Suisse, BN Valores, Vice-Presidente BLADEX. Instructor de FUNDEVAL.</p>
					      <p><img class="img-circle" src="assets/img/CESAR.png" width="80"></p>
					    </div>
					  </div>
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
					    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					  </ol>
					</div>
					  
				</div><! --/col-lg-8 -->
			</div><! --/row -->
		</div><! --/container -->
	</div><! --/testimonials -->
	
	<! -- SERVICE SECTION -->
	<section id="contact" name="contact"></section>
	<! -- CONTACT SEPARATOR -->
	<div class="sep contact" data-stellar-background-ratio="0.5"></div>
	
	<div id="contactwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
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
	
						echo '<h1> Mensaje enviado correctamente, GRACIAS por escribirnos!</h1> ';
					}else{
						echo '<h1> Hubo un error con el capcha, vuelve a intentarlo por favor!</h1> ';
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
								echo '<input type="text" height="200" class="form-control" name="captura" id="captura" placeholder="Capcha " value="" required="required">';
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
