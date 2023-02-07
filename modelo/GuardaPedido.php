<?php 
include ("ClaseModelo.php");
include ("ClaseNigiri.php");
require_once("Conexion.php");
if (session_status()===PHP_SESSION_NONE){
    session_start();
} 

$nombre = $_SESSION["NombreUsuario"];
$con = Conexion::getConection();
$sql = "SELECT IdUsuarios FROM usuarios WHERE NombreUsuario = '$nombre'";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)   { 
  foreach($results as $result) { 
    $id = $result -> IdUsuarios;
  }
}

$precioFinal = $_POST['precioFinal'];
$fechaPedido = $_POST['fechaPedido'];
$direccion = $_POST['direccion'];
$metodoPago = $_POST['metodoPago'];
$regPedJSON = json_decode(stripslashes($_POST['regPedJSON']));

$hola = new Nigiri();
$hola->GuardaPedidos($id, $precioFinal, $fechaPedido, $direccion, $metodoPago);


$hola2 = new Nigiri();


 $results=$hola2->UltimoPedido();

  foreach($results as $result) { 
    $idPed = $result -> IdPedidos;
  }

$hola3 = new Nigiri();

foreach ($regPedJSON as $ele) {
    $idCom = $ele->idComida;
    $cant = $ele->cantidad;
    $hola3->AñadirRegPed($idCom,$cant,$idPed);
}

?>