<?php 

	require_once('nusoap/lib/nusoap.php');	
	$client = new nusoap_client('http://localhost/pemilu/server.php?wsdl', true);	

	session_start();
	
	if(isset($_POST['noktp'])){
		$noktp = $_POST['noktp'];
		$nama = $_POST['nama'];
		$jeniskelamin = $_POST['jeniskelamin'];
		$alamat = $_POST['alamat'];

		$result = $client->call('insertPenduduk',array('noktp'=>$noktp,'nama'=>$nama,'jeniskelamin'=>$jeniskelamin,'alamat'=>$alamat));
		if($result == "berhasil"){
			header("Location:admin.php");
		}		
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title> 		
 	</title>
      <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">          
      <link rel="stylesheet" type="text/css" href="asset/css/custom.css">
 </head>
 <body>

 <script type="text/javascript" src="asset/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
 	<div class="container">
 		<div class="row">
 			<form action="#" method="POST">
      			<div class="form-group">
      				<label for="penduduk-noktp" class="control-lable">noktp : </label>
      				<input type="text" class="form-control" name="noktp" />
      			</div>
      			<div class="form-group">
      				<label for="penduduk-nama" class="control-lable">nama : </label>
      				<input type="text" class="form-control" name="nama" />
      			</div>
      			<div class="form-group">
      				<label for="penduduk-jeniskelamin" class="control-lable">jenis kelamin : </label>
      				<input type="text" class="form-control" name="jeniskelamin" placeholder="laki-laki/perempuan" />
      			</div>
      			<div class="form-group">
      				<label for="penduduk-alamat" class="control-lable">alamat : </label>
      				<input type="text" class="form-control" name="alamat" />
      			</div>
                        <div class="form-group">
                              <button class="btn btn-primary" type="submit">create</button>
                        </div>
      		</form>
 		</div>
 	</div>
 </body>
 </html>