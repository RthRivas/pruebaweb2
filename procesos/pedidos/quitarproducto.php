<?php 

	session_start();
	$index=$_POST['ind'];
	unset($_SESSION['tablaPedidoTemp'][$index]);
	$datos=array_values($_SESSION['tablaPedidoTemp']);
	unset($_SESSION['tablaPedidoTemp']);
	$_SESSION['tablaPedidoTemp']=$datos;

 ?>