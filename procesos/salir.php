<?php
	session_start(); //Aqui si se necesita session start, por que no se esta instanciando  en el Index
	unset($_SESSION['userID']);
	unset($_SESSION['usuario']);

	session_destroy();

	header("Location: ../index.php");

 ?>