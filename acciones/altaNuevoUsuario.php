<?php
session_start();

require 'conexion.php';


$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$username = $_POST["username"];
$contra = $_POST['password'];
$email = $_POST['email'];
$dependencia = $_POST['dependencia'];
$puesto = $_POST['puesto'];
$extension = $_POST['extension'];
$rol = $_POST['rol'];
$status = $_POST['estatus'];
$Fecha= date('d-m-Y');
$Hora= date('H:i:s');


$ext = end(explode(".", $_FILES['userfile']['name']));
$target_path = "img/usr/";
$target_path = $target_path . $username .'.' .$ext ;

if(move_uploaded_file($_FILES['userfile']['tmp_name'], '../'. $target_path)) 
    {
     echo "El archivo ". basename( $_FILES['userfile']['name']). " ha sido subido";


   echo  $target_path;
} 
else
{
 print_r(error_get_last());
echo "Ha ocurrido un error, trate de nuevo!";
} 

         # Cogemos el identificador con que se ha guardado

        $id=mysql_insert_id();

	 $sql = mysql_query("INSERT INTO usuario(
    nombre,apellido,usuario,password,dependencia,puesto,rol,estatus,fecha_alta,extension,correo,foto)
    VALUES('$nombre',  '$apellido',  '$username',  '$contra','$dependencia','$puesto','$rol','$status','$Fecha','$extension','$email','$target_path')",$conexion) or die ("No ha sido posible Procesar su registro " . mysql_error());




 if(mysql_query($sql, $conexion))
    {
        
    }
    else
    {

        echo "El registro se a guardado con exito <br> ";
        echo "se redireccionara automaticamente a la pagina anterior en 3 segs.";
        echo" o de Click <a href='../menuUsuarios'>aqui</a>";
       // header('location: ../menuUsuarios');
       
    }

    mysql_close();

  //  header('../menuUsuarios');

?>