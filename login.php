<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Iniciar Sesion | OAG </title>
         <!-- responsivo -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- tema -->
        <link rel="stylesheet" href="bootstrap/css/AdminLTE.min.css">
        <!-- plugins -->
        <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
    </head>
    <body class="hold-transition loading-page">
        <div class="login-box">
            <div class="login-logo">
                sistema de incidencias<br> OAG
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Ingresa al Sistema</p>
                <form action="acciones/verificador" method="post">
                    <div class="form-group has-feedback">
                        <input name="usuario" type="text" class="form-control" placeholder="Usuario" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="password" type="password" class="form-control" placeholder="Contraseña" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesion</button>
                    </div>
                </form>
                <a href="#"> Olvide mi contraseña</a><br>
                <a href="#"> No tengo cuenta</a>
            </div>
        </div>
    </body>
</html>