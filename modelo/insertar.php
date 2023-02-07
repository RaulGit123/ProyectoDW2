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
     $tipo = $_FILES['archivo']['type'];
     $tamano = $_FILES['archivo']['size'];
     $temp = $_FILES['archivo']['tmp_name'];
     //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 20000000))) {
       echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
       - Se permiten archivos .gif, .jpg, .png. y de 2000 kb como máximo.</b></div>';
    }
    else {
      echo"hola";
       //Si la imagen es correcta en tamaño y tipo
       //Se intenta subir al servidor
       if (move_uploaded_file($temp, './web/img/'.$archivo)) {
           //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
           chmod('web/img/'.$archivo, 0777);
           //Mostramos el mensaje de que se ha subido co éxito
           echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
           //Mostramos la imagen subida
           echo '<p><img src="./web/img/'.$archivo.'"></p>';
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
$Precio = ($_POST['Precio']);
$Imagen = strtolower($archivo);
$Tipo = ($_POST['tipo']);

 $f1 = new Nigiri();
 $f1->InsertarComida($Nombre, $Descripcion, $Ingredientes, $Precio, $Imagen, $Tipo);
header("Location:../vista/admin.php");
//  $sql =$con->prepare( "INSERT INTO Comida ( Nombre, Descripcion,Ingredientes,Precio,Imagen,tipo) VALUES (?,?,?,?,?,?)") ;
//  return $sql->execute([$Nombre,$Descripcion,$Ingredientes,$Precio,$Imagen,$Tipo]);



 
?>