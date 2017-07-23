<?php 

	try{
		$base=new PDO('mysql:host=localhost;dbname=weyderdb','root','1094');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET UTF8");
	}catch(Exception $e){
		die('Error' .$e->getMessage());
		echo "Lineo del error" . $e->getline();
	}

 ?>