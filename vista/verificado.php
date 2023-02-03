<?php
require_once("../modelo/Conexion.php");


$con = Conexion::getConection();
$sql = "SELECT Codigo FROM usuarios ";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)   { 
  foreach($results as $result) { 
    $codigo= $result -> Codigo;

  }
  
if($_POST["codigo"]==  $codigo){

    $con = Conexion::getConection();
    $sql = "UPDATE usuarios SET Activado = 'si' WHERE Codigo ='$codigo' ";
    $query = $con -> prepare($sql); 
    $query -> execute(); 
   
      header("location: ../hugo.php");

}else{ header("location: verificar.php");}
}

?>

