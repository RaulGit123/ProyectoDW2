<?php
include("../modelo/ClaseModelo.php");
include("../modelo/ClaseNigiri.php");
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once("Conexion.php");
//Aquí implementaremos la subida de un nuevo producto con imagen incluida.
/*-------------- codigo para carga de imagen ------------------ */
if (isset($_POST['insert'])) {
  //Recogemos el archivo enviado por el formulario
  $archivold = $_FILES['imagen']['name'];
  $archivo = strtolower($archivold);
  //Si el archivo contiene algo y es diferente de vacio
  if (isset($archivo) && $archivo != "") {
    //Obtenemos algunos datos necesarios sobre el archivo
    $patch = "../web/img/platos/";   //ruta a la que queremos enviar.
    //  $patchInsert  = str_replace('\\', '/', $patch).'/'. $archivo;  //ruta con insercion
    $Tipo = $_FILES['imagen']['type'];
    $tamano = $_FILES['imagen']['size'];
    $temp = $_FILES['imagen']['tmp_name'];  //ruta relativa

    //Si la carpeta no existe, la creamos

    if (!file_exists($patch)) {
      mkdir($patch, 0777, true);
    };

    //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
    if (!((strpos($Tipo, "gif") || strpos($Tipo, "jpeg") || strpos($Tipo, "jpg") || strpos($Tipo, "png")) && ($tamano < 20000000))) {
      echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
       - Se permiten archivos .gif, .jpg, .png. y de 2000 kb como máximo.</b></div>';
    } else {

      //Si la imagen es correcta en tamaño y tipo
      //Se intenta subir al servidor

      if (move_uploaded_file($temp, $patch . $archivo)) {
        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
        chmod($patch . $archivo, 0777);
        //Mostramos el mensaje de que se ha subido co éxito
        echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
      } else {
        //Si no se ha podido subir la imagen, mostramos un mensaje de error
        echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
      }
    }
  }
}
/*-------------- FIN codigo para carga de imagen ------------------ */



$con = Conexion::getConection();  //realizamos nueva conexión 
//recojemos datos de post de form_insertar.php
$Nombre = ($_POST['Nombre']);
$Descripcion = ($_POST['Descripcion']);
$Ingredientes = ($_POST['Ingredientes']);
$Precio = ($_POST['Precio']);
$Imagen = strtolower($archivo);
$Tipo = ($_POST['Tipo']);
if ($Precio == "") {
  $Precio = 0.00;
}
$f1 = new Nigiri();
$f1->InsertarComida($Nombre, $Descripcion, $Ingredientes, $Precio, $Imagen, $Tipo); // llamamos a la funcion InsertarComida
header("Location:../web/admin.php");  // devolvemos a la ventana consola de admin.php
