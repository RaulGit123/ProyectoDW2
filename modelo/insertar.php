<?php
include ("../modelo/ClaseModelo.php");
include ("../modelo/ClaseNigiri.php");
if (session_status()===PHP_SESSION_NONE){
  session_start();
}

require_once("Conexion.php");


if (isset($_POST['insert'])) {
  //Recogemos el archivo enviado por el formulario
  $archivo = $_FILES['imagen']['name'];
  //Si el archivo contiene algo y es diferente de vacio
  if (isset($archivo) && $archivo != "") {
     //Obtenemos algunos datos necesarios sobre el archivo
     $patch = "../web/img/platos";   //ruta a la que queremos enviar.
     $patchInsert  = str_replace('\\', '/', $patch).'/'. $archivo;  //ruta con insercion
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
    }
    else {
     
       //Si la imagen es correcta en tamaño y tipo
       //Se intenta subir al servidor
       if (move_uploaded_file($temp, $patchInsert)) {
           //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
           chmod($patchInsert, 0777);
           //Mostramos el mensaje de que se ha subido co éxito
           echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
         
       }
       else {
          //Si no se ha podido subir la imagen, mostramos un mensaje de error
          echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
       }
     }
  }
}

// $mysqli = new mysqli("localhost", $username, $password, $database);

$con = Conexion::getConection();

// Don't forget to properly escape your values before you send them to DB
// to prevent SQL injection attacks.

$Nombre = ($_POST['Nombre']);
$Descripcion = ($_POST['Descripcion']);
$Ingredientes = ($_POST['Ingredientes']);
$Precio = ($_POST['Precio']) ;
$Imagen = strtolower($archivo);
$Tipo = ($_POST['Tipo']);
if($Precio ==""){
  $Precio = 0.00;
}
$f1 = new Nigiri();
$f1->InsertarComida($Nombre, $Descripcion, $Ingredientes, $Precio, $Imagen, $Tipo);
//header("Location:../web/admin.php");
// $sql =$con->prepare( "INSERT INTO Comida ( Nombre, Descripcion,Ingredientes,Precio,Imagen,tipo) VALUES (?,?,?,?,?,?)") ;
// return $sql->execute([$Nombre,$Descripcion,$Ingredientes,$Precio,$Imagen,$Tipo]);

 
?>