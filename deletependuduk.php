<?php 
	
	require_once('nusoap/lib/nusoap.php');	
	$client = new nusoap_client('http://localhost/pemilu/server.php?wsdl', true);	

	session_start();
	$noktp = $_GET['id'];
	$result = $client->call('deletePenduduk',array('noktp'=>$noktp));
	if($result=="berhasil"){
		header("location:admin.php");
	}
	else{
		echo "gagal";
	}
 ?>