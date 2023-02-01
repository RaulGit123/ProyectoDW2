<?php 

require_once("../modelo/Conexion.php");
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
$regPedJSON = json_decode(stripslashes($_POST['regPedJSON']));

function AñadirPedido($output1,$output2,$output3)
{
    $con = Conexion::getConection();
    $sql = $con->prepare("INSERT INTO pedidos (IdUsuarios,PrecioFinal,FechaPedido) VALUES (?,?,?)");
    return $sql->execute([$output1,$output2,$output3
    ]);
}

AñadirPedido($id,$precioFinal,$fechaPedido);



$con = Conexion::getConection();
$sql = "SELECT IdPedidos FROM pedidos ORDER BY IdPedidos DESC LIMIT 1";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)   { 
  foreach($results as $result) { 
    $idPed = $result -> IdPedidos;
  }
}

function AñadirRegPed($output1,$output2,$output3) //idComida, cantidad, IdPedidos
{
    $con = Conexion::getConection();
    $sql = $con->prepare("INSERT INTO registropedidos (IdComida,cantidad,IdPedidos) VALUES (?,?,?)");
    return $sql->execute([$output1,$output2,$output3
    ]);
}

foreach ($regPedJSON as $ele) {
    $idCom = $ele->idComida;
    $cant = $ele->cantidad;
    AñadirRegPed($idCom,$cant,$idPed);
}


?>