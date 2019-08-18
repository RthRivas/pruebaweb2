
<head>
	<title>Inicio</title>
</head>
<br>
<?php require_once "clases/Conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		$sql="SELECT id_categoria,nombreCategoria
		from categorias";
		$result=mysqli_query($conexion,$sql);
		?>
	<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#productos">Productos</a></li>
    <li><a data-toggle="tab" href="#Libros">Libros</a></li>
    <li><a data-toggle="tab" href="#Papeleria">Papeleria</a></li>
    <li><a data-toggle="tab" href="#Estudiantes">Estudiantes</a></li>
    <li><a data-toggle="tab" href="#Oficina">Oficina</a></li>
  </ul>


  <div class="tab-content">
    <div id="productos" class="tab-pane fade in active">
      <br>
       <?php include 'productos.php'; ?>
    </div>
    <div id="Libros" class="tab-pane fade">
      <br>
       <?php include 'libros.php'; ?>
    </div>
    <div id="Papeleria" class="tab-pane fade">
      <br>
      <?php include 'Papeleria.php'; ?>
    </div>
    <div id="Estudiantes" class="tab-pane fade">
      <br>
     <?php include 'Estudiantes.php'; ?>
    </div>
    <div id="Oficina" class="tab-pane fade">
      <br>
      <?php include 'Oficina.php'; ?>
    </div>
    
  </div>