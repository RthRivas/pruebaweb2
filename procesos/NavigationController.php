<?php
include 'clases/NavigationModel.php';
class NavigationController{

    public function loadView(){
        $navModel = new NavigationModel();
        $page='home.php';
        $USRController = new usuarios();

        if(isset($_GET['onLogin'])){ // onLogin se define en el submit del formulario de Login
            $datos;
            $datos[0] = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
            $datos[1] = (isset($_POST['password'])) ? $_POST['password'] : '';
            if($USRController->loginUser($datos) == 1){
                header('Location: index.php?pg=inicio');
            }else{
                header('Location: index.php?pg=home');
            }

        }
        if(isset($_GET['onLogout'])){
            
            if($USRController->logout()){
                header('Location: index.php?pg=home');
            }
        }

        if(isset($_SESSION['userID'])){
            $USRController = new usuarios(); 
            $userData = $USRController->obtenDatosUsuario($_SESSION['userID']);

            if (isset($_GET['pg'])){
                $page = $navModel->definePage($_GET['pg'], $userData['userType']);

        
            }else{
                $page = 'inicio.php'; // Si esta logeado, pero no se establecio la paagina a la cual ir
            }
        }else{ //Esta variante es en el caso de que sea un visitante SIN LOGUEARSE
            if (isset($_GET['pg'])){
                $page = $navModel->definePage($_GET['pg'], 0); //El userType se declara de una como cero (0)
            }else{
                $page = 'home.php'; // Si no se establecio la paagina a la cual ir
            }
        }
        return 'vistas/'.$page;
 } // Fin de LoadView(){...}

    public function loadNavBar(){
        if(isset($_SESSION['userID'])){
            return 'vistas/menu.php';
        }
    }

}

?>