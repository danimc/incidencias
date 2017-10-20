<?php
// require 'acciones/conexion.php';
require 'secciones/head.php';
require 'acciones/funcionesTickets.php';
require 'secciones/seguimiento.php'



?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Incidencias OAG</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- tema -->
    <link rel="stylesheet" href="bootstrap/css/AdminLTE.min.css">
    <!-- Tema -->
    <link rel="stylesheet" href="bootstrap/css/skins/skin-blue.min.css">

    <link rel="stylesheet" type="text/css" href="plugins/text/bootstrap3-wysihtml5.css">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
  if(isset($_SESSION['estado']) == 'Autenticado'){          
  
    head();
      ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Seguimiento
            <small>De Incidente</small>
          </h1><br>
          <ol class="breadcrumb">
            <li><a href="/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Tickets</li><li>Seguimiento Incidentes</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <a href="/oag/menuTickets" class="btn btn-app bg-blue"><i class="fa fa-arrow-left"></i>Regresar</a>
          <a href="#" data-toggle="modal" data-target="#cerrar" class="btn btn-app bg-red"><span class="fa fa-lock"></span>Cerrar Ticket</a>
          <div class="row">
            <div class="col-md-12">
              <?
    $dato = infoTicket(); // pasa el valor de la variable de consulta 

    if($_SESSION['rol'] == 1)
    {


              ?>

              <div id="mensaje"></div>
              <div class="col-md-4">
                <div class="box box-primary">
                  <div class="box-header with-border">                    
                    <h4 class="box-tittle"> Datos del solicitante</h4>
                  </div>
                  <div class="box-body">
                    <strong><i class="fa fa-vcard margin-r-5"></i> Usuario: </strong> <?=$dato[3] ?>
                    <hr>
                    <!--  <h4><strong><i class="fa fa-user margin-r-5"></i> Username:</strong> <?=$username?></h4>
<hr> -->
                    <strong><i class="fa fa-legal margin-r-5"></i> Dependencia:</strong> <?=$dato[4]?>
                    <hr>
                    <strong><i class="fa fa-phone margin-r-5"></i>Extension:</strong> <?=$dato[5]?>
                    <hr>
                    <strong><i class="fa fa-envelope margin-r-5"></i> Correo: </strong><a href='mailto:<?=$dato[6]?>'>
                    <?=$dato[6]?></a>
                  </div>
                </div>  
              </div>

              <?
    }
              ?>
              <!--Fin de la carta de datos del solicitante-->

              <div class="col-md-8">
                <div class="box box-success">
                  <div class="box-header with-border">                    
                    <h4 class="box-tittle"> Información del Incidente</h4>
                  </div>
                  <div class="box-body">
                    <table class="table">
                      <tr>
                        <th>Num. de Folio:</th><td><?=$dato[0]?></td><td>
                        <? 
                if ($_SESSION['rol'] == 1)
                {
                        ?>
                        Asignar <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus"></i></button>
                        <?}
    else
    {
                        ?>Asignado a: <?=$dato[11]?>
                        <?
    }
                        ?>
                        </td>
                      </tr><tr>
                      <th>Fecha de Reporte:</th><td><?=$dato[1] .' ' . $dato[2]?></td><th>Fecha de Finalizacion:</th><td>---</td>
                      </tr><tr>
                      <th>Tipo de Incidencia</th><td><?=$dato[8]?></td><th>Estatus: </th><td><?=$dato[10]?></td>
                      </tr><tr>
                      <th>Incidente:</th><td colspan="3"><?=$dato[7]?></td>
                      </tr><tr>
                      <th>Descripción: </th><td colspan="3"><?=$dato[9]?></td>
                      </tr>


                    </table>
                  </div>
                </div>  
              </div>
              <div class="col-md-12">

                <div class="box box-danger">
                  <? if ($_SESSION['rol'] == 1)
                        {
                  ?>
                  <div class="box box-header with-border">                    
                    <h4 class="box-tittle"> Seguimiento del Ticket</h4>
                    <div class="col-md-3">
                      <b>Asignado a:</b> <?=$dato[11]?> 
                    </div>
                    <div class="col-md-2">

                      <form id="actualizaDatos" method="POST" action="acciones/funcionesTickets">
                        <select name="estatus" class="form-control">
                          <option value="0">Cambiar Estatus</option>
                          <? obtSituacion($dato[12]); ?>

                        </select>
                        </div>
                      <div class="col-md-2">
                        <select name="categoria" class="form-control">
                          <option value="0">Cambiar categoria</option>
                          <? obtCategorias() ?>
                        </select>
                      </div>
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <input type="hidden" name="folio" value="<?=$dato[0]?>">
                        <input type="hidden" name="usr" value="<?=$usr?>">
                        <input type="hidden" name="asignado" value="<?=$dato[11]?> ">
                        <button type="submit" class="form-control btn btn-success">Actualizar</button>   
                      </div>  
                      </form>
                  </div>
                  <?}?>

                </div>
                <ul class="timeline">
                  <? timeline($dato[0]); ?>  
                </ul>
                <div class="box box-body">
                  <form id="seguimiento" method="POST" action="acciones/funcionesTickets">
                    <textarea id="chat" name="chat" class="form-control" placeholder="Ingrese su Mensaje"></textarea>
                    <input type="hidden" name="folio" value="<?=$dato[0]?>">
                    <input type="hidden" name="usr" value="<?=$usr?>">
                    <br>
                    <button type="submit" class="btn btn-success"><i class="fa fa-comment"></i> Enviar Mensaje</button>
                  </form>
                </div>



              </div>
            </div>

          </div>

        </section>
        <?}
