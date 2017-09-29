<?php
require 'conexion.php';



function chat(){
	$folio = $_SESSION['folioTicket'];
	
						$sql = mysql_query("SELECT *
						FROM comentarios 
						INNER JOIN tickets
						INNER JOIN usuario 
						WHERE tickets.folio = comentarios.folioT
						AND usuario.idUsuario = comentarios.idUs
						AND tickets.folio =  '$folio' ") or die (mysql_error());

						while($datos = mysql_fetch_array($sql)){
							  ?>
						<div class="header">
							

					

							<div class="from"><i class="halflings-icon user"></i> <b><?php echo $datos["usuario"];  ?></b> / <?php echo $datos["area"];  ?> </div>
							<div class="date"><i class="halflings-icon time"></i>  <b><?php echo $datos["fecha"];  ?></b> / <?php echo $datos["hora"];  ?></div>
							
							<div class="menu"></div>
							
						</div>
						
						<div class="content">
							<p>
							<?php echo $datos["texto"];  ?>								
							</p>
							
								
						</div>


						<?php } mysql_close(); ?>

<?php
}





?>