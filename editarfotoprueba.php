<?php 

	include("conexion.php");


	if(empty($_FILES["img"]["tmp_name"])){
		echo "ola";
	}
	else if (isset($_FILES["img"])) {
		$nombreImagen=$_FILES["img"]["name"];
		$ruta=$_FILES["img"]["tmp_name"];
		$destino="fotos/".$nombreImagen;
		if (copy($ruta,$destino)) {

			$sql="UPDATE foto set foto=:miFot WHERE cod=13";
			$resultado=$base->prepare($sql);
			if ($resultado) {
				$resultado->execute(array(":miFot"=>$destino));
				echo '<script type="text/javascript">alert("Agregado correctamente"); 	                                 window.location="pruebafoto.php";
				      </script>';
			}else{
				die("Error".mysqli_error($cn));
			}
		}else{
			echo '<script type="text/javascript">alert("No se ha copiado la imagen correctamente, Intenta con otra imagen de menor calidad"); 	                                
				      </script>';
		}
	}



 ?>