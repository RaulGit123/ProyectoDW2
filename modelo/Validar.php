<?php
include("ClaseModelo.php");
include("ClaseNigiri.php");
require_once("Conexion.php");

//Validar es una clase con funcion validarDatos para validar los datos de inicio de sesion . CtrlMain depende de ella.
class Validar
{

    public function validarDatos()
    {

        try {
            $con = null;
            $sql = null;
            $resultado = null;
            $cantidad_resultado = null;

            // Recuperamos la conexión
            $con = Conexion::getConection();

            // Validación de error
            if ($con == "ERROR") {
                header("location:CtrlSalir.php");
            }

            $usu = $_SESSION["NombreUsuario"];
            $pass = $_SESSION["Contraseña"];



            $f1 = new Nigiri();
            $resultado = $f1->Login($usu, $pass);
            // si cantidad_resultado devuelve 0 saldrá de la sesión.
            $cantidad_resultado = $resultado->rowCount();

            if ($cantidad_resultado == 0) {

                header("location:controlador/CtrlSalir.php");
            }
        } catch (Exception $e) {
        } finally {
            $con = null;
            $sql = null;
            $resultado = null;
            $cantidad_resultado = null;
        }
    }
}
