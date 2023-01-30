<?php 

    session_start();
    if (isset($_SESSION["NombreUsuario"]) && isset($_SESSION["Contraseña"])) {
        
        require_once("modelo/Validar.php");
        $validar = new Validar();
        $validar->validarDatos();

        //include_once("web/index.html");
       include_once("vista/principal.php");
        
       //header("location:./web/index.html");
     
    } else {

        if (isset($_SESSION["error"])) {
        
            echo '<script language="javascript">alert("Error de login");</script>';
            unset($_SESSION["error"]);
        }
    
        include_once("vista/login.php");

        //aqui luego desviariamos a vista registro de usuario.
    }
?>