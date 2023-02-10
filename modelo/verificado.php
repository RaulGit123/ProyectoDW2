<?php
require_once("Conexion.php");

//Saber el código asignado al usuario
$con = Conexion::getConection();
$sql = "SELECT Codigo FROM Usuarios";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)   { 
  foreach($results as $result) { 
    $codigo= $result -> Codigo;
    
    //Si coinciden códigos, se activa la cuenta
    if(trim($_POST["codigo"])==  $codigo){
      $con = Conexion::getConection();
      $sql = "UPDATE Usuarios SET Activado = 'si' WHERE Codigo ='$codigo' ";
      $query = $con -> prepare($sql); 
      $query -> execute(); 
     
      header("location:../web/paginaUsuario.php");
    }else{
      header("location:../web/verificar.php");

    }
  }
}

?>

