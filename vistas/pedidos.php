
<head>
	<title>Pedidos</title>
</head>
<body>

	<div class="container">
		 <h1>Pedidos</h1>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<span class="btn btn-default" id="pedidosProductosBtn">Pedir productos</span>
		 		<span class="btn btn-default" id="pedidosHechosBtn">Pedidos hechos</span>
		 	</div>
		 </div>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<div id="pedidosProductos"></div>
		 		<div id="pedidosHechos"></div>
		 	</div>
		 </div>
	</div>
</body>

	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#pedidosProductosBtn').click(function(){
				esconderSeccionPedidos();
				$('#pedidosProductos').load('vistas/pedidos/pedidosDeProducto.php');
				$('#pedidosProductos').show();
			});
			$('#pedidosHechosBtn').click(function(){
				esconderSeccionPedidos();
				$('#pedidosHechos').load('vistas/pedidos/pedidosyReportes.php');
				$('#pedidosHechos').show();
			});
		});

		function esconderSeccionPedidos(){
			$('#pedidosProductos').hide();
			$('#pedidosHechos').hide();
		}

	</script>
