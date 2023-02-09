<?php 
// include ("../modelo/ClaseModelo.php");
// include ("../modelo/ClaseNigiri.php");
require_once("Conexion.php");

if (session_status()===PHP_SESSION_NONE){
	session_start();
} 
$nombre = $_SESSION["NombreUsuario"];
$con = Conexion::getConection();
$sql = "SELECT IdUsuarios FROM Usuarios WHERE NombreUsuario = '$nombre'";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ);

        // $f1 = new Nigiri();
        // $results = $f1->MuestraId($nombre);

if($query -> rowCount() > 0)   { 
  foreach($results as $result) { 
    echo '<div id="idUsu" style="display: none;">'.$result -> IdUsuarios.'</div>';
  }
}

?>