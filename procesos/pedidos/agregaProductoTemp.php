<?php 
	session_start();
	require_once "../../clases/Conexion.php";

	$c= new conectar();
	$conexion=$c->conexion();

	$idcliente=$_POST['clientePedidos'];
	$idproducto=$_POST['productoPedidos'];
	$descripcion=$_POST['descripcionP'];
	$cantidad=$_POST['cantidadP'];
	$precio=$_POST['precioP'];

	$sql="SELECT nombre,apellido 
			from clientes 
			where id_cliente='$idcliente'";
	$result=mysqli_query($conexion,$sql);

	$c=mysqli_fetch_row($result);

	$ncliente=$c[1]." ".$c[0];

	$sql="SELECT nombre 
			from articulos 
			where id_producto='$idproducto'";
	$result=mysqli_query($conexion,$sql);

	$nombreproducto=mysqli_fetch_row($result)[0];

	$articulo=$idproducto."||".
				$nombreproducto."||".
				$descripcion."||".
				$precio."||".
				$ncliente."||".
				$idcliente;

	$_SESSION['tablaPedidoTemp'][]=$articulo;

 ?>