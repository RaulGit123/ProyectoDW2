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
    echo '<div id="idUsu" style="display: none;">'.$result -> IdUsuarios.'</div>';
  }
}

?>