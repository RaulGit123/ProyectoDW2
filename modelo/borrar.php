<!DOCTYPE html>

<html>

<head>
  <title>borrar</title>
</head>

<body>

<?php 
include ("ClaseModelo.php");
include ("ClaseNigiri.php");
require_once("Conexion.php");
  if (session_status()===PHP_SESSION_NONE){
    session_start();
  } 
$codigo = $_GET["IdComida"];

$f1 = new Nigiri();
$f2 = new Nigiri();
$f2->EliminarRegistroPedido($codigo);
$f1->EliminarComida($codigo);

header("Location:../web/admin.php");
?>

