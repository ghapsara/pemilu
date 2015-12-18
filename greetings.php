<?php 
	session_start();
	/*echo "terima kasih ".$_SESSION['noktp'];	*/
 ?> 
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">		
	<link rel="stylesheet" type="text/css" href="asset/css/custom.css">
 </head>
 <body background="asset/image/proklamasi_indonesia_1-finall.png">
 
 	<header class="nav navbar-fixed-top navbar-default" role="banner">
	<div class="container">
		<div class="navbar-header">
			<a href="index.php" class="navbar-brand">Pemilu</a>
		</div>
	</div>	
	</header>

	<div class="container">		
		<div class="greetings-control">					
			<div class="row greetings-quote">
				<div class="row">
					<h3>
						Terima kasih atas partisipasi anda
					</h3>
				</div>
				<div class="row">				
					<h5>"Demokrasi tidak lahir begitu saja dengan diproklamirkan dan dituliskan dalam satu piagam, melainkan dihidupkan sungguh-sungguh dalam asuhan dan latihan."
					</h5>
				</div>
			</div>
			<div class="row">
				<div>
					<a href="logout.php">
						<button class="logout-btn">
							keluar
						</button>
					</a>			
				</div>			
			</div>
		</div>
	</div>
 </body>
 </html>