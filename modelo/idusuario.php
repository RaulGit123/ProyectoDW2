<?php 

require_once("Conexion.php"); // Requerimos conexión para establecer nueva conexión

// se comprueba si sesión esta iniciada.
if (session_status()===PHP_SESSION_NONE){
	session_start();
} 
/*Aquí implementamos una conexión a la base de datos donde prepararemos una consulta para sacar el Idusuario del usuario que tenga la sesión iniciada. */
$nombre = $_SESSION["NombreUsuario"];
$con = Conexion::getConection();
$sql = "SELECT IdUsuarios FROM Usuarios WHERE NombreUsuario = '$nombre'";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); // hacemos un fetch de tipo objeto.

//recorremos el select y guardamos el resultado Idusuarios.
if($query -> rowCount() > 0)   { 
  foreach($results as $result) { 
    echo '<div id="idUsu" style="display: none;">'.$result -> IdUsuarios.'</div>';
  }
}
