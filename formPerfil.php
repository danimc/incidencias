    <?php

    require 'secciones/head.php';
    require_once 'acciones/consultaPerfil.php';
    require 'acciones/funcionesNuevoUsuario.php';

    ?>

    <!DOCTYPE html>
    <html lang="es">
        <head>
       <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
                            Perfil
                            <small>De usuario</small>
                        </h1><br>
                        <ol class="breadcrumb">
                            <li><a href="/index"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li>Perfil</li>
                        </ol>
                    </section>
                <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-widget widget-user">
                                    <div class="widget-user-header bg-aqua-active">
                                        <h3 class="widget-user-username"><?=$nombre .' ' . $apellido?></h3>
                                        <h5 class="widget-user-desc"><?= $dependencia ?></h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle" src="<?= $foto; ?>" alt="imagen de perfil">
                                    </div>
                                    <div class="box-footer">
                                        <div class="row">
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"> 0</h5>
                                                    <span class="description-text"> Tickets Reportados</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">0</h5>
                                                    <span class="description-text">Tickets abiertos</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <h5 class="description-header"> Contacto</h5>
                                                    <span class="description-text"><?= $extension ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        
                                        <h3 class="box-tittle"> Información de Usuario</h3>

                                    </div>

                                    <div class="box-body">
                                        <form enctype="multipart/form-data" role="form" action="acciones/modificar-datos-perfil" method="post">
                                        <input type="hidden" name="codigo" value="<?= $usr ?>">
                                        <h4><strong><i class="fa fa-vcard margin-r-5"></i> Nombre: </strong>
                                        <input  type="text" value="<?= $nombre ?>" name="nombre" size="20">
                                        <input type="text" name="apellido" value="<?= $apellido ?>"> </h4>
                                        <hr>
                                        <h4><strong><i class="fa fa-user margin-r-5"></i> Username:</strong>
                                        <input name="" disabled="" type="text" value="<?= $username ?>" size="15" >
                                        <input name="username" type="hidden" value="<?= $username ?>" size="15" >
                                         </h4>
                                        <hr>
                                        <h4><strong><i class="fa fa-legal margin-r-5"></i> Dependencia:</strong> 
                                        <select name="dependencia">
                                            <option value="<?= $id_dependencia ?>"><?= $dependencia ?></option>
                                            <?
                                             dependencia();
                                            ?>
                                        </select> </h4>
                                        <hr>
                                        <h4><strong><i class="fa fa-phone margin-r-5"></i>Extension:</strong>
                                        <input size="5" name="extension" type="tel" value="<?= $extension ?>"> </h4>
                                        <hr>
                                        <h4><strong><i class="fa fa-envelope margin-r-5"></i> Correo: </strong><input type="email" value="<?= $correo ?>" name="email" size="35"></h4>
                                            <hr>
    										  	<h4><strong><i class="fa fa-camera margin-r-5"></i> Imagen de Perfil</strong> <input type="file" name="userfile" placeholder="Imagen pequeña" ></h4>
    										<hr>
    									
                                            <button class="btn btn-success" type="submit">Modificar</button>
                                            <a class="btn btn-danger" href="/oag">Cancelar</a>
                                        </form>

                                    </div>
                                </div>
                            </div>
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
