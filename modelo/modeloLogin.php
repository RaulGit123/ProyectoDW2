<?php
include("ClaseModelo.php");
include("ClaseNigiri.php");
require_once("Conexion.php");
//Clase login con funcion que validará un nombre y usuario para entrar en la sesión
//Clase requerida por CtrlLogin para hacer las comprobaciones
class Login
{

    public function validarDatos($usu, $pass)
    {

        $pass = md5($pass);

        try {

            $con = null;
            $sql = null;
            $resultado = null;
            $cantidad_resultado = null;
            $activado = '';

            // Recuperamos la conexión
            $con = Conexion::getConection();

            // Validación de error
            if ($con == "ERROR") {
                header("location:CtrlSalir.php");
            }



            $f1 = new Nigiri();
            $resultado = $f1->Login($usu, $pass);


            $cantidad_resultado = $resultado->rowCount();
            session_start();
            if ($cantidad_resultado == 1) {
                $_SESSION["NombreUsuario"] = $usu;
                $_SESSION["Contraseña"] = $pass;
            } else {
                $_SESSION["error"] = "ERROR";
            }
        } catch (Exception $e) {
        } finally {

            $con = null;
            $sql = null;
            $resultado = null;
            $cantidad_resultado = null;
            header("location:../modelo/sesion.php");
        }
    }
}
