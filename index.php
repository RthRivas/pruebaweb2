<?php 
	session_start();
	require_once "clases/Conexion.php";
	require 'clases/Usuarios.php';
	require 'procesos/NavigationController.php';
	$obj= new conectar();
	$USRController = new usuarios();
	$navController = new NavigationController();
	$conexion=$obj->conexion();
	$userData;
 ?>
<!DOCTYPE html>
<html>
<head>
	<!--el <title>Titulo en la pestaña</title> incluirlo en cada archivo a incluir (donde es necesario)-->
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body>

	<?php if($navController->loadNavBar()){ include $navController->loadNavBar();} ?>
	<br><br><br>

	<?php include $navController->loadView(); ?>
	
	<script src="librerias/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>