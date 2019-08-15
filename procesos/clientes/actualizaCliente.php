<?php 


	require_once "../../clases/Conexion.php";
	require_once "../../clases/Usuarios.php";

	$obj= new usuarios;

	$datos=array(
			$_POST['idCliente'],
			$_POST['nombreU'],
			$_POST['apellidosU'],
			$_POST['direccionU'],
			$_POST['emailU'],
			$_POST['telefonoU'],
			$_POST['rfcU']
				);

	echo $obj->actualizaCliente($datos);

	
	
 ?>