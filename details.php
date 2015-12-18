<?php 
	require_once('nusoap/lib/nusoap.php');
	$client = new nusoap_client('http://satub.burhanudin.me/satub_4795/server.php?wsdl', true);

	

	if(isset($_GET['id'])){

		$idcalon = $_GET['id'];

		$result = $client->call('getDetailCalon',array('idcalon'=>$idcalon));
		//echo $result->idcalon;
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profil <?php foreach ($result as $value) {
 		echo $value['nama'];
 	} ?></title>

 	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">		
	<link rel="stylesheet" type="text/css" href="asset/css/custom.css">

 </head>
 <body>
 	<div class="container">
 		<div class="row">
 					<div class="theheader"></div>				 		
 				</div>
 		<div class="row">
 			<div class="col-md-10">		
 				<div>
 					
 				</div>
 			</div>
 			<div class="col-md-2">
 				<p>
 					
 				</p>
 			</div>
 		</div>
 	</div>
 </body>
 </html>