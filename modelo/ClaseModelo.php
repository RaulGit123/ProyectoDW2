<?php

class Modelo extends PDO {

    protected $conexion;
    public function __construct() {
        $this->conexion = new PDO('mysql:host=' . Config::$db_hostname . ';dbname=' . Config::$db_nombre . '', Config::$db_usuario, Config::$db_clave);
        // Realiza el enlace con la BD en utf-8
        $this->conexion->exec("set names utf8");
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
?>
?>
<?php

class Config {
    public static $db_hostname = "localhost";
    public static $db_nombre = "nigiri";
    public static $db_usuario = "root";
    public static $db_clave = "";
    // public static $mvc_vis_css = "style.css";
    // public static $vista = __DIR__ . '/../templates/inicio.php';
    // public static $menu = __DIR__ . '/../templates/menuInvitado.php';
}
?>