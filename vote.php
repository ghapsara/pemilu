<?php 
	require_once('nusoap/lib/nusoap.php');		
	$client = new nusoap_client('http://satub.burhanudin.me/satub_4795/server.php?wsdl', true);

	session_start();

	if(isset($_SESSION['noktp'])){

		$noktp = $_SESSION['noktp'];
		$idcalon = $_GET['id'];	

		$checkvote = $client->call('checkVote',array('noktp'=>$noktp));
		if($checkvote=="sudah memilih"){			
			header("location:greetings.php");			
		}
		else if ($checkvote == "belum memilih") {			
			$vote = $client->call('voteCalon',array('noktp'=>$noktp,'idcalon'=>$idcalon));
			header("location:greetings.php");
		}		
	}
	else{
		header("location:login.php");
	}	
 ?>