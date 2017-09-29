<?php
session_start();

/*------------requerimos la conexion a la bd ----------------*/
require "conexion.php";

/*se obtienen los datos de sesion del formulario ------*/
$_session["usuario"]= htmlentities($_POST["usuario"]);
$_session["pass"]= htmlentities($_POST["password"]);

/*convertimos los usuarios de sesion en variables mas simples de usar*/

$usercorrect = $_session["usuario"];
$passcorrect = $_session["pass"];

/*consulta para obtener solo los datos que me importan para el login-----*/

$sql = mysql_query("SELECT usuario,password,rol,codigo,nombre,apellido,foto
	FROM usuario
	WHERE usuario = '$usercorrect'
	AND password = '$passcorrect' ") or die (mysql_error());

$datos = mysql_fetch_array($sql);

$userLogin = $datos[0];
$passLogin = $datos[1];
$rol = $datos[2];
$idUsuario = $datos[3];
$nombre = $datos[4] . " " . $datos[5]; 
$foto =$datos[6];


if(isset($userLogin)){
	if($userLogin == $usercorrect && $passLogin == $passcorrect)
	{
					
			header('location: ../');
			$_SESSION['estado'] = 'ok'; 
			$_SESSION['usuario'] = $userLogin;
			$_SESSION['idUsuario'] = $idUsuario;
			$_SESSION['rol'] = $rol;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['foto'] = $foto;
		

	}

	else{
	
		echo "<h2> usuario o contraseña incorrecta </h2>";
		header('refresh: 5; url = ../index');
	}

}else{
	
		echo "Usuario o contraseña incorrecta";
		header('refresh: 5; url = ../index');
	}
?>