<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Pedidos.php";


$c= new conectar();
$conexion=$c->conexion();
	$obj= new Pedidos();
	$idpe=$_POST['id_pedido'];

	echo $obj->eliminarPedido($idpe);
 ?>