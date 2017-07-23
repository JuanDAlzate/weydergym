<!DOCTYPE HTML>
<
<html>
	<head>
		<title>Weyder Gym Plataforma</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/main2.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

	</head>
	<body class="left-sidebar">
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
							<h1 id="logo"><a href="index.php">WEYDER GYM</a></h1>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li>
										<a href="#">Mensualidad</a>
										<ul>
											<li><a href="mensualidad.php">Creacion, Consultar</a></li>
											<li><a href="editarMensualidad.php">Editar</a></li>
											<li><a href="mensualidadVencida.php">Consultar vencidas</a></li>
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
				</div>

			<!-- Main -->
				<div class="wrapper">
					<div class="container" id="main">
						<div class="row 150%">
							
							<div class="12u 12u(narrower) important(narrower)">

									<!--LLamado al archivo conexion-->
									<?php 
										include("conexion.php");
										/*$conexion=$base->query("SELECT * FROM personas");
										$registros=$conexion->fetcAll(PDO::FETCH_OBJ);*/
											echo "<h2 class='title'>Mensualidades vencidas</h2>";
											$hoy= date("Y-m-d");
											$mensualidad=$base->query("SELECT cod_mensualidad,identificacion,nombre,apellido,fecha_pago,fecha_caducidad,valor FROM mensualidad INNER JOIN personas ON mensualidad.id_persona=personas.identificacion WHERE  DATE(fecha_caducidad) <= DATE('".$hoy."')")->fetchAll(PDO::FETCH_OBJ);
											
											

											if (isset($_POST["btn-insertar"])) {
												 
													$fechaP=$_POST["fecha_pag"];
													$fechaV=$_POST["fecha_ven"];
													$val=$_POST["valor"];
													$ven=$_POST["venc"];
													$idP=$_POST["id_per"];

													$sql="INSERT INTO mensualidad (fecha_pago,fecha_caducidad,valor,vencida,id_persona) VALUES (:fechaPago,:fechaValor,:valor,:vencida,:idPersona)";
													$resultado=$base->prepare($sql);
													$resultado->execute(array(":fechaPago"=>$fechaP,":fechaValor"=>$fechaV,":valor"=>$val,":vencida"=>$ven,":idPersona"=>$idP));
													header("Location:mensualidad.php");

											}

									 ?>
									<div class="table-container">
									 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
									<table class="table-rwd">
										<tr class="fila">
											<th class="column1">Numero recibo</th>
											<th class="column1">Identificacion</th>
											<th class="column1">Nombre</th>
											<th class="column1">Apellido</th>
											<th class="column1">Fecha_pago</th>
											<th class="column1">Fecha_caducidad</th>
											<th class="column1">Valor</th>
											<th class="column1">Eliminacion</th>
										</tr>
											<?php 
												foreach($mensualidad as $men): 
											 ?>
										<tr>
											<td><?php echo $men->cod_mensualidad; ?></td>
											<td><?php echo $men->identificacion; ?></td>
											<td><?php echo $men->nombre; ?></td>
											<td><?php echo $men->apellido; ?></td>
											<td><?php echo $men->fecha_pago; ?></td>
											<td><?php echo $men->fecha_caducidad; ?></td>
											<td><?php echo $men->valor; ?></td>

											<td ><a href="eliminarMensualidad.php?cod=<?php echo $men->cod_mensualidad ?> & pag=<?php echo 1; ?>"><input type="button" class="btn" name="del" id="del" value="Borrar"></a></td>
											<!--<td><a href="editarMensualidad.php?cod=<?php echo $men->cod_mensualidad?> & fechaP=<?php echo $men->fecha_pago?> & fechaV=<?php echo $men->fecha_caducidad?> & val=<?php echo $men->valor?> & ven=<?php echo $men->vencida ?> & idP=<?php echo $men->id_persona ?> "><input type="button" class="btn" name="up" id="up" value="Actualizar"></a></td>-->
										</tr>
											<?php 
												endforeach;
											 ?>
										<tr class="fila-create">
											<td><input type="number" class="camp-c" name="cod_men" require disabled></td>
											<td><input type="date" class="camp-c" name="fecha_pag" ></td>
											<td><input type="date" class="camp-c" name="fecha_ven" ></td>
											<td><input type="number" class="camp-c" name="valor" ></td>
											<td><input type="checkbox" class="camp-c"  disabled name="venc" value="1" ></td>
											<td><input type="number" class="camp-c" name="id_per" ></td>

											<!--<td class="bot" colspan="2">
												<input type="submit" name="btn-insertar" value="Crear">
											</td>-->
										</tr>
									</table>
			
									</form>
									</div>
																
							</div>
						</div>					
					</div>
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