<?php
 require "conexion.php";
$cerrado = '';
$cat = '';
$esta = '';

#-----------COMPRUEBA SI SE HA MANDADO LLAMAR LA FUNCION PARA CERRAR EL TICKET
  if (isset($_POST['cerrado']))
  {
    $cerrado = $_POST['cerrado'];
    cerrarTicket($cerrado);
  }
#-----------COMPRUEBA QUE LA VARIABLE HAYA SIDO USADA DEL CHAT--------------------
  if (isset($_POST['chat']))
  {
    chat();
  }
#------------COMPRUEBA QUE LA VARIABLE DEL ESTATUS HAYA SIDO USADA--------------------  
  if (isset($_POST['estatus']))
  {
    $esta =$_POST['estatus'];
  }
  if (isset($_POST['categoria']))
   {
    $cat = $_POST['categoria'];   
   }

   if($cat != '' && $esta != '')
   {
    actualizador($cat, $esta);
   }


function datosTabla_Admon()
{

$tickera = mysql_query( "SELECT 
folio
,fecha_inicio
,hora_inicio
,us.usuario
,titulo
,categoria_ticket.categoria
,est.situacion
,fecha_asignado
,hora_asignado
,asignado.usuario usr_asignado
,ticket.estatus
from ticket
LEFT JOIN  usuario us on us.codigo = ticket.usr_incidente
LEFT JOIN categoria_ticket on categoria_ticket.id_cat = ticket.categoria
LEFT JOIN situacion_ticket est on est.id = ticket.estatus
LEFT JOIN usuario asignado on ticket.usr_asignado = asignado.codigo") or die (mysql_error());

return $tickera;
}

function datosTabla_Usr($id)
{

$tickera = mysql_query( "SELECT 
 folio
,fecha_inicio
,hora_inicio
,us.usuario
,titulo
,categoria_ticket.categoria
,est.situacion
,fecha_asignado
,hora_asignado
,asignado.usuario usr_asignado
,ticket.estatus
from ticket
LEFT JOIN  usuario us on us.codigo = ticket.usr_incidente
LEFT JOIN categoria_ticket on categoria_ticket.id_cat = ticket.categoria
LEFT JOIN situacion_ticket est on est.id = ticket.estatus
LEFT JOIN usuario asignado on ticket.usr_asignado = asignado.codigo
WHERE usr_incidente = '$id' ") or die (mysql_error());

return $tickera;
}

function obtCategorias()
{
  $qry = mysql_query("SELECT * FROM categoria_ticket") or die (mysql_error());

  while ($activo = mysql_fetch_array($qry)) 
  { ?>
    <option value="<?= $activo[0]?>"> <?=$activo['categoria'] ?></option>
  <? }
}

function obtSituacion($seguimiento)
{
  $qry = mysql_query("SELECT *
                      FROM situacion_ticket
                      WHERE id > '$seguimiento'
                      AND id != 5 ") or die (mysql_error());

  while ($activo = mysql_fetch_array($qry)) 
  { ?>
    <option value="<?= $activo[0]?>"> <?=$activo['situacion'] ?></option>
  <? }

}


function email_altaTicket($id,$usuarioIncidente,$titulo,$descripcion,$Fecha,$Hora)
{
  echo $id;
  $qry = "SELECT 
   correo
  ,usuario
  FROM usuario WHERE codigo = '$usuarioIncidente'";
  $consulta = mysql_query($qry);
  $datos = mysql_fetch_row($consulta);

  $emailUsr = $datos[0];
  $usuario = $datos[1];

//empezamos a mandar el correo

  // Varios destinatarios
$para  = $emailUsr;// . ', '; // atención a la coma


// título
$título = 'Se Registro su Incidente FOLIO: '.$id;

// mensaje
$mensaje = '
<html>

<body>


  <p class="title">BUEN DIA <b> '. $usuario .' </b> Se ha registrado el incidente a su nombre con el folio: <b>'.$id.'  </p>
<table class="table" style="bgcolor:blue">
  <tr>
  <td>descripcion: <b> '.$descripcion.'</b></td>
  </tr>
  <tr>
<td>
  <p>Para darle seguimiento a este incidente entre a su cuenta en IncidenciasOAG y valla 
  al menu "MIS TICKETS ACTIVOS" o de click en el siguiente enlace para ser redireccionado directamente al seguimeinto del mismo.</p>
</td>
  </tr>
  </table>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
//$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: IncidenciasOAG - Seguimeinto <nocontestar@IncidenciasOAG.com>' . "\r\n";
//$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Enviarlo
mail($para, $título, $mensaje, $cabeceras);

 
    }

function infoTicket()
    {
$seguimiento = $_GET['folio'];

      $info = mysql_query("SELECT 
folio
,fecha_inicio
,hora_inicio
,us.usuario
,dependencias.nombre_dependencia
,us.extension
,us.correo
,titulo
,categoria_ticket.categoria
,ticket.descripcion
,est.situacion
,asignado.usuario as asignado
,est.id
from ticket
LEFT JOIN  usuario us on us.codigo = ticket.usr_incidente
LEFT JOIN usuario asignado on asignado.codigo = ticket.usr_asignado
LEFT JOIN categoria_ticket on categoria_ticket.id_cat = ticket.categoria
LEFT JOIN situacion_ticket est on est.id = ticket.estatus
LEFT JOIN dependencias on  us.dependencia = dependencias.id_dependencia
WHERE ticket.folio = '$seguimiento'") or die(mysql_error());

      return mysql_fetch_row($info);
    }

    function seleccionarAsigando()
    {
      $query = mysql_query("SELECT codigo, usuario 
                FROM usuario
                WHERE rol = 1") or die(mysql_error());

        while ($asigando = mysql_fetch_array($query))
       {
        ?>
     <option value="<?=$asigando[0]?>"> <?=$asigando[1]?></option>
        <?
       }

    }

function actualizador($cat, $esta)
{
  $categoria = $cat;
  $estatus = $esta;
  $folio = $_POST['folio'];
  $fecha= date('d-m-Y');
  $hora= date('H:i:s');
  $usr = $_POST['usr'];

      actualizarCategoria($categoria, $folio, $estatus, $fecha, $hora); //esta funcion actualiza el usuario asignado
      h_ActualizarCAtegoria($categoria, $estatus,  $folio, $fecha, $hora, $usr); //esta funcion realiza un registro de historico para el usuario asignado




}

//------------------------------ACTUALIZAR LA CATEGORIA Y EL ESTADO DEL TICKET----------
function actualizarCategoria($categoria, $folio, $estatus, $fecha, $hora)
{
  $qry = '';
  if($categoria > 0 && $estatus > 0 )
  {
    $qry = "UPDATE ticket SET
      categoria       =  '$categoria'
      ,estatus         =  '$estatus' 
      WHERE folio     =  '$folio'";

  }
  elseif ($categoria > 0)
  {

    $qry = "UPDATE ticket SET
      categoria       =  '$categoria'
      WHERE folio     =  '$folio'";    
  }

  elseif ($estatus > 0) 
  {

    $qry = "UPDATE ticket SET
      estatus         =  '$estatus' 
      WHERE folio     =  '$folio'";
  }



  //---------------------------------SI LA CONSULTA REALIZO CAMBIOS ENTONCES...----------
      if(mysql_query($qry)) 
      {
          $msg = 'Hecho ';
          echo '<div class="alert alert-success"><p><i class="fa fa-check"></i> '
          .$msg.'</p></div>';

      }
      else
      {
        $msg = 'Por Favor Seleccione la categoria o el estatus que desea Actualizar. CATEGORIAS: '
        . $categoria . 'ESTATUS' . $estatus;
        echo '<div class="alert alert-warning"><p><i class="fa fa-close"></i> '
        .$msg.'</p></div>';

      }  
  

}

 function h_ActualizarCAtegoria($categoria, $estatus,  $folio, $fecha, $hora, $usr)
  {
    $qry = "INSERT INTO h_ticket
    (folio
    ,usr
    ,categoria
    ,estatus
    ,fecha
    ,hora)
    VALUES ('$folio'
    ,'$usr'
    ,'$categoria'
    ,'$estatus'
    ,'$fecha'
    ,'$hora')";

    mysql_query($qry) or die(mysql_error());
  }
//---------------------------ASIGNAR INGENIERO-----------------------------------

    if(!isset($_POST) || !isset($_POST['ingeniero']))
{ 
  
    return false;
}
else
{

  $ingeniero = $_POST['ingeniero'];
  $folio = $_POST['folio'];
  $fecha= date('d-m-Y');
  $hora= date('H:i:s');
  $usr = $_POST['usr'];

  asignarInge($ingeniero, $folio, $fecha, $hora); //esta funcion actualiza el usuario asignado
  h_asignarInge($ingeniero, $folio, $fecha, $hora, $usr); //esta funcion realiza un registro de historico para el usuario asignado
  
  
}

function asignarInge($ingeniero, $folio, $fecha, $hora)
{
  if($ingeniero > 0)
    {

      $qry = "UPDATE ticket SET 
      estatus         =  2,
      usr_asignado = '$ingeniero',
      fecha_asignado = '$fecha',
      hora_asignado = '$hora'
      WHERE folio = '$folio'";

      mysql_query($qry) or die(mysql_error());

      //---------------------------------SI LA CONSULTA REALIZO CAMBIOS ENTONCES...----------
      if(mysql_affected_rows()!=0) 
      {
          $msg = 'Se ha Asignado con exito ';
          echo '<div class="alert alert-success"><p><i class="fa fa-check"></i> '
          .$msg.'</p></div>';

      }
      else
      {
        $msg = 'Se ha producido un error inesperado, comuniquese al area de Soporte.';
        echo '<div class="alert alert-warning"><p><i class="fa fa-close"></i> '
        .$msg.'</p></div>';

      }   
        
    }
    else
    {
      $msg = "Por favor, seleccione a un Ingeniero Valido";
      echo '<div class="alert alert-danger"><p><i class="fa fa-close"></i> '
      .$msg.'</p></div>';
    }

}

function h_asignarInge($ingeniero, $folio, $fecha, $hora, $usr)
{

    if($ingeniero > 0)
    {
      $query = "INSERT INTO h_ticket
      (folio
      ,usr
      ,asignado
      ,estatus
      ,fecha
      ,hora)
      VALUES('$folio','$usr','$ingeniero', 2 ,'$fecha','$hora')";

      mysql_query($query) or die(mysql_error());

    //  return array($ingeniero, $folio, $fecha, $hora);
    }
  }
#------------ FUNCION PARA CERRAR LOS TICKETS DE SERVICIO
  function cerrarTicket($accion)
  {

  $folio    = $_POST['folio'];
  $fecha    = date('d-m-Y');
  $hora     = date('H:i:s');
  $usr      = $_POST['usr'];
  $solucion = $_POST['solucion'];
  $estatus = 5;

   
      $qry = "
      UPDATE ticket
      SET   estatus =  5,
      fecha_cierre  = '$fecha',
      hora_cierre   = '$hora'
            
      WHERE folio = '$folio'";
      
      mysql_query($qry) or die(mysql_error());

      if (mysql_affected_rows() != 0)
      {
        h_cerrarTicket($folio, $fecha, $hora, $usr, $estatus, $solucion);

        $msg = 'Se ha cerrado el Ticket de Servicio ' . $folio;
        echo '<div class="alert alert-warning"><p><i class="fa fa-check"></i> '
        .$msg.'</p></div>';
      }
       else
      {
        $msg = 'Se ha producido un error inesperado, comuniquese al area de Soporte.' . mysql_error();
        echo '<div class="alert alert-warning"><p><i class="fa fa-close"></i> '
        .$msg.'</p></div>';

      }  
    
  }

   function h_cerrarTicket($folio, $fecha, $hora, $usr, $estatus, $solucion)
   {
    $qry = "INSERT INTO h_ticket
      (folio
      ,usr
      ,mensaje
      ,estatus
      ,fecha
      ,hora)
      VALUES
      ('$folio', '$usr', '$solucion', '$estatus', '$fecha', '$hora')";

      mysql_query($qry) or die (mysql_error());
   }


#--------- FUNCION PARA ACTUALIZAR LOS MENSAJES DE CHAT DENTRO DEL SEGUIMIENTO AL INCIDENTE-----
function chat()
{

  $mensaje = $_POST['chat'];
  $folio = $_POST['folio'];
  $fecha= date('d-m-Y');
  $hora= date('H:i:s');
  $usr = $_POST['usr'];


      $query = "INSERT INTO h_ticket
      (folio
      ,usr
      ,mensaje
      ,fecha
      ,hora)
      VALUES(
       '$folio'
      ,'$usr'
      ,'$mensaje'
      ,'$fecha'
      ,'$hora')";

      mysql_query($query) or die(mysql_error());

     $msg = 'Mensaje Enviado ';
          echo '<div class="alert alert-success"><p><i class="fa fa-check"></i> '
          .$msg.'</p></div>';

  }




?>