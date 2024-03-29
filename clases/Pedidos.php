<?php 

class Pedidos{
	public function obtenDatosProducto($idproducto){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="SELECT art.nombre,
		art.descripcion,
		art.cantidad,
		img.ruta,
		art.precio
		from articulos as art 
		inner join imagenes as img
		on art.id_imagen=img.id_imagen 
		and art.id_producto='$idproducto'";
		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		$d=explode('/', $ver[3]);

		$img=$d[2].'/'.$d[3];

		$data=array(
			'nombre' => $ver[0],
			'descripcion' => $ver[1],
			'cantidad' => $ver[2],
			'ruta' => $img,
			'precio' => $ver[4]
		);		
		return $data;
	}

	public function crearPedido(){
		$c= new conectar();
		$conexion=$c->conexion();

		$fecha=date('Y-m-d');
		$idventa=self::creaFolio();
		$datos=$_SESSION['tablaPedidoTemp'];
		if(isset($_SESSION['usuario'])){ $idusuario= $_SESSION['usuario'];}
		
		$r=0;
		for ($i=0; $i < count($datos) ; $i++) { 
			$d=explode("||", $datos[$i]);

			$sql="INSERT into pedidos (id_pedido,
										id_cliente,
										id_producto,
										id_usuario,
										precio,
										fechaPedido)
							values ('$idventa',
									'$d[5]',
									'$d[0]',
									'$idusuario',
									'$d[3]',
									'$fecha')";
			$r=$r + $result=mysqli_query($conexion,$sql);
		}

		return $r;
	}
	public function creaFolio(){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="SELECT id_pedido from pedidos group by id_pedido desc";

		$resul=mysqli_query($conexion,$sql);
		$id=mysqli_fetch_row($resul)[0];

		if($id=="" or $id==null or $id==0){
			return 1;
		}else{
			return $id + 1;
		}
	}
	public function nombreCliente($idCliente){
		$c= new conectar();
		$conexion=$c->conexion();

		 $sql="SELECT apellido,nombre 
			from clientes 
			where id_cliente='$idCliente'";
		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		return $ver[0]." ".$ver[1];
	}

	public function obtenerTotal($idpedido){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="SELECT precio 
				from pedidos 
				where id_pedido='$idpedido'";
		$result=mysqli_query($conexion,$sql);

		$total=0;

		while($ver=mysqli_fetch_row($result)){
			$total=$total + $ver[0];
		}

		return $total;
	}
	public function eliminarPedido($id_pedido){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="DELETE from pedidos where id_pedido='$id_pedido'";

		return mysqli_query($conexion,$sql);
	}
}

?>