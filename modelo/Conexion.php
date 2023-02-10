<?php 

//crea clase conexion con funcion que probará la conexión . Misma implementación que ClaseModelo pero con try and catch
    class Conexion {

        public static function getConection() {

            $con = null;

            try {

                // Datos de Conexión de la base de datos.
                $con = new PDO('mysql:host=localhost; dbname=nigiri', 'root', '');
        
                // Errores
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                // Caracteres utf8
                $con->exec("SET CHARACTER SET utf8");
        
            } catch(Exception $e) {
        
                $con = "ERROR";
        
            } finally {
        
                return $con;
                
            }
        }

    }
?>