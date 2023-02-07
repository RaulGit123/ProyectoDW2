<?php
include ("ClaseModelo.php");
include ("ClaseNigiri.php");
require_once("Conexion.php");
if (session_status()===PHP_SESSION_NONE){
    session_start();
} 
$text = $_POST['text'];
$text2 = $_POST['text2'];
$text3 = $_POST['text3'];

$output = wordwrap($text, 60);
$output2 = wordwrap($text2, 60);
$output3 = wordwrap($text3, 60);
$mesa = [1,2,3,4];


$nombre = $_SESSION["NombreUsuario"];
$con = Conexion::getConection();
$sql = "SELECT IdUsuarios FROM usuarios WHERE NombreUsuario = '$nombre'";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 


if($query -> rowCount() > 0)   { 
foreach($results as $result) { 

$id= $result -> IdUsuarios;
   }
 }


$hola = new Nigiri();
if(AsignarMesa($mesa,$output2,$output3)>0){
  $mesita = AsignarMesa($mesa, $output2, $output3);
$hola->AñadirRegRes($id,$mesita,$output2,$output,$output3);
}
function AsignarMesa($mesa,$output2,$output3)
{
    $disponible = 0;
    for ($i = 0; $i < count($mesa);$i++) {
      $con = Conexion::getConection();
        $sql = $con -> prepare("SELECT Mesa,FechaReserva,HoraReserva FROM RegistroReservas
        WHERE Mesa = '$mesa[$i]' and 
        FechaReserva = '$output2' and
        HoraReserva = '$output3'" );
        $sql -> execute();
        $sql -> fetchAll(PDO::FETCH_OBJ);
        // print_r($sql -> fetchAll(PDO::FETCH_OBJ));
        if($sql -> rowCount() >0)   {
          $disponible = 0;
             }else{
            $disponible = $mesa[$i];
            break;
             }
    }
    if($disponible !=0){
        return $disponible;
    }else{
      echo $disponible;
      return $disponible;
    }
}
?>  