<?php 

include("config.php");

date_default_timezone_set("America/Mexico_City"); 


/*---- conexion a la base de datos-----*/
$conexion = mysql_connect($BD_HOST, $BD_USER , $BD_PASS);

 mysql_select_db($BD_NAME, $conexion) or die("error " . mysql_error());
 mysql_set_charset('utf8');


 //conexion mysqli ?

 $sqli = new mysqli($BD_HOST, $BD_USER , $BD_PASS,$BD_NAME );




    

 ?>