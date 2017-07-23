<?php 
	include("conexionfoto.php");
		$sql="select * from foto";
		$res=mysqli_query($cn,$sql);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueab FOTO</title>
</head>
<body>
	<form action="cargarejemplo.php"  method="POST" enctype="multipart/form-data">
		

		<input type="file" name="img" id="foto">
		<input type="submit" value="enviar">
	</form>
	<br>
	<?php 
		while ($data=mysqli_fetch_array($res)) {
				echo '<img src="'.$data['foto'].'" alt="" width="40px" height="40px">';
		}
			

		?>

</body>
</html>