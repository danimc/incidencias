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

?>