<?php 
	
	require_once('nusoap/lib/nusoap.php');	
	$client = new nusoap_client('http://satub.burhanudin.me/satub_4795/server.php?wsdl', true);	

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