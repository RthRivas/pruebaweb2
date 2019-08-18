<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Pedidos.php";
	$c= new conectar();
$conexion=$c->conexion();
	$obj= new pedidos();

	

	if(count($_SESSION['tablaComprasTemp'])==0){
		echo 0;
	}else{
		$result=$obj->crearPedidos();
		unset($_SESSION['tablaComprasTemp']);
		echo $result;
	}
 ?>