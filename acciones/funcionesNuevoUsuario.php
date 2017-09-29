<?php
require 'conexion.php';



function dependencia(){

	$sql = mysql_query('SELECT * FROM dependencias') or die(mysql_error());

	while ($dependencia = mysql_fetch_array($sql))
	{
		?>
		<option value="<?= $dependencia[0] ?>"> <?=$dependencia[1]; ?></option>
		<?
	}

}

function puesto(){

	$consulta = mysql_query('SELECT * FROM puesto_usr') or die(mysql_close());

	while ($puesto = mysql_fetch_array($consulta))
	{
		?>

		<option value="<?= $puesto[0] ?>"> <?=$puesto[1]; ?></option>
		<?
	}

}

function rol(){
	$sql = mysql_query('SELECT * FROM rol') or die(mysql_error());

	while ($rol = mysql_fetch_array($sql)) 
	{
		?>
		<option value="<?= $rol[0] ?> "> <?= $rol[1]; ?></option>
		<?

	}

}

function status(){
	$sql = mysql_query("SELECT * FROM situacion_usuarios") or die(mysql_error());

	while ($status = mysql_fetch_array($sql)) 
	{
		?>
		<option value="<?= $status[0]?>"> <?= $status[1] ?></option>
		<?
	}
}

// FUNCUIIONES PARA LOS TICKETS
function obtUsuarios(){
	$usr = $_SESSION['idUsuario'];
	$sql = mysql_query("SELECT * FROM usuario where codigo != '$usr'") or die (mysql_error());

	while ($usuarios = mysql_fetch_array($sql)) 
	{
		?>
		<option value="<?= $usuarios[0]?>"> <?=$usuarios['usuario'] ?></option>
		<?
	}

}

function obtCategorias()
{
	$qry = mysql_query("SELECT * FROM categoria_ticket") or die (mysql_error());

	while ($activo = mysql_fetch_array($qry)) 
	{ ?>
		<option value="<?= $activo[0]?>"> <?=$activo['categoria'] ?></option>
	<? }
}



?>