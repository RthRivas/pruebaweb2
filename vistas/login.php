
	<div class="container">
    <div class="w-100 p-4"></div>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Sistema de ventas y almacen</div>
					<div class="panel panel-body">
						<p>
							<img src="img/ventas.jpg"  height="190">
						</p>
						<form id="frmLogin" action="index.php?onLogin=true" method="POST">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario" require>
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control input-sm" require>
							<p></p>
							<input type="submit" class="btn btn-primary btn-sm" id="entrarSistema" value="Entrar">
							<a href="registro.php" class="btn btn-danger btn-sm">Registrar</a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

    <!---script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){

				if(r==1){
					window.location="vistas/index.php?pg=loggin";
				}else{
					alert("No se pudo acceder :(");
				}
			}
		});
	});
	});
</script--->