
<?php require_once "dependencias.php" ?>

<?php 
if(isset($_SESSION['userID'])){
  $USRController = new usuarios();
  $usrData = $USRController->obtenDatosUsuario($_SESSION['userID']);
  
?>    

  <!------------------------------------ Begin Navbar ------------------------------------>
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">

          <!----------------------------- Opciones en Común --------------------------------------->
          <li <?php if(isset($_GET['pg'])){ if($_GET['pg'] == 'inicio'){ echo 'class="active"';}}?>>
          <a href="index.php?pg=inicio"><span class="glyphicon glyphicon-home"></span> Inicio</a>
          </li>

            

          <!--------------------------- Opciones de Administrador ---------------------------------->
          <?php if($usrData['userType'] == 1): ?>
          <li <?php if(isset($_GET['pg'])){if($_GET['pg'] == 'usuarios'){ echo 'class="active"';}}?>>
            <a href="index.php?pg=usuarios"><span class="glyphicon glyphicon-user"></span> Administrar usuarios</a>
          </li>
           <li <?php if(isset($_GET['pg'])){if($_GET['pg'] == 'categorias'){ echo 'class="active"';}}?>>
            <a href="index.php?pg=categorias"><span class="glyphicon glyphicon-list-alt"></span> Categorias</a>
          </li>
          <li <?php if(isset($_GET['pg'])){if($_GET['pg'] == 'articulos'){ echo 'class="active"';}}?>>
            <a href="index.php?pg=articulos"><span class="glyphicon glyphicon-list-alt"></span> Articulos</a>
          </li>
          <li <?php if(isset($_GET['pg'])){if($_GET['pg'] == 'clientes'){ echo 'class="active"';}}?>>
            <a href="index.php?pg=clientes"><span class="glyphicon glyphicon-user"></span> Clientes</a>
          </li>
          <li <?php if(isset($_GET['pg'])){if($_GET['pg'] == 'ventas'){ echo 'class="active"';}}?>>
            <a href="index.php?pg=ventas"><span class="glyphicon glyphicon-usd"></span> Ventas</a>
          </li>
          <?php endif;  ?>


          <!------------------------------ Opciones de Empleado ------------------------------------->
          <?php if($usrData['userType'] == 2): ?>
          <li <?php if(isset($_GET['pg'])){if($_GET['pg'] == 'clientes'){ echo 'class="active"';}}?>>
            <a href="index.php?pg=clientes"><span class="glyphicon glyphicon-user"></span> Clientes</a>
          </li>
            <li <?php if(isset($_GET['pg'])){if($_GET['pg'] == 'ventas'){ echo 'class="active"';}}?>>
            <a href="index.php?pg=ventas"><span class="glyphicon glyphicon-usd"></span> Ventas</a>
          </li>
            <?php endif; ?>
          
            <!---------------------------- Cierre de sesion y Nombre de usuario ------------------------>
            <li class="dropdown" >
            <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user"></span> Usuario: <?php if(isset($_SESSION['usuario'])){ echo $_SESSION['usuario'];} ?>  <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li> <a style="color: red" href="procesos/salir.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->


<!-- /container -->        

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').height(200);

    }
    else {
      $('.logo').height(100);
    }
  }
  );
</script>
<?php } ?>