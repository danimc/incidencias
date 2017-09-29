<?php
require 'conexion.php';

$folio = $_SESSION['folioTicket'];





$sql = mysql_query("SELECT *
						FROM tickets 
						INNER JOIN usuario 
						WHERE tickets.usuarioT = usuario.idUsuario
						AND tickets.folio = '$folio'") or die (mysql_error());

$datos = mysql_fetch_array($sql);
					//Variables del Usuario que levanto el ticket
					 	$idUsuario = $datos["idUsuario"];
						$username = $datos["usuario"];
						$nombre = $datos["nombre"] . " " . $datos["apellidoP"] . " " . $datos["apellidoM"];	
						$area = $datos["area"];
						$correo = $datos["correo"];
						
						//Variables del ticket	
						$folioTicket = $datos["folio"];
						$fechainicio = $datos["fechaInicio"] . " " . $datos["horaInicio"];
						$fechaFinal = $datos["fechaFin"] . " " . $datos["horaFin"];
						$tipo = $datos["tipo"];
						$descripcion = $datos["descripcion"];
						$status = $datos["estado"];








?>