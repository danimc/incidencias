<?php
require 'acciones/conexion.php';
require 'secciones/head.php';
//include ('acciones/cuentaTickets.php');
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title> Incidencias OAG | Configuración del sistema</title>
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
	</head>

	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<?php
if(isset($_SESSION['estado']) == 'Autenticado')
{
	head();
	?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Panel de control
						<small>Configuración del Sistema</small>
					</h1><br>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li><i class="fa fa-gears"></i> configuración</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-md-12">
							<!-- general form elements -->
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
	</body>
</html>
