<?php

session_start();
require_once("config.php");
include  '../modelo/ClaseNigiri.php';
//generamos la consulta
$sql = ListadoCoomida();

echo $sql;

?>