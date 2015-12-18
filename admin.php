<?php 
	require_once('nusoap/lib/nusoap.php');	
	$client = new nusoap_client('http://localhost/pemilu/server.php?wsdl', true);	

	session_start();

	$result = $client->call('getAllPenduduk',array());
	//var_dump($result);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">		
	<link rel="stylesheet" type="text/css" href="asset/css/custom.css">
 </head>
 <body>
<script type="text/javascript" src="asset/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>

<div class="container">
	<div class="row">
		<div>
			<a href="creatependuduk.php">
				<button type="button" class="btn btn-primary">create new</button>
			</a>
		</div>
	</div>
	<div class="row">
		<table class="table table-striped">
 		<thead>
 			<tr>
 				<th>noktp</th>
 				<th>nama</th>
 				<th>jenis kelamin</th>
 				<th>alamat</th>
 				<th>action</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php foreach ($result as $value) {?>
 				<tr>
 					<td><?php echo $value['noktp']; ?></td>
 					<td><?php echo $value['nama'];?></td>
 					<td><?php echo $value['jeniskelamin']; ?></td>
 					<td><?php echo $value['alamat']; ?></td>
 					<td>
 						<div> 		
 							<a href="<?php echo "updatependuduk.php?id=".$value['noktp'] ; ?>">				 				 								
 							<button class="btn btn-info">edit</button> 						
 							</a>	
 						</div>
 						<div>
 							<a href="<?php echo "deletependuduk.php?id=".$value['noktp']; ?>">
 								<button class="btn btn-warning">delete</button>
 							</a>
 						</div>
 					</td>
 				</tr>
 			<?php } ?>
 		</tbody>
 	</table>	
	</div>
</div> 	
 </body>
 </html>