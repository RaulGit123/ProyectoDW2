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


// function eliminarComida($codigo)
// {
//     $con = Conexion::getConection();
//     $sql = $con->prepare("DELETE FROM Comida WHERE IdComida = ?");
//     return $sql->execute([$codigo]);
// }
// eliminarRegistroPedido($codigo);
// eliminarComida($codigo);
// function eliminarRegistroPedido($codigo){
//   $con = Conexion::getConection();
//     $sql = $con->prepare("DELETE FROM RegistroPedidos WHERE IdComida = ?");
//     return $sql->execute([$codigo]);
// }
$f1 = new Nigiri();
$f2 = new Nigiri();
$f2->EliminarRegistroPedido($codigo);
$f1->EliminarComida($codigo);

header("Location:../vista/admin.php");
?>

<!-- <a class="admin" href="../vista/admin.php">Volver al panel de administrador</a> -->

