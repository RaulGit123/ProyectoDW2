<?php 
    if (isset($_POST["NombreUsuario"]) && isset($_POST["Contraseña"])) {
         require_once("../modelo/Login.php");
        $validar = new Login();
        $validar->validarDatos($_POST["NombreUsuario"], $_POST["Contraseña"]);
        
    } else {
        header("location:../hugo.php");
    }
?>