<?php
	session_start();

	if(ISSET($_SESSION['noktp'])){
	header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">		
	<link rel="stylesheet" type="text/css" href="asset/css/custom.css">
</head>
<body class="cover">

<header class="nav navbar-fixed-top navbar-default" role="banner">
	<div class="container">
		<div class="navbar-header">
			<a href="index.php" class="navbar-brand">Pemilu</a>
		</div>
	</div>	
</header>

<div id="body">			
<div class="container">	
	<div class="row">		
	<div class="title-row">
		<div class="row">
			<div class="col-md-12">
				<h1><strong>Ayo Memilih</strong></h1>					
			</div>							
		</div>	
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="quote-row">
					<h5>"Rakyat bukan hanya objek kebijakan, tapi juga harus menentukan kebijakan."</h5>
				</div>				
			</div>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="login-form">					
		<div class="col-md-4 col-md-offset-4">					
			<form role="form" method="post" action="client.php">			
				<div class="row">
					<div class="col-md-8 form-group class="form-control"">
						<label class="sr-only" for="noktp">noktp</label>
						<input name="noktp" required="" id="noktp" class="form-control" type="text" placeholder="nomor ktp">
					</div>
					<div class="col-md-4">
						<button type="submit" class="log-btn">masuk</button>
					</div>
				</div>		
			</form>					
		</div>
	</div>			
	</div>	
</div>
</div>	
</body>
</html>
