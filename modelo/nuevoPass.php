<?php




require_once("Conexion.php");


if (session_status()===PHP_SESSION_NONE){
	session_start();
} 

    $nombre = $_SESSION["NombreUsuario"];
    $nuevaContraseña = md5($_POST["cambiaPass"]);
    $actualContraseña = $_POST["passActual"];


if(isset($_POST["passActual"]) && isset($_POST["cambiaPass"])){

    $con = Conexion::getConection();
    // $sql = "INSERT INTO usuarios (Contraseña) VALUES '$nuevaPass' WHERE  CorreoElectronico = '$mailUsuario'";
    $sql = "UPDATE usuarios SET Contraseña = '$nuevaContraseña' WHERE NombreUsuario = '$nombre'";
    $query = $con -> prepare($sql); 
    $query -> execute(); 
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    header("location:sesion.php");} //if($_POST["email"] ){echo '<script language="javascript">alert("Mail incorrecto");</script>'; header("location:../vista/form_cambiaPass.php");}
     ?>
