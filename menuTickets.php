<?php

require 'acciones/conexion.php';
require 'secciones/head.php';
require 'secciones/tablaTickets.php';
//include ('acciones/cuentaTickets.php');
$asignado = '';

if (isset($_GET['asignado']))
 {
  $asignado = $_GET['asignado'];
}


?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Incidencias OAG | Menu de Tickets</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- tema -->
    <link rel="stylesheet" href="bootstrap/css/AdminLTE.min.css">
    <!-- Tema -->
    <link rel="stylesheet" href="bootstrap/css/skins/skin-blue.min.css">
	<!-- Tablas -->
	 <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
		
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?
        if(isset($_SESSION['estado']) == 'Autenticado'){			
			   head();
		?>
       
     
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Panel de control
                    <small>administación Tickets</small>
                </h1><br>
                <ol class="breadcrumb">
                    <li><a href="/oag"><i class="fa fa-dashboard"></i> Home</a></li>
                     <li><a href="#"><i class="fa fa-ticket"></i> Tickets</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <a href="/oag" class="btn btn-app bg-blue"><i class="fa fa-arrow-left"></i>Regresar</a>
				<a href="formNuevoticket?usr=<?=$usr?>" class="btn btn-app bg-green"><span class="fa fa-plus"></span>Nuevo Ticket</a>
        <a href="menuTickets?asignado=true" class="btn btn-app bg-orange"><span class="fa fa-search"></span>Mis Asignados</a>			   
                   <?
                         if ($msg != '')
                         {
                            echo $msg;
                            $status = '';
                         }  
                 
                   ?>
                   <div id="form_newsletter_result"></div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Tickets</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
              
<?
              if($_SESSION['rol'] == 1)
              {
                if ($asignado == 'true')
                {
                  tablaAdmon_filtrado($usr); 
                }
                else
                {
                  tablaAdmon();  
                }
              }
              else
              {
                tablaUsr();
              }
              
?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
        
			</section>
			
			
            <?php }; ?>
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

        <div class="control-sidebar-bg"></div>
    </div>
    <!-- jQuery 2.2.3 -->
    <script src="bootstrap/js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="bootstrap/js/app.min.js"></script>

    <script src="bootstrap/js/plugins.js"></script>
	  <!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>


<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

	<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
