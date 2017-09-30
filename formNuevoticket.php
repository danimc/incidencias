<?php
require 'secciones/head.php';
require_once 'acciones/consultaPerfil.php';
require 'acciones/funcionesNuevoUsuario.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Incidencias OAG | Nuevo Ticket</title>
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

        <link rel="stylesheet" href="bootstrap/css/bootstrap-select.min.css">
        <!--TextArea-->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
                        Nuevo
                        <small>Ticket de Servicio</small>
                    </h1><br>
                    <ol class="breadcrumb">
                        <li><a href="/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li>Nuevo Ticket</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-tittle"> Detalles del Reportante </h3>
                                </div>
                                <div class="box-body">
                                    <form enctype="multipart/form-data" role="form" action="acciones/nuevoTicket" method="post" id="form_newsletter">
                                        
                                        <input type="hidden" id="codigo" name="codigo" value="<?= $usr ?>">
                                        <div class="form-group ">
                                            <h4><strong><i class="fa fa-vcard margin-r-5"></i>¿Que usuario presenta el incidente?: </strong></h4>
                                        </div>

                                        <div class="form-group col-md-12" >
                                            <select class="form-control selectpicker" id="usrIncidente" data-live-search="true" name="usrIncidente" >
                                                <option value="<?=$id?>" ><?=$username?></option>
                                                <? 
obtUsuarios();
?>
                                            </select>
                                        </div>
                                          
                                </div>
                                <!--  -->
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-tittle"> </h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group col-md-4">
                                        <h4><i class="fa fa-box"></i>Descripcion corta del Incidente</h4>
                                        <input required="" class="form-control" type="text" name="incidente" id="incidente" placeholder="Ejemplo: mi pc no enciende">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h4><i class="fa fa-box"></i>Categoria: </h4>
                                        <select name="categoria" id="categoria" class="form-control">
                                        <option >Seleccione una categoria</option>
                                            <?obtCategorias()?>
                                        </select>
                                        <help>Si no esta seguro de a que categoria pertenece su incidente, seleccione  <b> "Otro..."</b></help>
                                    </div>
                                </div>               
                                <!-- /.box -->
                                <div class="box-header">
                                    <h3 class="box-title">Detalles del Incidente</h3>
                                    <!-- tools box -->
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">
                                    <textarea required="" class="textarea" id="descripcion" name="descripcion" placeholder="Escriba aqui todos los detalles del incidente" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i>
                                    Generar Ticket de Servicio</button>
                                     <a class="btn btn-danger" href="/oag">Cancelar</a>
                                    </div>
                                   
                                </div>
                            </div>
                            </form>
                    </div>
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

<script type="text/javascript" src="bootstrap/js/bootstrap-select.js"></script>

<!-- <script src="bootstrap/js/plugins.js"></script> -->

<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="bootstrap/js/app.min.js" type="text/javascript"></script>





</body>
</html>
