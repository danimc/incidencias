<?php

function tablaAdmon_filtrado($usr)
{
  require './acciones/funcionesTickets.php';
  $tickera = datosTabla_pendiente_incio($usr);
 ?>
 <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Mis Tickets Pendientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th ># Folio</th>
                  <th>Incidencia</th>
                  <th>Solicitante</th>
                  <th >Estado</th>
                </tr>
                <?while ($datos = mysql_fetch_array($tickera)) 
                {?>
              
              <tr data-toggle="tooltip" data-placement="right"  title= "Solicitado desde: <?=$datos['fecha_inicio']?> ">

                  <td><?=$datos['folio']?></td>
                  <td><?=$datos['titulo']?></td>
                  <td><?=$datos['usuario']?></td>                
                  <td><a href="seguimiento?folio=<?=$datos['folio']?>"><span class="badge bg-red"><?=$datos['situacion']?></span></a></td> 
                </tr>
             
                 <?
                } ?>
                
               
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>
        </div>
              <?
}
?>