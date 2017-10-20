<?php
require 'acciones/conexion.php';
require 'secciones/head.php';
include ('acciones/consultaActivos.php');
?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Incidencias OAG | Menu de Activos</title>
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
                    <small>administación de Activos</small>
                </h1><br>
                <ol class="breadcrumb">
                    <li><a href="/oag"><i class="fa fa-dashboard"></i> Home</a></li>
                     <li><a href="#"><i class="fa fa-barcode"></i> Activos</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <a href="/oag" class="btn btn-app bg-blue"><i class="fa fa-arrow-left"></i>Regresar</a>
        <a href="nuevoUsuario.html" class="btn btn-app bg-green"><span class="fa fa-plus"></span>Importar</a>
        <a href="#" class=" btn btn-app bg-yellow"><i class="fa fa-file-excel-o"></i>Exportar</a>
        <a href="#" class="btn btn-app bg-maroon"><i class="fa fa-tv"></i>Areas de Trabajo</a>
        
        
           <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Activos dados de alta:</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example2" class="table table-bordered table-striped dataTable">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>N° de serie</th>
                  <th>Categoria</th>
                  <th>marca</th>
                  <th>modelo</th>
                  <th>Descripción</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                   <? while($datos = mysql_fetch_array($sql))
                   { 
                        if($datos['estado'] == 'activo')
                        {
                            $bg_status = 'success';
                        } 
                        else
                        {
                            $bg_status = 'danger';
                        }
                        ?>
                <tr class="<?=$bg_status?>">
                  <td><?= $datos[0] ?></td>
                  <td><?= $datos[1] ?></td>
                  <td><?= $datos[2] ?></td>
                  <td><?= $datos[3] ?></td>
                  <td><?= $datos[4] ?></td>
                  <td><?= $datos[5] ?></td>
                  <td><a class="btn btn-info" href="#" title="Editar usuario"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger" href="#" title="Cambiar estatus del usuario"><i class="fa fa-close"></i></a> </td>
                </tr>
                <?}?>
              
                </tbody>
             
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
        </div>
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
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
</body>
</html>
