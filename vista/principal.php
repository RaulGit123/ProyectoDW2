<?php



if (empty($_SESSION["NombreUsuario"])) {

     include_once("../modelo/Login.php");
 
    echo "Aún no te registraste? venga va: "; ?>

    <a href="register.php">Registrate</a>
    <a href="../controlador/CtrlSalir.php">Vuelve al menu principal</a>
    <?php
    exit();
} else { ?>

<h1>Bienvenido</h1>
<a href="controlador/CtrlSalir.php">Salir</a>
<a href="vista/prueba.html">Pedir para llevar</a> 
<a href="vista/prueba.html">Reserva </a>
<a href="web/index_usu.html">Volver al menu principal.</a><?php
    
}?>



