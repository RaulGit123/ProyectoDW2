<!DOCTYPE html>

<html>

<head>
  <title>Delete element</title>
</head>

<body>

  <?php

  //Esta página cargará la funcion de eliminarComida y eliminarRegistro de claseNigiri una vez se pulse submit de /web/form_Borrar.php
  include("ClaseModelo.php");
  include("ClaseNigiri.php");
  require_once("Conexion.php");
  if (session_status() === PHP_SESSION_NONE) { //Se comprueba que si no hay session la inicie, para que no de error si ya está iniciada.
    session_start();
  }
  $codigo = $_GET["IdComida"]; //Id pasada por get desde el form_borrar

  $f1 = new Nigiri();
  $f2 = new Nigiri();
  $f2->EliminarRegistroPedido($codigo);
  $f1->EliminarComida($codigo);

//una vez ejecutadas las funciones nos devolverá a la pantalla de admin.php donde está la consola.

  header("Location:../web/admin.php");
  ?>