<?php
require 'acciones/conexion.php';
require 'acciones/consultaUsr.php';
require 'secciones/head.php';

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
        <?php
        if(isset($_SESSION['estado']) == 'Autenticado'){
			 head(); 
		?>
        
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Panel de control
                    <small>administación de Usuarios</small>
                </h1><br>
                <ol class="breadcrumb">
                    <li><a href="/oag"><i class="fa fa-dashboard"></i> Home</a></li>
                     <li><a href="#"><i class="fa fa-users"></i> Usuarios</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <a href="/oag" class="btn btn-app bg-blue"><i class="fa fa-arrow-left"></i>Regresar</a>
				<a href="nuevoUsuario" class="btn btn-app bg-green"><span class="fa fa-plus"></span>Nuevo Usuario</a>
				
				
				   <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Usuarios Registrados</h3>
              <p>Leyenda:</p>
              <div class="btn btn-xs bg-green">Activo</div>
              <div class="btn btn-xs bg-red">Licencia</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>

                <tr>
                  <th>Id</th>
                  <th>username</th>
                  <th>Nombre</th>
                  <th>Unidad</th>
                  <th>puesto</th>
				  <th>contacto</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                   <?php while($datos = mysql_fetch_array($sql))
                   { 
                        if($datos['estatus'] == 1)
                        {
                            $bg_status = 'success';
                        } 
                        else
                        {
                            $bg_status = 'danger';
                        }
                        ?>
                
                <tr class="<?=$bg_status?>">
                  <td><?= $datos['codigo']; ?></td>
                  <td><?= $datos['usuario']; ?></td>
                  <td><?= $datos['nombre'] . ' ' . $datos['apellido']; ?></td>
                  <td title="<?= $datos['nombre_dependencia']; ?>"><?= $datos['abreviatura']; ?></td>
                  <td><?= $datos['puesto']; ?></td>
				  <td><?= $datos['extension']; ?></td>
                  <td><a class="btn btn-info btn-xs" href="formPerfil.php?usr=<?=$datos['codigo'] ?>" title="Editar usuario"><i class="fa fa-pencil"></i> Editar Usuario</a> </td>
                </tr>
              <?php } ?>
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
      "autoWidth": false
    });
  });
</script>
</body>
</html>
