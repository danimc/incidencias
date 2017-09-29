<?php
include('funcionesTickets.php');
require 'conexion.php';

date_default_timezone_set("America/Mexico_City"); 

$reportante = $_POST['codigo'];
$usuarioIncidente = $_POST['usrIncidente'];
$dependencia = $_POST['dependencia'];
$titulo = $_POST['incidente'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$estatus = '1';
$Fecha= date('d-m-Y');
$Hora= date('H:i:s');

//Variable que contiene la consulta del Ticket

$consulta = "INSERT INTO ticket(
fecha_inicio
,hora_inicio
,usr_reportante
,usr_incidente
,categoria
,titulo
,Descripcion
,estatus)
 VALUES(
  '$Fecha'
 ,'$Hora'
 ,'$reportante'
 ,'$usuarioIncidente'
 ,'$categoria'
 ,'$titulo'
 ,'$descripcion'
 ,'$estatus')";


//	SUBIENDO DATOS CON MYSQLi

/*$resultado = $sqli -> query($consulta)|| die("Ha ocurrido un error al guardar los datos " . $sqli ->connect_errno);
if($resultado)
{
echo "Enhorabuena, la acción ha sido llevada a cabo con éxito";
}
else
{
echo "Ha ocurrido un error";
}
*/

//SUBIENDO DATOS CON MYSQL
//$resultado = mysql_query($consulta) or die(mysql_error());

if(mysql_query($consulta, $conexion))
    {
    	$id = mysql_insert_id();
    	email_altaTicket($id,$usuarioIncidente,$titulo,$descripcion,$categoria,$Fecha,$Hora);
    	
        header('location: ../menuTickets?status=ok');

        
    }
    else
    {
        $msg = 'ERROR';
    		echo '<div class="alert alert-success"><p><i class="fa fa-check"></i> '.$msg.'</p></div>';
    	
        header('location: ../menuTickets');
       
    }

    mysql_close();



?>