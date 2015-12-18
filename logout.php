<?php 

	session_start();

	if(ISSET($_SESSION['noktp'])){
	UNSET($_SESSION['noktp']);
	}
	header("location: index.php");
	session_destroy();
 ?>