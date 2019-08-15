<?php 
	unset($_SESSION['userID']);
	unset($_SESSION['usuario']);

	session_destroy();

	header("Location: ../index.php");

 ?>