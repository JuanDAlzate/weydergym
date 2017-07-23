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
										<a href="#">Dropdown</a>
										<ul>
											<li><a href="#">Lorem ipsum dolor</a></li>
											<li><a href="#">Magna phasellus</a></li>
											<li><a href="#">Etiam dolore nisl</a></li>
											<li>
												<a href="#">Phasellus consequat</a>
												<ul>
													<li><a href="#">Lorem ipsum dolor</a></li>
													<li><a href="#">Phasellus consequat</a></li>
													<li><a href="#">Magna phasellus</a></li>
													<li><a href="#">Etiam dolore nisl</a></li>
												</ul>
											</li>
											<li><a href="#">Veroeros feugiat</a></li>
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
								<h2>GYM WEYDER PLATAFORMA</h2>
								 <h4 class="subtitle">ACTUALIZAR MENSUALIDAD</h4>
								 <?php 

								 include("conexion.php");	

								 if (!isset($_POST["btn-actualizar"])) {
								 		
								 		 if(empty($_GET["cod"])){
						 			 		  $fechaP="";
										 	  $fechaV="";
											  $val="";
											  $ven="";
											  $idP="";
							 			 }else{
							 			 	 $cod=$_GET["cod"];
											 $fechaP=$_GET["fechaP"];
	 										 $fecha_pformateada = date("Y-m-d", strtotime($fechaP));
										 	 $fechaV=$_GET["fechaV"];
										 	 $fecha_vformateada = date("Y-m-d", strtotime($fechaV));

											 $val=$_GET["val"];
											 $ven=$_GET["ven"];												 
											 $idP=$_GET["idP"];
											 $fechaPrueba=$fechaP;
							 			 }
							 								 								 	
 								 }else{ 								 		

 								 		 $cod=$_POST["cod_mensu"];
 								 		 $fechaP=$_POST["fecha_p"]; 								 		 
 								 		 $fechaV=$_POST["fecha_v"];
 								 		 $val=$_POST["valor"]; 								 		 
 								 		 $idP=$_POST["id_persona"];
 								 		
										 $sql="UPDATE mensualidad set fecha_pago=:fechaP, fecha_caducidad=:fechaV, valor=:val, id_persona=:idP WHERE cod_mensualidad=:cod";
 								 		 $resultado=$base->prepare($sql);
 								 		 $resultado->execute(array(":cod"=>$cod,":fechaP"=>$fechaP,":fechaV"=>$fechaV,":val"=>$val,":idP"=>$idP));
 								 		 header("Location:mensualidad.php");
 								 }							 								 
								 		 					 

								 ?>
							</header>
							<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
									<div class="row 50%">
										<div class="4u"></div>
										<div class="4u 12u(mobile)">
											<input name="fecha_p" id="fecha_p" value="<?php echo $fecha_pformateada ?>" type="date" />	
 
											<input name="cod_mensu" id="codigo_men" value="<?php echo $cod?>" type="hidden" />
										</div>
										<div class="4u"></div>
									</div>

									<div class="row 50%">
										<div class="4u"></div>
										<div class="4u 12u(mobile)">
											<input name="fecha_v" id="fecha_v" value="<?php echo $fecha_vformateada?>" type="date" />
										</div>
										<div class="4u"></div>
									</div>

									<div class="row 50%">
										<div class="4u"></div>
										<div class="4u 12u(mobile)">
											<input name="valor" id="valor" value="<?php echo $val?>" type="text" />
										</div>
										<div class="4u"></div>
									</div>

									<div class="row 50%">
										<div class="4u"></div>
										<div class="4u 12u(mobile)">
											<input name="vencida" disabled id="vencida" value="<?php echo $ven?>" type="checkbox" />
										</div>
										<div class="4u"></div>
									</div>

									<div class="row 50%">
										<div class="4u"></div>
										<div class="4u 12u(mobile)">
											<input name="id_persona" id="id_persona" value="<?php echo $idP?>" type="text" />
										</div>
										<div class="4u"></div>
									</div>
									
									<div class="row 50%">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" name="btn-actualizar" value="ACTUALIZAR" /></li>
												<li><input type="reset" value="RESTAURAR" /></li>
												<li><input type="button" onclick=" location.href='mensualidad.php' " value="ATRAS" name="boton" /> </li>
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