<?php
include ("../modelo/ClaseModelo.php");
include ("../modelo/ClaseNigiri.php");
if (session_status()===PHP_SESSION_NONE){
  session_start();
}

require_once("Conexion.php");

// $mysqli = new mysqli("localhost", $username, $password, $database);

$con = Conexion::getConection();

// Don't forget to properly escape your values before you send them to DB
// to prevent SQL injection attacks.

$Nombre = ($_POST['Nombre']);
$Descripcion = ($_POST['Descripcion']);
$Ingredientes = ($_POST['Ingredientes']);
$Precio = ($_POST['Precio']);
$Imagen = ($_POST['Imagen']);
$Tipo = ($_POST['tipo']);

$f1 = new Nigiri();
$f1->InsertarComida($Nombre, $Descripcion, $Ingredientes, $Precio, $Imagen, $Tipo);
header("Location:../web/admin.php");
// $sql =$con->prepare( "INSERT INTO Comida ( Nombre, Descripcion,Ingredientes,Precio,Imagen,tipo) VALUES (?,?,?,?,?,?)") ;
// return $sql->execute([$Nombre,$Descripcion,$Ingredientes,$Precio,$Imagen,$Tipo]);

 
?>