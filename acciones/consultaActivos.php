<?php 
require 'conexion.php';

$sql = mysql_query('SELECT 
ac.id_activo,
ac.n_serie,
clas.clasificacion,
ac.marca,
ac.modelo,
ac.descripcion,
estado_activo.estado
FROM crm.activos ac
LEFT JOIN clasificacion_activos clas ON clas.id_clasificacion = ac.clasificacion
LEFT JOIN estado_activo ON estado_activo.id = ac.situacion ;') or die (mysql_error());


?>