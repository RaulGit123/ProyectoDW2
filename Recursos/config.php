<?php

//Aqui incluimos los  datos de conexión a la BD

  $db_hostname = "localhost";
    $db_nombre = "nigiri";
  //El usuario root núnca se puede usar, siempre cambiar por otro usuario
  //Nosotros lo usaremos para que nos funcionen a todos los ejemplos y los ejercicios
    $db_usuario = "root";
    $db_clave = "";


define('DB_SERVER', $db_hostname);
define('DB_USERNAME', $db_usuario);
define('DB_PASSWORD', $db_clave);
define('DB_NAME', $db_nombre);
    


?>
