<?php




require_once("../modelo/Conexion.php");

    session_start();

if(isset($_POST["email"])){
    $nuevaPass= md5($_POST["cambiaPass"]);
    $mailUsuario= $_POST["email"];
    $con = Conexion::getConection();
    // $sql = "INSERT INTO usuarios (Contraseña) VALUES '$nuevaPass' WHERE  CorreoElectronico = '$mailUsuario'";
    $sql = "UPDATE usuarios SET Contraseña = '$nuevaPass' WHERE CorreoElectronico='$mailUsuario'";
    $query = $con -> prepare($sql); 
    $query -> execute(); 
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    header("location:../hugo.php");} //if($_POST["email"] ){echo '<script language="javascript">alert("Mail incorrecto");</script>'; header("location:../vista/form_cambiaPass.php");}
     ?>
