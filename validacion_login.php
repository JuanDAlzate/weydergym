<?php 

	try{

	include("conexion.php");

	$sql="SELECT * FROM personas WHERE correo=:correo AND pass=:pass";
	$resultado=$base->prepare($sql);
	$correo=htmlentities(addslashes($_POST["email"]));
	$pass=htmlentities(addslashes($_POST["pass"]));
	$resultado->bindValue(":correo",$correo);
	$resultado->bindValue(":pass",$pass);
	$resultado->execute();
	$numero_registro=$resultado->rowCount();
	if ($numero_registro!=0) {

		session_start();
		$_SESSION["usuario"]=$_POST["email"];

			
		header("Location:left-sidebar.php");
	}else{
		header("Location:index.php");
	}


	}catch(Exception $e){
		die("Error: " . $e->getMessage());
	}


 ?>