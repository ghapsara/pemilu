<?php 
	require_once('nusoap/lib/nusoap.php');	
	$client = new nusoap_client('http://localhost/pemilu/server.php?wsdl', true);	

	session_start();
	if(isset($_SESSION['noktp'])){		

		$noktp = $_SESSION['noktp'];
		$checkvote = $client->call('checkVote',array('noktp'=>$noktp));
		if($checkvote=="sudah memilih"){
			//echo "sudah memilih";
			header("location:greetings.php");			
		}
		else
		{
			$result = $client->call('getAllCalon',array());
			$penduduk = $client->call('getDetailPenduduk',array('noktp'=> $noktp));
		}
	}	
	else{
		header("location:login.php");
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

<script type="text/javascript" src="asset/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
	<header class="nav navbar-fixed-top navbar-default" role="banner">
		<div class="container">
			<div class="navbar-header">	
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>			
				<a href="index.php" class="navbar-brand">Pemilu</a>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<div class="navbar-right">
					<ul class="nav navbar-nav ">
						<li>
							<a href="logout.php">keluar</a>	
						</li>
					</ul>					
				</div>				
			</nav>
		</div>	
	</header>
 	<div id="body" class="container"> 	
 		<div class="row">
 			<div class="head-row">  					
	 			<?php foreach ($penduduk as $value) {?>
	 				<div class="col-md-3 head-row-control">
	 					<h2>
	 						Selamat Memilih
	 					</h2>	 					
	 					<h3>
		 					<?php if($value['jeniskelamin']=="perempuan") {echo "Ibu";} else echo "Bapak"; ?>
		 					<?php echo $value['nama']; ?>
	 					</h3>
	 				</div>	 			
	 			 <?php } ?> 	 			 
 			</div>
 			<!-- <div class="head-row-control">
	 			 	
	 		</div>	 -->	
 		</div>	
 		<div class="row">
	 		<div class="col-md-12 col-centered vote-form">
	 			<?php foreach ($result as $value) {?> 				
			 		<div class="col-md-3 vote-form-control">
			 			<div class="vote-form-item1">
			 				<img src="asset/image/013.jpg" class="img-circle center-block img-responsive img-calon">
			 			</div>
			 			<div class="vote-form-item2">
			 				<h3><?php echo $value['nocalon']; ?></h3>
			 			</div>
			 			<div class="vote-form-item3">		 				
			 				<a href="<?php echo "details.php?id=".$value['idcalon']; ?>" class="formitem-link">
			 					<h4><strong><?php echo $value['nama']; ?></strong></h4>
			 				</a>
			 			</div>
			 			<div class="vote-form-item4">
			 				<h5><?php echo $value['partai']; ?></h5>
			 			</div>
			 			<div class="vote-form-item5">
			 				<h5><?php echo $value['visimisi']; ?></h5>
			 			</div>
			 			<div class="vote-form-item6">
			 				<a href="<?php echo "vote.php?id=".$value['idcalon'] ; ?>">
			 					<button class="vote-btn">pilih</button>
			 				</a>
			 			</div>
			 		</div>		 		 					 	
			 	<?php } ?>	
	 		</div>
 		</div> 		
 	</div> 	
 </body>
 </html>