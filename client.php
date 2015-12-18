<?php 
	session_start();

	require_once('nusoap/lib/nusoap.php');
	$client = new nusoap_client('http://satub.burhanudin.me/satub_4795/pemilu/server.php?wsdl', false);

	$noktp = $_POST['noktp'];
	$result = $client->call('login',array('noktp'=>$noktp));
	
	if($result == "login success"){
	$_SESSION['noktp'] = $noktp;
	header ("location:index.php");
	} else{
	header ("location:login.php");
	}

 ?>