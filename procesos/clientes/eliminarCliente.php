<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Clientes.php";


$c= new conectar();
$conexion=$c->conexion();
	$obj= new clientes();

	
	echo $obj->eliminaCliente($_POST['idcliente']);
 ?>