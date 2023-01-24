<?php 

    session_start();
    if (isset($_SESSION["NombreUsuario"]) && isset($_SESSION["Contraseña"])) {
        
        require_once("modelo/Validar.php");
        $validar = new Validar();
        $validar->validarDatos();

   
       include_once("vista/principal.php");
        

     
    } else {

        if (isset($_SESSION["error"])) {
        
            echo '<script language="javascript">alert("Introduzca su nombre de usuario y contraseña");</script>';


            unset($_SESSION["error"]);
        }
    
        include_once("vista/login.php");

        //aqui luego desviariamos a vista registro de usuario.
    }
?>