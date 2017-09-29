<?php 

function MenuLateral()
{
	?>
	<aside class="main-sidebar">

				<!-- sidebar: style can be found in sidebar.less 
				<section class="sidebar">

					 Sidebar user panel (optional)
					<div class="user-panel">
						<div class="pull-left image">
							<img src="#" class="img-circle" alt="Imagen de Usuario">
						</div>
						<div class="pull-left info">
							<p>Usuario</p>
							 Status 
						</div>
					</div>

-->

					<!-- Sidebar Menu -->
					<ul class="sidebar-menu">
						<li class="header">MENU RAPIDO</li>
						<!-- Optionally, you can add icons to the links -->
						<li class="active"><a href="/oag"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
						<!--<li ><a href="menuUsuarios"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>-->
						<li><a href="menuTickets"><i class="fa fa-barcode"></i> <span>Tickets</span></a></li>

					</ul>
					<!-- /.sidebar-menu -->
				</section>
				<!-- /.sidebar -->
			</aside>
	<?
}
?>