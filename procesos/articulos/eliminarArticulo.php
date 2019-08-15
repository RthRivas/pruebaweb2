<?php 


require_once "../../clases/Conexion.php";
require_once "../../clases/Articulos.php";

$obj= new articulos();

	$idart=$_POST['idarticulo'];

		echo $obj->eliminaArticulo($idart);

 ?>