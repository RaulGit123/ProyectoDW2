<?php

//CtrlLogin servirá de controlador para el login.  Este comparará si está seteado de post el usuario y contraseña


if (isset($_POST["NombreUsuario"]) && isset($_POST["Contraseña"])) {
    require_once("../modelo/modeloLogin.php");
    $validar = new Login();                                                     //hacemos un nuevo login de la clase de modeloLogin
    $validar->validarDatos($_POST["NombreUsuario"], $_POST["Contraseña"]);      //llamamos a la funcion validarDatos pasandole las variables de post.

} else {                                                                        //si no se cumple la condición devolverá al index.
    header("location:../web/index.php");
}
