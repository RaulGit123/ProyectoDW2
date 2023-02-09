<?php 
include ("ClaseModelo.php");
include ("ClaseNigiri.php");
    require_once("Conexion.php");

    class Login {

        public function validarDatos($usu, $pass) {
       
           $pass=md5($pass);
           
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

                // Consulta
                // $sql = "SELECT * FROM usuarios WHERE NombreUsuario = :USU AND Contraseña = :PASS";

                // $resultado = $con->prepare($sql);
                // $resultado->execute(array(":USU"=>$usu, ":PASS"=>$pass));

                $f1 = new Nigiri();
            $resultado = $f1->Login($usu,$pass);


                $cantidad_resultado = $resultado->rowCount();
                 session_start();
            // $cantidad_resultado = 1;
                if ($cantidad_resultado == 1) {
                    $_SESSION["NombreUsuario"] = $usu;
                    $_SESSION["Contraseña"] = $pass;
                echo $_SESSION["Contraseña"];
                echo $_SESSION["NombreUsuario"];
                echo $usu;
                echo $pass;
                } else {
                    $_SESSION["error"] = "ERROR";

                }

                
            } catch (Exception $e) {


            } finally {

                $con = null;
                $sql = null;
                $resultado = null;
                $cantidad_resultado = null;
            //     echo $_POST["NombreUsuario"];
            //     echo $_POST["Contraseña"];
            // echo "holita";
                 header("location:../modelo/sesion.php");

            }

        }

    }
?>