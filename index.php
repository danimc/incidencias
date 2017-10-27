<?php

require 'acciones/conexion.php';
require 'secciones/head.php';
require 'acciones/funcionesIndex.php';
require 'secciones/inicio.php';

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
   <?
     if(isset($_SESSION['estado']) == 'Autenticado'){          
    ?>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
         <? head(); ?>
               
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Panel de control
                            <small>Pagina principal</small>
                        </h1><br>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        </ol>
                    </section>

                    <!-- Main content -->
                    <section class="content">
                    
                    <a href="formNuevoTicket?usr=<?=$usr?>">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      
                    <div class="info-box bg-blue-active">
                      <span class="info-box-icon"><i class="fa fa-file-text"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-number">Nuevo Ticket</span>
                        <!-- The progress section is optional -->
                        <div class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                          Reporte un nuevo Incidente
                        </span>
                      </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                 </div>
                 </a>

                 <a href="menuTickets">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      
                    <div class="info-box bg-yellow">
                      <span class="info-box-icon"><i class="fa fa-list-ol"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-number">
                          <? if($_SESSION['rol'] == 1)
                          {
                          ?>
                          Lista de tickets
                          <?}
                          else {?>
                           Mis Tickets  
                           <?}?>
                            </span>
                        <!-- The progress section is optional -->
                        <div title="porcentaje de tickets cerrados" class="progress">
                          <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                          Revise todos los Tickets
                        </span>
                      </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                 </div>
                 </a>

						<?
            if ($_SESSION['rol'] == 1)
             {
              ?>
              
       
						<a href="menuUsuarios">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      
                    <div class="info-box bg-green">
                      <span class="info-box-icon"><i class="fa fa-users"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-number">Control de Usuarios</span>
                        <!-- The progress section is optional -->
                        <div title="porcentaje de tickets cerrados" class="progress">
                          <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                          Altas y bajas de Usuarios
                        </span>
                      </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                 </div>
                 </a>

						<a href="menuActivos">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      
                    <div class="info-box bg-red">
                      <span class="info-box-icon"><i class="fa fa-barcode"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-number">Activos</span>
                        <!-- The progress section is optional -->
                        <div title="porcentaje de tickets cerrados" class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                          Gestion de activos 
                        </span>
                      </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                 </div>
                 </a>
<?
 tablaAdmon_filtrado($usr)
?>

     
                <div class="col-md-6 col-sm-6 col-xs-12">
          </div>

          <!-- Grafica de Pay -->
             <div class="col-md-6 col-sm-12 col-xs-12">    
              <div class="box box-danger ">
            <div class="box-header with-border">
              <h3 class="box-title">Incidentes por Categoria</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>


            <div class="box-body">
              
              <div class="col-md-8 col-sm-12 col-xs-12">
              <canvas id="pieChart" style="height:250px"></canvas>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <ul class="chart-legend clearfix">
              <li><i class="fa fa-circle-o" style="color:#DF0101"></i> Correo</li>
              <li><i class="fa fa-circle-o" style="color: #DF7401"></i> Bases de Datos</li>
              <li><i class="fa fa-circle-o" style="color: #D7DF01"></i> Software</li>
              <li><i class="fa fa-circle-o" style="color: #74DF00"></i> Redes E internet</li>
              <li><i class="fa fa-circle-o" style="color: #01DF01"></i> Documentos Y Ofimatica</li>
              <li><i class="fa fa-circle-o" style="color: #01DF74"></i> Telefonía</li>
              <li><i class="fa fa-circle-o" style="color: #01DFD7"></i> Impresoras</li>
              <li><i class="fa fa-circle-o" style="color: #0174DF"></i> Hardware</li>
              <li><i class="fa fa-circle-o" style="color: #3c8dbc"></i> Sistema de Incidencias</li>
              <li><i class="fa fa-circle-o" style="color: #6E6E6E"></i> Otro...</li>
                </ul>
              </div>
            
            </div>
            <!-- /.box-body -->
          </div>
</div>
            <!-- /.box-body -->
        

                 <?
                 }
                 ?> 
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>  
                    </section>
                    <?php }
                    else{
                         header('location: login');
                        }; ?>
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

        <script src="plugins/chartjs/chart.js"></script>

        <script>

<?
 $data = grafica_categorias();
?>
  $(function () {
 
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: <?=$data['correo']?>,
        color: "#DF0101",
        highlight: "#F78181",
        label: "Correos"
      },
      {
        value: <?=$data['bd']?>,
        color: "#DF7401",
        highlight: "#F7BE81",
        label: "Bases de Datos"
      },
     
      {
        value: <?=$data['software']?>,
        color: "#D7DF01",
        highlight: "#F3F781",
        label: "Software"
      },
      {
        value: <?=$data['red']?>,
        color: "#74DF00",
        highlight: "#BEF781",
        label: "Red e Internet"
      },
      {
        value: <?=$data['documentos']?>,
        color: "#01DF01",
        highlight: "#81F781",
        label: "Documentos y Ofimatica"
      },
         {
        value: <?=$data['telefonia']?>,
        color: "#01DF74",
        highlight: "#81F7BE",
        label: "Telefonia"
      },
         {
        value: <?=$data['impresora']?>,
        color: "#01DFD7",
        highlight: "#81F7F3",
        label: "Impresoras"
      },
       {
        value: <?=$data['hardware']?>,
        color: "#0174DF",
        highlight: "#81BEF7",
        label: "Hardware"
      },
         {
        value: <?=$data['incidencias']?>,
        color: "#7401DF",
        highlight: "#8181F7",
        label: "Sistema de incidencias"
      },
       {
        value: <?=$data['otro']?>,
        color: "#6E6E6E",
        highlight: "#E6E6E6",
        label: "Otros..."
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#000",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
    </body>

    </html>
