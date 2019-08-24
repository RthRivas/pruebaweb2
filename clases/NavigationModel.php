<?php 

class NavigationModel{

    public function definePage($page, $userType){
        // (Evaluar primero el userType ya que pueden ser paginas diferentes para cada usuario(ejemplo: Cliente no accede a modificar usuarios))
         $pageToView = '';
        ///////// ---------------------------CASO DE ADMINISTRADOR-------------------------------- ///////
        if($userType == 1){
            if($page == 'inicio' ||
                $page == 'usuarios' ||
                $page == 'categorias' ||
                $page == 'articulos' ||
                $page == 'clientes' ||
                $page == 'ventas' ||
                $page == 'login' ||
                $page == 'pedidos' ||
                $page == 'VerDetalle'||
                $page == 'grafica'  
                ){ // (usuarios.php: pagina que contiene la tabla de administracion de usuarios)
                    $pageToView = $page . '.php';
            }else{
                $pageToView = 'notfound.php'; // Una pagina que diga que no se encontró 
            }

            ///////// ---------------------------CASO DE EMPLEADOS-------------------------------- ///////
        }else if($userType == 2){ 
            if($page == 'inicio' ||
                $page == 'ventas' ||
                $page == 'VerDetalle' ||
                $page == 'pedidos' ||
                $page == 'clientes' 
                ){ // (usuarios.php: pagina que contiene la tabla de administracion de usuarios)
                    $pageToView = $page . '.php';
            }else{
                $pageToView = 'notfound.php'; // Una pagina que diga que no se encontró 
            }



        ///////// ---------------------------CASO DE CLIENTE-------------------------------- ///////
        }else if($userType == 3){ 
            if($page == 'inicio' ||
                $page == 'micuenta' ||
                $page == 'articulos' ||
                $page == 'usuarios'||
                $page == 'pedidos' ||
                $page == 'VerDetalle' 
                ){ // (usuarios.php: pagina que contiene la tabla de administracion de usuarios)
                    $pageToView = $page . '.php';
            }else{
                $pageToView = 'notfound.php'; // Una pagina que diga que no se encontró 
            }
            
        ///////// ------------------- CASO DE VISITATE SIN REGISTRAR ---------------------- ///////
        }else{ //si no entra como ningun usuario registrado en el sistema
            if($page == 'inicio' ||
                $page == 'registro' ||
                $page == 'login' ||
                $page == 'home'
                ){ // (usuarios.php: pagina que contiene la tabla de administracion de usuarios)
                    $pageToView = $page . '.php';
            }else{
                $pageToView = 'notfound.php'; // Una pagina que diga que no se encontró 
            }
        }
        return $pageToView;
    }//Fin del definePage(){...}

}