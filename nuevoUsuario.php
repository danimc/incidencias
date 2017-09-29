<?php
header('Content-Type: text/html; charset=UTF-8');  
require 'acciones/conexion.php';
require 'secciones/head.php';
require 'acciones/funcionesNuevoUsuario.php';
//include ('acciones/cuentaTickets.php');
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
						<small>Agregar nuevo usuario</small>
					</h1><br>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li><i class="fa fa-user-plus"></i> Nuevo Usario</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-md-8">
							<!-- general form elements -->
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">Registro de Nuevo Usuario</h3>
								</div>
								<!-- /.box-header -->
								<!-- form start -->
								<form enctype="multipart/form-data" role="form" method="post" action="acciones/altaNuevoUsuario">
									<div class="box-body">
										<div class="form-group col-md-6">
											<label for="nombre">Nombre(s)</label>
											<input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Ejemplo: Juan">
										</div>
										<div class="form-group col-md-6">
											<label for="apellido">Apellidos</label>
											<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ejemplo: Lopez">
										</div>
										
										<div class="form-group col-md-4 ">
											<label for="username">Nombre de Usuario</label>
											<input type="text" class="form-control" id="username" name="username"placeholder="Jlopez"  >
											
										</div>
										<div class="col-md-12"></div>
										
										<div class="form-group col-md-4">
											<label for="contraseña">Contraseña</label>
											<input type="text" class="form-control" name="password" id="password" >
										</div>
									
										<div class="col-md-12"></div>
										
										<div class="form-group col-md-4">
											<label for="email">Correo Electronico</label>
											<input type="email" class="form-control" id="email" name="email" required placeholder="Jose.lopez@redug.udg.mx" >
										</div>
										
											<div class="form-group" align="center">
												<br>
											<img src="img/usr/team.png" width="70"> <br>
											<label for="imagenUsuario">Imagen de Usuario</label>
											
											<input type="file" name="userfile" id="imagenUsuario">

											<p class="help-block">Sube Una imagen de perfil que no exceda los 2Mb. de tamaño</p>
										</div>
									
										
										<div class="col-md-12">
											<hr>
										</div>
										
										<div class="box-header with-border col-md-12">
									<h3 class="box-title">Datos de Ubicación</h3>
								</div>
									<div class="form-group col-md-6">
											<label for="dependencia">Dependencia asignada:</label>
											<select class="form-control" id="dependencia" name="dependencia">
												<option value="0"> Sin Asignar</option>
												<?
												dependencia();
												?>
											</select>
											
										</div>	
										
										<div class="form-group col-md-6">
											<label for="puesto">Puesto</label>
											<select id="puesto" name="puesto" class="form-control">
											<option disabled="">Escoja un puesto</option>
											<?
											 puesto();
											?>
											</select>
										</div>
										<div class="form-group col-md-3">
											<label for="extension">Extension Telefonica</label>
											<input type="tel" class="form-control" id="extension" name="extension" maxlength="5" placeholder="11570">
										</div>
										
										<div class="form-group col-md-5">
											<label for="rol">Rol de usuario:</label>
										<select id="rol" name="rol" class="form-control">
											<option disabled="" value="0">Seleccione un rol</option>
											<?
											 rol();
											 ?>
										</select>
										</div>
										<div class="form-group col-md-4">
											<label for="estatus">Estatus</label>
											<select id="estatus" name="estatus" class="form-control">
											<?
											status();
											?>
											</select>
										</div>
									</div>
									<!-- /.box-body -->

									<div class="box-footer">
										<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Dar de alta</button>
										<a href="/oag" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
									</div>
									
								</form>
							</div></div>
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