else{
  header('location: login');
} ?>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          +info
        </div>
        <!-- Default to the left -->
        <strong>Incidencias OAG</strong> Desarrollado por L. Daniel Mora C.
      </footer>

      <!-- Control Sidebar -->

      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Asignar A un Ingeniero</h4>
            </div>
            <div class="modal-body">
              <p>Asigne a un ingeniero que se hara cargo de este incidente y llevara el segimiento del mismo.</p>

              <form id="asignarUsr" method="POST" action="funcionesTickets">

                <select name="ingeniero" class="form-control">
                  <option>Elegir a un Ingeniero de la lista</option>
                  <?seleccionarAsigando();?>
                </select>
                <input type="hidden" name="folio" value="<?=$dato[0]?>">
                <input type="hidden" name="usr" value="<?=$usr?>">
                </div>
              <div class="modal-footer">
                <button type="submit"   class="btn btn-success"><i class="fa fa-check"></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>

                </form>
            </div>
          </div>

        </div>
      </div>




      <div class="modal fade" id="cerrar" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-red">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title " align="center">Cerrar Ticket de Servicio</h4>
            </div>
            <div class="modal-body">
              <div class="icon" align="center">
                <img src="img/advertencia.png">
              </div>
              <h3 align="center">ATENCION!</h3>
              <h4 align="center">Esta a punto de cerrar un ticket de servicio.
                <br> <b>Ingrese la solución al incidente</b></h4>

              <form id="cierra" method="POST" action="">
                <textarea class="form-control" name="solucion" placeholder="¿Cual fue la Solucion?"></textarea>  
                <input type="hidden" name="cerrado" value="si">
                <input type="hidden" name="folio" value="<?=$dato[0]?>">
                <input type="hidden" name="usr" value="<?=$usr?>">
                </div>
              <div class="modal-footer">
                <button type="submit"   class="btn btn-success"><i class="fa fa-check"></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
                <!-- jQuery 2.2.3 -->
                <script src="bootstrap/js/jquery-2.2.3.min.js"></script>
                <!-- Bootstrap 3.3.6 -->
                <script src="bootstrap/js/bootstrap.min.js"></script>
                <!-- AdminLTE App -->
                <script src="bootstrap/js/app.min.js"></script>

                <script src="plugins/text/bootstrap3-wysihtml5.all.js"></script>

                <script type="text/javascript">
                  $('#chat').wysihtml5();
                </script>

                <script src="bootstrap/js/plugins.js"></script>
                </body>
              </html>
