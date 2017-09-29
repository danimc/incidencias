<?
@session_start();

if($_SESSION["estado"] != "ok"){
	header("Location: ../index");
	exit();
}
?>
