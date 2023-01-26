<?php
session_start(); ?>
<h1>Bienvenido <?php echo$_SESSION["NombreUsuario"] ?></h1>
<a href="../controlador/CtrlSalir.php">Salir</a>
<a href="../web/pedidos.html">Pedir para llevar</a> 
<a href="../web/reservas.php">Reserva </a>
<a href="../index.php">Volver al menu principal.</a>