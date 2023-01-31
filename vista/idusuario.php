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
echo '<table border="0" cellspacing="2" cellpadding="2"> 
     <tr> 
          <td> <font face="Arial">IdUsuario</font> </td> 
  
  </tr>';

if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo " <tr> 
<td>".$result -> IdUsuarios."</td>


</tr>";


   }
 }


?>