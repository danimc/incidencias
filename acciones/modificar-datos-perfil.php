<?php 
require 'conexion.php';

$codigo = $_POST['codigo'];
$nombre = $_POST["nombre"];
$username = $_POST['username'];
$apellido = $_POST["apellido"];
$email = $_POST['email'];
$dependencia = $_POST['dependencia'];
$extension = $_POST['extension'];


// codigo para cargar foto
	$ext = end(explode(".", $_FILES['userfile']['name']));

	if ($ext == '') {
		$ext = 'jpg';
	}

	$target_path = "img/usr/";
	$target_path = $target_path . $username .'.' .$ext ;

	if(move_uploaded_file($_FILES['userfile']['tmp_name'], '../'.$target_path)) 
	    {
	     echo "El archivo ". basename( $_FILES['userfile']['name']). " ha sido subido";
		
	} 
	else
	{
		

	} 

	$update="Update usuario Set
				nombre='$nombre',
				apellido='$apellido',
				correo='$email',
				dependencia='$dependencia',
				extension='$extension',
				foto='$target_path'
				WHERE codigo='$codigo'";
		
		mysql_query($update);

	   header('location: ../perfil?usr='.$codigo);

	//fin de codigo para cargar foto

	
	 


	?>