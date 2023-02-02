<?php

//Aqui incluimos los  datos de conexión a la BD

    // $db_hostname = "localhost";
    // $db_nombre = "nigiri";
  //El usuario root núnca se puede usar, siempre cambiar por otro usuario
  //Nosotros lo usaremos para que nos funcionen a todos los ejemplos y los ejercicios
    // $db_usuario = "root";
    // $db_clave = "";


// define('DB_SERVER', $db_hostname);
// define('DB_USERNAME', $db_usuario);
// define('DB_PASSWORD', $db_clave);
// define('DB_NAME', $db_nombre);

    /* Attempt to connect to MySQL database */
    
    // $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
// if($link === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }


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