<?php
session_start();
require 'menuLateral.php';
header("Content-Type: text/html;charset=utf-8");
//require 'acciones/conexion.php';

$pic = $_SESSION['foto'];
$usr = $_SESSION['idUsuario'];

function head()
{
$user = $_SESSION['usuario'];
$nombres = $_SESSION['nombre'];
$pic = $_SESSION['foto'];
    ?>
    <header class="main-header">
                    <!--logo-->
                    <a href="/oag" class="logo">
                        <span class="logo-mini"><b>OAG</b></span>
                        <span class="logo-lg">Incidentes <b>OAG</b></span>
                    </a>

                    <nav class="navbar navbar-static-top" role="navigation">
                        <a href="#" class="sidebar-toggle" data-togle="offcanvas" role="button">
                            <span class="sr-only">Toggle Navigation</span>
                        </a>
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?=$pic?>" class="user-image" alt="foto Perfil">
                                        <span class="hidden-xs"><?php echo $user ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="user-header">
                                            <img src="<?=$pic?>" class="img-circle" alt="imagen de usuario">

                                            <p>
                                                <?php echo $nombres ?>
                                                <small> Unidad</small>
                                            </p>
                                        </li>
                                        <li class="user-body">
                                            <div class="row">
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Seguidores</a>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Tickets sin atender</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="perfil?usr=<?=$_SESSION['idUsuario']?>" class="btn btn-default btn-flat">Perfil</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="acciones/logout" class="btn btn-default btn-flat"> Cerrar Sesion</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="configuracion" title="Configuraciones del sistema" ><i class="fa fa-gears"></i></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>


    <?
        menuLateral(); // se manda llamar el menu lateral
     }

 //   head();

 
?>