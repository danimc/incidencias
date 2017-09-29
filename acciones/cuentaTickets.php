<?php

$consulta = mysql_query("SELECT COUNT(*) FROM tickets 
							  WHERE estado = 'Abierto'")  or die (mysql_error());

$contadorTickets = mysql_result($consulta,0);

mysql_close();
?>