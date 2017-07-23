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
		$id=$_GET["id"];
		$base->query("DELETE FROM personas WHERE identificacion='$id'");
		header("Location:left-sidebar.php");
	 ?>
</body>
</html>