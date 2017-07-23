<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Weyder Gym software</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
		include("conexion.php");
		$codigo=$_GET["cod"];
		$base->query("DELETE FROM mensualidad WHERE cod_mensualidad='$codigo'");
	//	header("Location:mensualidad.php");
		if($_GET['pag']==1){
			header("Location:mensualidadVencida.php");
		}else{
			header("Location:mensualidad.php");
		}
	 ?>
</body>
</html>