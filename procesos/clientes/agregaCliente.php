<?php 

session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Clientes.php";
	$c= new conectar();
		$conexion=$c->conexion();

	$obj= new clientes();


	$datos=array(
			$_POST['nombre'],
			$_POST['apellidos'],
			$_POST['direccion'],
			$_POST['email'],
			$_POST['telefono'],
			$_POST['dui']
				);

	echo $obj->agregaCliente($datos);

	
	
 ?>