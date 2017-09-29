<?
require "conexion.php";

   $sql = mysql_query("
   	SELECT codigo, nombre, apellido, usuario, abreviatura, nombre_dependencia, puesto, extension, estatus
	FROM crm.usuario
	INNER JOIN crm.dependencias
	WHERE dependencia = id_dependencia;") or die (mysql_error());

        
                            

                         




?>