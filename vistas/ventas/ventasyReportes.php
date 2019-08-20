<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";


	$c= new conectar();
	$conexion=$c->conexion();

	$obj= new ventas();
	$sql="SELECT id_venta,
				fechaCompra,
				id_cliente 
			from ventas group by id_venta";
	$result=mysqli_query($conexion,$sql); 
	?>

<h4>Reportes y ventas</h4>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
				<caption><label>Ventas :)</label></caption>
				<tr>
					<th>Folio</th>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Total de compra</th>
					<th>Ticket</th>
					<th>Factura</th>
				</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
				<tr>
					<td><?php echo $ver[0] ?></td>
					<td><?php echo $ver[1] ?></td>
					<td>
						<?php
							if($obj->nombreCliente($ver[2])==" "){
								echo "S/C";
							}else{
								echo $obj->nombreCliente($ver[2]);
							}
						 ?>
					</td>
					<td>
						<?php 
							echo "$".$obj->obtenerTotal($ver[0]);
						 ?>
					</td>
					<td>
						<a href="procesos/ventas/crearTicketPdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
							Ticket <span class="glyphicon glyphicon-list-alt"></span>
						</a>
					</td>
					<td>
						<a href="procesos/ventas/crearReportePdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
							Factura <span class="glyphicon glyphicon-file"></span>
						</a>	
					</td>
				</tr>
		<?php endwhile; ?>
			</table>
			<input type="date" id="fechaI" name="fechaI" onChange="asignar();">
			<input type="date" id="fechaF" name="fechaF" onChange="asignar();"> 
			
			<input type="text" id="Res" name="Res" >
			<button type="button" id="Reporte" class="btn btn-warning" data-dismiss="modal">Guardar</button>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>
<script>
			
			function agregaDatosCliente(idcliente){

					$.ajax({
						type:"POST",
						data:"idcliente=" + idcliente,
						url:"procesos/clientes/obtenDatosCliente.php",
						success:function(r){
							dato=jQuery.parseJSON(r);
							$('#idclienteU').val(dato['id_cliente']);
							$('#nombreU').val(dato['nombre']);
							$('#apellidosU').val(dato['apellido']);
							$('#direccionU').val(dato['direccion']);
							$('#emailU').val(dato['email']);
							$('#telefonoU').val(dato['telefono']);
							$('#duiU').val(dato['dui']);

						}
					}
			}

</script>