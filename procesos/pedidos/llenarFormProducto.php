<?php 
	
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Pedidos.php";

	$obj= new Pedidos();

	echo json_encode($obj->obtenDatosProducto($_POST['idproducto']))

 ?>