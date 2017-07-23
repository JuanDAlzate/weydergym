<!DOCTYPE HTML>

<html>
	<head>
		<title>Weyder Gym Plataforma</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--Link para llamar al icono de la pestaña-->
		<link rel="icon" href="images/weyderlogo.jpg">
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main2.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="homepage">
		<div id="page-wrapper">
		<!--Decision que permite cerrar la sesion-->
			<?php 
				session_start();
					if(!isset($_SESSION["usuario"])){
						header("Location:index.php");
					}
			 ?>

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">

						<!-- Logo -->
							<h1 id="logo"><a href="index.html">WEYDER GYM</a></h1>

												<!-- Nav -->
							<nav id="nav">
								<ul>
									<li>
										<a href="#">Mensualidad</a>
										<ul>
											<li><a href="mensualidad.php">Creacion, Consultar</a></li>
											<li><a href="editarMensualidad.php">Editar</a></li>
											<li><a href="mensualidadVencida.php">Consultar vencidas</a></li>
										</ul>
									</li>
									<li><a href="left-sidebar.php">Consultar Personas</a></li>
									<li class="break"><a href="editar.php">Editar Persona</a></li>
									<li><a href="cierre_sesion.php">Cerrar Sesion</a></li>
								</ul>
							</nav>
					</div>

					<!-- Hero -->
						<section id="hero" class="container">
							<header>
								<h2>ACTUALIZAR PERSONA</h2>
								 <h4 class="subtitle">GYM WEYDER PLATAFORMA</h4>
								 <?php 

								 include("conexion.php");	

								 if (!isset($_POST["btn-actualizar"])) {
								 		
								 		 if(empty($_GET["id"])){
						 			 		  $id="";
										 	  $nom="";
											  $ape="";
											  $tel="";	
											  $fot="";
							 			 }else{
							 			 	 $id=$_GET["id"];
											 $nom=$_GET["nom"];
											 $ape=$_GET["ape"];
											 $tel=$_GET["xxx"];	
											 $fot=$_GET["fot"];
							 			 }
							 								 								 	# 
 								 }else{ 								 		

 								 		 $id=$_POST["id"];
 								 		 $nom=$_POST["nom"];
 								 		 $ape=$_POST["ape"];
 								 		 $tel=$_POST["tel"];

 								 		
										 $sql="UPDATE personas set nombre=:miNom, apellido=:miApe, telefono=:miTel WHERE identificacion=:miId";
 								 		 $resultado=$base->prepare($sql);
 								 		 $resultado->execute(array(":miId"=>$id,":miNom"=>$nom,":miApe"=>$ape,":miTel"=>$tel));
 								 		 header("Location:left-sidebar.php");
 								 }							 								 
								 		 					 

								 ?>
							</header>
							<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
									<div class="row 50%">
										<div class="4u"></div>
										<div class="4u 12u(mobile)">
											NOMBRE:
											<input name="nom" id="nom" value="<?php echo $nom ?>" type="text" />

											<input name="id" id="id" value="<?php echo $id ?>" type="hidden" />
										</div>
										<div class="4u"></div>
									</div>

									<div class="row 50%">
										<div class="4u"></div>
										<div class="4u 12u(mobile)">
											APELLIDO
											<input name="ape" id="ape" value="<?php echo $ape ?>" type="text" />
										</div>
										<div class="4u"></div>
									</div>

									<div class="row 50%">
										<div class="4u"></div>
										<div class="4u 12u(mobile)">
											TELEFONO
											<input name="tel" id="tel" value="<?php echo $tel ?>" type="text" />
										</div>
										<div class="4u"></div>
									</div>

									<div class="row 50%">
										<div class="4u"></div>
										<div class="4u 12u(mobile)">
											FOTO <br>
											<img src="<?php echo $fot; ?>"  width="200px" height="200px" alt="" style="border-radius:10px;">
											<input name="img" id="img" value="<?php echo $tel ?>" type="file" />
										</div>
										<div class="4u"></div>
									</div>
									
									<div class="row 50%">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" name="btn-actualizar" value="ACTUALIZAR" /></li>
												<li><input type="reset" value="RESTAURAR" /></li>
												<li><input type="button" onclick=" location.href='left-sidebar.php'" value="ATRAS" name="boton" /></li>
											</ul>
										</div>
									</div>
								</form>					
						</section>
				</div>

				


			<!-- Features 2 -->
				<div class="wrapper">
					<section class="container">
						<header class="major">
							<h2>Sed magna consequat lorem curabitur tempus</h2>
							<p>Elit aliquam vulputate egestas euismod nunc semper vehicula lorem blandit</p>
						</header>
						<div class="row features">
							<section class="4u 12u(narrower) feature">
								<div class="image-wrapper first">
									<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
								</div>
								<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
								vel sem sit dolor neque semper magna lorem ipsum.</p>
							</section>
							<section class="4u 12u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
								</div>
								<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
								vel sem sit dolor neque semper magna lorem ipsum.</p>
							</section>
							<section class="4u 12u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
								</div>
								<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
								vel sem sit dolor neque semper magna lorem ipsum.</p>
							</section>
						</div>
						<ul class="actions major">
							<li><a href="#" class="button">Elevate my awareness</a></li>
						</ul>
					</section>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<div id="footer" class="container">
						<header class="major">
							<h2>Euismod aliquam vehicula lorem</h2>
							<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur vel sem sit<br />
							dolor neque semper magna lorem ipsum feugiat veroeros lorem ipsum dolore.</p>
						</header>
						<div class="row">
							<section class="6u 12u(narrower)">
								<form method="post" action="#">
									<div class="row 50%">
										<div class="6u 12u(mobile)">
											<input name="name" placeholder="Name" type="text" />
										</div>
										<div class="6u 12u(mobile)">
											<input name="email" placeholder="Email" type="text" />
										</div>
									</div>
									<div class="row 50%">
										<div class="12u">
											<textarea name="message" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="row 50%">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" value="Send Message" /></li>
												<li><input type="reset" value="Clear form" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
							<section class="6u 12u(narrower)">
								<div class="row 0%">
									<ul class="divided icons 6u 12u(mobile)">
										<li class="icon fa-twitter"><a href="#"><span class="extra">twitter.com/</span>untitled</a></li>
										<li class="icon fa-facebook"><a href="#"><span class="extra">facebook.com/</span>untitled</a></li>
										<li class="icon fa-dribbble"><a href="#"><span class="extra">dribbble.com/</span>untitled</a></li>
									</ul>
									<ul class="divided icons 6u 12u(mobile)">
										<li class="icon fa-instagram"><a href="#"><span class="extra">instagram.com/</span>untitled</a></li>
										<li class="icon fa-youtube"><a href="#"><span class="extra">youtube.com/</span>untitled</a></li>
										<li class="icon fa-pinterest"><a href="#"><span class="extra">pinterest.com/</span>untitled</a></li>
									</ul>
								</div>
							</section>
						</div>
					</div>
					<div id="copyright" class="container">
						<ul class="menu">
							<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				</div>

		</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>