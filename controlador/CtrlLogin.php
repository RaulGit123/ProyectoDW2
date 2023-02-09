<?php 
    if (isset($_POST["NombreUsuario"]) && isset($_POST["Contraseña"])) {
         require_once("../modelo/modeloLogin.php");
        $validar = new Login();
        $validar->validarDatos($_POST["NombreUsuario"], $_POST["Contraseña"]);
        
    } else {
    echo "pues no setea post";
        header("location:../modelo/sesion.php");
        echo "pues no setea post";
    }
?>