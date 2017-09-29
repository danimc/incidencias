<?php 
require 'conexion.php';

$sql = mysql_query('SELECT 
ac.id_activo,
ac.n_serie,
clas.clasificacion,
ac.marca,
ac.modelo,
ac.descripcion,
situacion_activos.situacion
FROM crm.activos ac
LEFT JOIN clasificacion_activos clas ON clas.id_clasificacion = ac.clasificacion
LEFT JOIN situacion_activos ON situacion_activos.id_situacion = ac.situacion ;') or die (mysql_error());


?>