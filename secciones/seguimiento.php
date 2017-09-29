<?php

function timeline($folio){

	$consult = mysql_query("SELECT 
h_ticket.id
,cat.categoria
,situ.situacion
,usuario.usuario
,asignado.usuario asignado
,mensaje
,fecha
,hora
FROM h_ticket
LEFT JOIN categoria_ticket cat ON cat.id_cat = h_ticket.categoria
LEFT JOIN situacion_ticket situ ON situ.id = h_ticket.estatus
LEFT JOIN usuario ON usuario.codigo = h_ticket.usr
LEFT JOIN usuario asignado ON asignado.codigo = h_ticket.asignado
WHERE folio = '$folio' ") or die(mysql_error());

	$contadoraFecha = 0;
	$contadorAsignado = '';
	$contadorEstatus = '';
	$contadorCategoria = '';
	$contadorMensaje = '';

	while ($data = mysql_fetch_array($consult)) {

		$categoria =	$data[1];
		$situacion =	$data[2];
		$usuario =		$data[3];
		$asignado = 	$data[4];
		$mensaje = 		$data[5];
		$fecha =		$data[6];
		$hora = 		$data[7];


		if ($contadoraFecha >= $fecha)
		{
			if ($contadorAsignado != $asignado && $asignado != '')
			{
				?>
		<li>
        <i class="fa fa-user bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o">  	</i> <?=$hora?></span>
            <h3 class="timeline-header"><a href="#">El ticket ha sido Asignado a: <?=$asignado?> </a></h3>          
        </div>
    	</li>
   			 <?
    			$contadorAsignado = $asignado;
			}

			if($contadorCategoria != $categoria && $categoria != '' )
			{
				?>
				 <li>
        <!-- timeline icon -->
        <i class="fa fa-tags bg-orange"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?=$hora?></span>

            <h3 class="timeline-header"><a href="">Cambio de Categoria</a> <b> <?=$usuario?></b> Cambio la categoria a <?=$categoria?> </h3>

            <div class="timeline-body">
                <?=$mensaje?>                
            </div>
        </div>
    </li>
    <?
			$contadorCategoria = $categoria;
			}

			if($contadorEstatus != $situacion && $situacion != '' )
			{
				?>
				 <li>
        <!-- timeline icon -->
        <i class="fa fa-info-circle bg-green"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?=$hora?></span>

            <h3 class="timeline-header"><a href="">Cambio de Estatus</a> <b> <?=$usuario?></b> Cambio es estatus del incidente a <?=$situacion?> </h3>

            <div class="timeline-body">
                <?=$mensaje?>                
            </div>
        </div>
    </li>
    <?
			$contadorEstatus = $situacion;
			}


		if($contadorMensaje != $mensaje && $mensaje != '' )
			{
				?>
				 <li>
        <!-- timeline icon -->
        <i class="fa fa-comment bg-purple"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?=$hora?></span>

            <h3 class="timeline-header"><a href="">Mensaje</a> <b> <?=$usuario?></b> Dice: </h3>

            <div class="timeline-body">
                <?=$mensaje?>                
            </div>
        </div>
    </li>
    <?
			$contadorMensaje = $mensaje;
			}


		} // fin del bucle por la fecha



		else
		{
			?>
			 <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">
           <?=$fecha?>
        </span>
    </li>
    <!-- /.timeline-label -->
    <?
    $contadoraFecha = $fecha;

    	if ($contadorAsignado != $asignado && $asignado != '')
			{
				?>
		<li>
        <i class="fa fa-user bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o">  	</i> <?=$hora?></span>
            <h3 class="timeline-header"><a href="#">El ticket ha sido Asignado a: <?=$asignado?> </a></h3>          
        </div>
    	</li>
   			 <?
    			$contadorAsignado = $asignado;
			}

			if($contadorCategoria != $categoria && $categoria != '' )
			{
				?>
				 <li>
        <!-- timeline icon -->
        <i class="fa fa-tags bg-orange"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?=$hora?></span>

            <h3 class="timeline-header"><a href="">Cambio de Categoria</a> <b> <?=$usuario?></b> Cambio la categoria a <?=$categoria?> </h3>

            <div class="timeline-body">
                <?=$mensaje?>                
            </div>
        </div>
    </li>
    <?
			$contadorCategoria = $categoria;
			}

			if($contadorEstatus != $situacion && $situacion != '' )
			{
				?>
				 <li>
        <!-- timeline icon -->
        <i class="fa fa-info-circle bg-green"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?=$hora?></span>

            <h3 class="timeline-header"><a href="">Cambio de Estatus</a> <b> <?=$usuario?></b> Cambio es estatus del incidente a <?=$situacion?> </h3>

            <div class="timeline-body">
                <?=$mensaje?>                
            </div>
        </div>
    </li>
    <?
			$contadorEstatus = $situacion;
			}


		if($contadorMensaje != $mensaje && $mensaje != '' )
			{
				?>
				 <li>
        <!-- timeline icon -->
        <i class="fa fa-comment bg-purple"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?=$hora?></span>

            <h3 class="timeline-header"><a href="">Mensaje</a> <b> <?=$usuario?></b> Dice: </h3>

            <div class="timeline-body">
                <?=$mensaje?>                
            </div>
        </div>
    </li>
    <?
			$contadorMensaje = $mensaje;
			}

    }



	}

}


?>