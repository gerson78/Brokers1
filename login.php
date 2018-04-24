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

 
 <nav class="menu" id="theMenu">
	
							
		<div class="menu-wrap">
		
							
			<h1 class="logo"><a href="index.html#home">BROKERS CR</a></h1>
			<i class="fa fa-times menu-close"></i>
			<a href="index.php#home" class="smoothScroll">Inicio</a>
			<a href="index.php#about" class="smoothScroll">Acerca de</a>
			<a href="index.php#portfolio" class="smoothScroll">Portafolio</a>
			<a href="index.php#services" class="smoothScroll">Proyectos</a>
			<a href="index.php#contact" class="smoothScroll">Cont&aacutectenos </a>
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
					<h1>LOGIN</h1>
				</div>
				
				<div class="col-md-6 col-md-offset-3">
				<form id="login-form" name="login-form" action="validar_usuario.php" method="post">

                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="usuario" class="form-control" placeholder="Usuario" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Contrase&ntilde;a" required="required">
                    </div>
                  </div>
                </div>
                  
				
			         
                <div class="form-group">
                  <button type="submit" value="Ingresar" class="btn-submit">Verificar</button>
                </div>
				
				<a href="solicitarCorreo.php">Recupera tu contrase&ntilde;a</a></p>
				</div>
				
              </form>   
			  
			</div><! --/row -->
		</div><! --/container -->
	</div><! --/headerwrap -->
	
	
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