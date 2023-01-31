<!DOCTYPE html>

<html>

<head>
  <title>borrar</title>
</head>

<body>

<?php 
  if (session_status()===PHP_SESSION_NONE){
    session_start();
  } 
$codigo = $_GET["IdComida"];
require_once("Conexion.php");


function eliminarComida($codigo)
{
    $con = Conexion::getConection();
    $sql = $con->prepare("DELETE FROM Comida WHERE IdComida = ?");
    return $sql->execute([$codigo]);
}

eliminarComida($codigo);
?>

<a class="admin" href="../vista/admin.php">Volver al panel de administrador</a>



