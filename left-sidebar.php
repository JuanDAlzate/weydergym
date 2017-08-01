<!DOCTYPE HTML>

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
											$registros=$base->query("SELECT * FROM personas ORDER BY apellido")->fetchAll(PDO::FETCH_OBJ);

											if (isset($_POST["btn-insertar"])) {
												 
													$id=$_POST["id"];
													$nom=$_POST["nom"];
													$ape=$_POST["ape"];
													$tel=$_POST["tel"];

													if (isset($_FILES["img"])) {
														$nombreImagen=$_FILES["img"]["name"];
														$ruta=$_FILES["img"]["tmp_name"];
														$destino="fotos/".$nombreImagen;
														if (copy($ruta,$destino)) {

															$sql="INSERT INTO personas (identificacion,nombre,apellido,telefono,foto) VALUES (:id,:nom,:ape,:tel,:fot)";
															$resultado=$base->prepare($sql);
															if ($resultado) {
																$resultado->execute(array(":id"=>$id,":nom"=>$nom,":ape"=>$ape,":tel"=>$tel,":fot"=>$destino));
																echo '<script type="text/javascript">alert("Agregado correctamente"); 	                                 window.location="left-sidebar.php";
																      </script>';
															}else{
																die("Error".mysqli_error($base));
															}
														}else{
															echo '<script type="text/javascript">alert("No se ha copiado la imagen correctamente"); 	                                
																      </script>';
														}
													}													
													

											}

									 ?>
									 <div class="table-container">
									 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
									<table class="table-rwd">
										<tr class="fila">
											<th class="column1">Identificacion</th>
											<th class="column1">Nombre</th>
											<th class="column1">Apellido</th>
											<th class="column1">Telefono</th>
											<th class="column1">Foto</th>
											<th class="column1">Eliminacion</th>
											<th class="column1"> Actualizacion </th>
										</tr>
											<?php 
												foreach($registros as $persona): 
											 ?>
										<tr>
											<td><?php echo $persona->identificacion; ?></td>
											<td><?php echo $persona->nombre; ?></td>
											<td><?php echo $persona->apellido; ?></td>
											<td><?php echo $persona->telefono; ?></td>
											<td><img src="<?php echo $persona->foto; ?>"  class="img-mostrada" alt=""></td>



											<td ><a href="eliminar.php?id=<?php echo $persona->identificacion ?>"><input type="button" class="botones" name="del" id="del" value="Borrar"></a></td>
											<td><a href="editar.php?id=<?php echo $persona->identificacion?> & nom=<?php echo $persona->nombre?> & xxx=<?php echo $persona->telefono?> & ape=<?php echo $persona->apellido?> & fot=<?php echo $persona->foto?> "><input type="button" class="botones" name="up" id="up" value="Actualizar"></a></td>
										</tr>
											<?php 
												endforeach;
											 ?>
										<tr class="fila-create">
											<td><input type="number" class="camp-c" placeholder="Identificacion" name="id" title="Ingrese la identificacion" required></td>
											<td><input type="text" class="camp-c" placeholder="Nombre" name="nom" required></td>
											<td><input type="text" class="camp-c" placeholder="Apellido" name="ape" required></td>
											<td><input type="text" class="camp-c" placeholder="Telefono" name="tel" required></td>
											<td><input type="file" class="camp-c" placeholder="Foto" name="img" required></td>

											<td class="bot" colspan="2">
												<input type="submit" class="botones" name="btn-insertar" value="Insertar">
											</td>
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