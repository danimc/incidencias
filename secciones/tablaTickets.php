<?php

$status = '';
if (isset($_GET['status']))
{
  $status = $_GET['status'];
}

if ($status == 'ok') 
{
  $msg =
   '<div class="alert alert-success alert-dismissable"> SU INCIDENTE FUE REGISTRADO CON EXITO! <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button></div>';
}
else
{
  $msg = '';
}

function tablaAdmon()
{
	require './acciones/funcionesTickets.php';
 ?>
 <div class="table-responsive col-md-12">
	 <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Folio</th>
                  <th>Fecha de Reporte</th>
			            <th>Estatus</th>
                  <th>Usuario</th>
                  <th>Incidente</th>
			         	  <th>Categoria</th>
                  <th>Acciones</th>
				
                </tr>
                </thead>
                <tbody>
               <?
               $tickera = datosTabla_Admon(); //manda llamar la consulta con los datos para la tabla del Administrador
                    $progreso = '';
                    $div = '';
                    while ($ticket = mysql_fetch_array($tickera )) 
                    {

                      if($ticket[10] == 1)
                      {
                        $progreso = 0;
                        $div = '<div class="progress progress active">
                         <div  class="progress-bar progress-bar-navy progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
                           <span class="sr-only">20% Complete</span>
                          </div>
                          </div>';
                      }
                      elseif ($ticket[10] == 2)
                      {
                        $progreso = 25; 
                         $div = '<div class="progress progress active">
                         <div  class="progress-bar progress-bar-navy progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: ' . $progreso .'%">
                           <span class="sr-only">20% Complete</span>
                          </div>
                          </div>';
                      }
                      elseif ($ticket[10] == 3) 
                      {
                        $progreso = 50;
                         $div = '<div class="progress progress active">
                         <div  class="progress-bar progress-bar-navy progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: ' . $progreso .'%">
                           <span class="sr-only">20% Complete</span>
                          </div>
                          </div>';
                      }
                      elseif ($ticket[10] == 4) 
                      {
                        $progreso = 75;
                         $div = '<div class="progress progress active">
                         <div  class="progress-bar progress-bar-navy progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: ' . $progreso .'%">
                           <span class="sr-only">20% Complete</span>
                          </div>
                          </div>';
                      }
                      elseif ($ticket[10] == 5)
                      {
                        $progreso = 100;
                        $div = '
                        <p align="center"><small class="label label-success"> <i class="fa fa-check-circle"></i> Cerrado</small></p>';
                      }

                    ?>
                <tr class="">

                  <td ><?=$ticket[0];?></td>
                  <td  title="<?=$ticket[1] . ' ' . $ticket[2];?>"><?=$ticket[1];?></td>
                  <td data-toggle="tooltip"  title="Estatus: <?=$ticket[6]?>  Asignado a: <?=$ticket[9]?>">
                   <sup>Progreso: <?=$progreso?>%</sup>
                   <?=$div?>
                  </td>
                  <td ><?=$ticket[3];?></td>
				          <td ><?=$ticket[4];?></td>
				          <td ><?=$ticket[5];?></td>
				
					
                  <td width="10" align="center"><a class="btn btn-info" href="seguimiento?folio=<?=$ticket[0]?>" title="Información y seguimiento del Ticket de servicio"><i class="fa fa-info-circle"></i> info</a>
		      
					 <!-- PRESUNTO BOTON PARA CERRAR EL TICKET DESDE LA LISTA... QUEDA PENDIENTE....

             <a class="btn btn-success" href="#" data-toggle="modal" data-target="#cerrar" title="Cerrar Ticket"><i class="fa fa-check-circle"></i></a> 
           --> 
          </td>


            
 
                </tr>
              <?}?>
               </tbody>            
              </table>

 
  </div>

   <!-- 
 -->
      
     
              <?
}

            function tablaUsr()
            {
              require './acciones/funcionesTickets.php';
              $usr = $_SESSION['idUsuario'];
              ?>
              <div class="table-responsive col-md-12">
   <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Folio</th>
                  
                  <th>Estatus</th>
                  
                  <th>Incidente</th>
                 
                  <th>Acciones</th>
        
                </tr>
                </thead>
                <tbody>
               <?
               $tickera = datosTabla_Usr($usr); //manda llamar la consulta con los datos para la tabla del Administrador
                    $progreso = '';
                    $div = '';
                    while ($ticket = mysql_fetch_array($tickera )) 
                    {

                      if($ticket[10] == 1)
                      {
                        $progreso = 0;
                        $div = '<div class="progress progress active">
                         <div  class="progress-bar progress-bar-navy progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
                           <span class="sr-only">20% Complete</span>
                          </div>
                          </div>';
                      }
                      elseif ($ticket[10] == 2)
                      {
                        $progreso = 25; 
                         $div = '<div class="progress progress active">
                         <div  class="progress-bar progress-bar-navy progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: ' . $progreso .'%">
                           <span class="sr-only">20% Complete</span>
                          </div>
                          </div>';
                      }
                      elseif ($ticket[10] == 3) 
                      {
                        $progreso = 50;
                         $div = '<div class="progress progress active">
                         <div  class="progress-bar progress-bar-navy progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: ' . $progreso .'%">
                           <span class="sr-only">20% Complete</span>
                          </div>
                          </div>';
                      }
                      elseif ($ticket[10] == 4) 
                      {
                        $progreso = 75;
                         $div = '<div class="progress progress active">
                         <div  class="progress-bar progress-bar-navy progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: ' . $progreso .'%">
                           <span class="sr-only">20% Complete</span>
                          </div>
                          </div>';
                      }
                      elseif ($ticket[10] == 5)
                      {
                        $progreso = 100;
                        $div = '
                        <p align="center"><small class="label label-success"> <i class="fa fa-check-circle"></i> Cerrado</small></p>';
                      }

                    ?>
                <tr class="">

                  <td width="10" ><?=$ticket[0];?></td>
                  <td data-toggle="tooltip"  title="Estatus: <?=$ticket[6]?>  Asignado a: <?=$ticket[9]?>">
                   <sup>Progreso: <?=$progreso?>%</sup>
                   <?=$div?>
                  </td>
                  <td ><?=$ticket[4];?></td>
                 
        
          
                  <td width="10" align="center"><a class="btn btn-info" href="seguimiento?folio=<?=$ticket[0]?>" title="Información y seguimiento del Ticket de servicio"><i class="fa fa-info-circle"></i> info</a>
          
           <!-- PRESUNTO BOTON PARA CERRAR EL TICKET DESDE LA LISTA... QUEDA PENDIENTE....

             <a class="btn btn-success" href="#" data-toggle="modal" data-target="#cerrar" title="Cerrar Ticket"><i class="fa fa-check-circle"></i></a> 
           --> 
          </td>


            
 
                </tr>
              <?}?>
               </tbody>            
              </table>

 
  </div>
           <? }
            ?>