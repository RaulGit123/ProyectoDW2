            

<?php
if (empty($_SESSION["NombreUsuario"])) {

     include_once("../modelo/Login.php");
 
    echo "Aún no te registraste? venga va: "; ?>

    <a href="register.php">Registrate</a>
    <a href="../controlador/CtrlSalir.php">Vuelve al menu principal</a>
    
    <?php
    exit();
} else { 

    header('Location: vista/paginaUsuario.php');

}?>



