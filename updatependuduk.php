<?php 

	require_once('nusoap/lib/nusoap.php');	
	$client = new nusoap_client('http://localhost/pemilu/server.php?wsdl', true);	

	session_start();	
	$noktp = $_GET['id'];
      $result = $client->call('getDetailPenduduk',array('noktp'=>$noktp));            	
	
      if (isset($_POST['submit'])) {            
            $nama = $_POST['nama'];
            $jeniskelamin = $_POST['jeniskelamin'];
            $alamat = $_POST['alamat'];            
            $result = $client->call('updatePenduduk',array('noktp'=>$noktp,'nama'=>$nama,'jeniskelamin'=>$jeniskelamin,'alamat'=>$alamat));
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
                  <h2>Update data penduduk dengan nomor ktp <?php foreach ($result as $value) {
                                    echo $value['noktp'];
                              } ?></h2>
            </div>
 		<div class="row">
 			<form action="#" method="POST">      			
      			<div class="form-group">
      				<label for="penduduk-nama" class="control-lable">nama : </label>
      				<input type="text" class="form-control" name="nama" value="<?php foreach ($result as $value) {
                                    echo $value['nama'];
                              } ?>"></input>
      			</div>
      			<div class="form-group">
      				<label for="penduduk-jeniskelamin" class="control-lable">jenis kelamin : </label>
      				<input type="text" class="form-control" name="jeniskelamin" placeholder="laki-laki/perempuan" value="<?php foreach ($result as $value) {
                                    echo $value['jeniskelamin'];
                              } ?>"></input>
      			</div>
      			<div class="form-group">
      				<label for="penduduk-alamat" class="control-lable">alamat : </label>
      				<input type="text" class="form-control" name="alamat" value="<?php foreach ($result as $value) {
                                    echo $value['alamat'];
                              } ?>"></input>
      			</div>
                        <div class="form-group">
                              <button class="btn btn-primary" type="submit" name="submit">update</button>
                        </div>
      		</form>
 		</div>
 	</div>
 </body>
 </html>