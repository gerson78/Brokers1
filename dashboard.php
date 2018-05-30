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
	
		?>
<a href="validar_usuario.php">volver a inicio</a>
  </body>	
</html>