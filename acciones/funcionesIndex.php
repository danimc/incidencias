<?php

function grafica_categorias()
{
	$correo = 0;
	$bd = 0;
	$hardware = 0;
	$software = 0;
	$red = 0;
	$documentos = 0;
	$telefonia = 0;
	$impresora = 0;
	$incidencias = 0;
	$otro = 0;

$qry = mysql_query("SELECT
		categoria
		FROM ticket") or die(mysql_error());

		while ($cat = mysql_fetch_array($qry)) {

			if($cat[0] == 1)
			{
				$correo++;
			}
			if($cat[0] == 2)
			{
				$bd++;
			}
			if($cat[0] == 3)
			{
				$hardware++;
			}
			if($cat[0] == 4)
			{
				$software++;
			}
			if($cat[0] == 5)
			{
				$red++;
			}
			if($cat[0] == 6)
			{
				$documentos++;
			}
			if($cat[0] == 7)
			{
				$telefonia++;
			}
			if($cat[0] == 8)
			{
				$impresora++;
			}
			if($cat[0] == 9)
			{
				$incidencias++;
			}
			if($cat[0] == 10)
			{
				$otro++;
			}
		}

    $datos['correo'] = $correo;
    $datos['bd'] = $bd;
    $datos['hardware'] = $hardware;
    $datos['software'] = $software;
    $datos['red'] = $red;
    $datos['documentos'] = $documentos;
    $datos['telefonia'] = $telefonia;
    $datos['impresora'] = $impresora;
    $datos['incidencias'] = $incidencias;
    $datos['otro'] = $otro;

    return $datos;		
}

function grafica_estatus()
{
	$conta = 0;
	$abierto = 0;
	$asignado = 0;
	$proceso = 0;
	$resuelto = 0;
	$cerrado = 0;
	$pendiente = 0;
	$qry = mysql_query("SELECT
		estatus
		FROM ticket") or die(mysql_error());

		while ($esta = mysql_fetch_array($qry)) 
		{
			if($esta[0] == 1)
			{
				$abierto++;
			}
			if($esta[0] == 2)
			{
				$asignado++;
			}
			if($esta[0] == 3)
			{
				$proceso++;
			}
			if($esta[0] == 4)
			{
				$resuelto++;
			}
			if($esta[0] == 5)
			{
				$cerrado++;
			}
			if($esta[0] == 6)
			{
				$pendiente++;
			}

				 $conta++;
		}


		 $datos['abierto'] 		= ($abierto / $conta) * 100;
	 	 $datos['asignado'] 	= ($asignado / $conta) * 100;
	 	 $datos['proceso'] 		= ($proceso / $conta) * 100;
	 	 $datos['resuelto'] 	= ($resuelto / $conta) * 100;
	 	 $datos['cerrado'] 		= ($cerrado / $conta) * 100;
	 	 $datos['pendiente'] 	= ($pendiente / $conta) * 100;
	 	 $datos['conta']		= $conta;
	 	 return $datos;
}
?>