<?php 
include ("ClaseModelo.php");
include ("ClaseNigiri.php");
    require_once("Conexion.php");

    class Validar {

        public function validarDatos() {

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
                    //posible enlace mal ... mirar controlador/ctrlsalir
                }

            $usu = $_SESSION["NombreUsuario"];
            $pass = $_SESSION["Contraseña"];

                // Consulta
                // $sql = "SELECT * FROM usuarios WHERE NombreUsuario = :USU AND Contraseña = :PASS";

                // $resultado = $con->prepare($sql);
                // $resultado->execute(array(":USU"=>$_SESSION["NombreUsuario"], ":PASS"=>$_SESSION["Contraseña"]));

                $f1 = new Nigiri();
            $resultado = $f1->Login($usu,$pass);

                $cantidad_resultado = $resultado->rowCount();

                if ($cantidad_resultado == 0) {

                   header("location:controlador/CtrlSalir.php");
                    //posible enlace mal ... mirar controlador/ctrlsalir
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
?>