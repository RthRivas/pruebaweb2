	<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Pedidos.php";
	session_start();

	$c= new conectar();
	$conexion=$c->conexion();

	$obj= new pedidos();

		$idusuario= $_SESSION['usuario'];
   //echo $idusuario;
   $sql2 ="SELECT tipo, email from usuarios where email = '$idusuario'";
   $result2 = mysqli_query($conexion,$sql2);
   $ver2=mysqli_fetch_row($result2);
	$tipo=$ver2[0];
	$email=$ver2[1];
	echo $ver2[0];

	if($ver2[0]==1){
		$sql="SELECT id_pedido,
		fechaPedido,
		id_usuario,
		precio
	from pedidos ";
	$result=mysqli_query($conexion,$sql); 
	}else if($ver2[0] == 2)
	{
		//empleado
		$sql="SELECT id_pedido,
		fechaPedido,
		id_usuario,
		precio
	from pedidos ";
	$result=mysqli_query($conexion,$sql); 

	}else if ($ver2[0]==3){
		$sql="SELECT id_pedido,
		fechaPedido,
		id_usuario,
		precio
	from pedidos where id_usuario='$idusuario'";
	$result=mysqli_query($conexion,$sql); 
	}

	
	?>

<h4>Reportes de pedidos</h4>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
				<caption><label>Pedidos</label></caption>
				<tr>
					<th>Folio</th>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Total del Pedido</th>
					<th>accion</th>
					<th>accion</th>
				</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
				<tr>
					<td><?php echo $ver[0] ?></td>
					<td><?php echo $ver[1] ?></td>
					<td>
						<?php
							if($obj->nombreCliente($ver[2])==" "){
								echo $ver[2];
							}else{
								echo $ver[2];
							}
						 ?>
					</td>
					<td>
						<?php 
							echo "$".$ver[3];
						 ?>
					</td>
					<td>
						<?php if($ver2[0]==3){?>
							<a hidden class="btn btn-danger btn-sm">
							Comprar <span class="glyphicon glyphicon-list-alt"></span>
							</a><?php
						}else{ ?>
							<a href="procesos/ventas/crearTicketPdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
							Comprar <span class="glyphicon glyphicon-list-alt"></span>
							</a>
							<?php } ?>
						
					</td>
					<td>
					<span class="btn btn-danger btn-xs" onclick="EliminarPedido('<?php echo $ver[0]; ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
					</td>
				</tr>
		<?php endwhile; ?>
			</table>
		</div>
	</div>
	<div class="col-sm-1"></div>

</div>
