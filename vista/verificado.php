<?php
require_once("../modelo/Conexion.php");


$con = Conexion::getConection();
$sql = "SELECT Codigo FROM usuarios ";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)   { 
  foreach($results as $result) { 
    $codigo= $result -> Codigo.'</div>';

  }
  
if($_POST["codigo"]=  $codigo){

    $con = Conexion::getConection();
    $sql = "UPDATE usuarios SET Activado = 'pi' WHERE Codigo ='' ";
    $query = $con -> prepare($sql); 
    $query -> execute(); 
    echo"1f74a54f39b3123ad272ca0a06e7463f </br>";
    echo $codigo;
    

}else{ echo "incorrecto";}
}

?>