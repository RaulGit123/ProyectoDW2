<?php 
// el controlador salir sirve para destruir y finalizar la sesión del usuario. Devolverá al index con la sesión cerrada
    session_start();
    session_unset();
    session_destroy();
    header("location:../web/");
?>