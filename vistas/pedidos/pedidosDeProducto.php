
<?php 

require_once "../../clases/Conexion.php";
//require_once "../../librerias/select2/js/select2.js";

$c= new conectar();
$conexion=$c->conexion();
?>

<h4>Pedir producto</h4>
<div class="row">
	<div class="col-sm-4">
		<form id="frmPedidosProductos">
			<label>Selecciona Cliente</label>
			<select class="form-control input-sm" id="clientePedidos" name="clientePedidos">
				<option value="A">Selecciona</option>
				<option value="0">Sin cliente</option>
				<?php
				$sql="SELECT id_cliente,nombre,apellido 
				from clientes";
				$result=mysqli_query($conexion,$sql);
				while ($cliente=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $cliente[0] ?>"><?php echo $cliente[2]." ".$cliente[1] ?></option>
				<?php endwhile; ?>
			</select>
			<label>Producto</label>
			<select class="form-control input-sm" id="productoPedidos" name="productoPedidos">
				<option value="A">Selecciona</option>
				<?php
				$sql="SELECT id_producto,
				nombre
				from articulos";
				$result=mysqli_query($conexion,$sql);

				while ($producto=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $producto[0] ?>"><?php echo $producto[1] ?></option>
				<?php endwhile; ?>
			</select>
			<label>Precio</label>
			<input readonly="" type="text" class="form-control input-sm" id="precioP" name="precioP">
			<p></p>
			<span class="btn btn-primary" id="btnAgregarPedidos">Agregar</span>
			<span class="btn btn-danger" id="btnVaciarPedidos">Quitar pedido</span>
		</form>
	</div>
	<div class="col-sm-3">
		<div id="imgProducto"></div>
	</div>
	<div class="col-sm-4">
		<div id="tablaPedidosTempLoad"></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('#tablaPedidosTempLoad').load("vistas/pedidos/tablaPedidosTemp.php");

		$('#productoPedidos').change(function(){
			$.ajax({
				type:"POST",
				data:"idproducto=" + $('#productoPedidos').val(),
				url:"procesos/pedidos/llenarFormProducto.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#descripcionP').val(dato['descripcion']);
					$('#cantidadP').val(dato['cantidad']);
					$('#precioP').val(dato['precio']);

					$('#imgProducto').prepend('<img class="img-thumbnail" id="imgp" src="' + dato['ruta'] + '" />');
				}
			});
		});

		$('#btnAgregarPedidos').click(function(){
			vacios=validarFormVacio('frmPedidosProductos');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

			datos=$('#frmPedidosProductos').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/pedidos/agregarProductoTemp.php",
				success:function(r){
					$('#tablaPedidosTempLoad').load("vistas/pedidos/tablaPedidosTemp.php");
				}
			});
		});

		$('#btnVaciarPedidos').click(function(){

		$.ajax({
			url:"procesos/pedidos/vaciarTemp.php",
			success:function(r){
				$('#tablaPedidosTempLoad').load("vistas/pedidos/tablaPedidosTemp.php");
			}
		});
	});

	});
</script>

<script type="text/javascript">
	function quitarP(index){
		$.ajax({
			type:"POST",
			data:"ind=" + index,
			url:"procesos/pedidos/quitarproducto.php",
			success:function(r){
				$('#tablaPedidosTempLoad').load("vistas/pedidos/tablaPedidosTemp.php");
				alertify.success("Se quito el producto");
			}
		});
	}

	function crearPedidos(){
		$.ajax({
			url:"procesos/pedidos/crearPedidos.php",
			success:function(r){
				if(r > 0){
					$('#tablaPedidosTempLoad').load("vistas/pedidos/tablaPedidosTemp.php");
					$('#frmPedidosProductos')[0].reset();
					alertify.alert("Pedido creado con exito, consulte pedidos realizados ");
				}else if(r==0){
					alertify.alert("No hay lista de pedido!!");
				}else{
					alertify.error("No se pudo crear el pedido");

				}
			}
		});
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#clientePedidos').select2();
		$('#productoPedidos').select2();

	});
</script>