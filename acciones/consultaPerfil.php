<?php
require 'conexion.php';
$usr = $_GET['usr'];

$sql = mysql_query("SELECT 
                usuario.codigo,
                usuario.nombre,
                usuario.apellido,
                usuario.usuario,
                usuario.dependencia,
                dependencias.nombre_dependencia,
                usuario.extension,
                usuario.correo,
                usuario.foto
                FROM usuario
                INNER JOIN dependencias
                INNER JOIN puesto_usr
                INNER JOIN rol
                WHERE usuario.dependencia = dependencias.id_dependencia
                AND usuario.puesto = puesto_usr.id
                AND usuario.rol = rol.id_rol
                AND usuario.codigo = '$usr';") or die(mysql_error());

                $consulta = mysql_fetch_row($sql);
                $id = $consulta[0];   
                $nombre = $consulta[1];
                $apellido = $consulta[2];
                $username = $consulta[3];
                $dependencia = $consulta[5];
                $id_dependencia = $consulta[4];
                $extension = $consulta[6]; 
                $correo = $consulta[7];
                $foto = $consulta[8];


  ?>