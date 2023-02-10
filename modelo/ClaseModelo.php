<?php
// clase que extiende de PDO, aqui crearemos el objeto conexión para solicitarlo mas tarde.

//misma implementación que modelo/conexion.php
class Modelo extends PDO {

    protected $conexion;
    public function __construct() {
        $this->conexion = new PDO('mysql:host=' . Config::$db_hostname . ';dbname=' . Config::$db_nombre . '', Config::$db_usuario, Config::$db_clave);
        // Realiza el enlace con la BD en utf-8
        $this->conexion->exec("set names utf8");
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

//Datos de configuración de  la base de datos.
class Config {
    public static $db_hostname = "localhost";
    public static $db_nombre = "nigiri";
    public static $db_usuario = "root";
    public static $db_clave = "";

}
