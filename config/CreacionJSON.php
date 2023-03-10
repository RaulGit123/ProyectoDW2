<?php
require_once("config.php");

//generamos la consulta
$sql = "SELECT * FROM Comida";
mysqli_set_charset($link, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($link, $sql)) die();

$comida = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
    $IdComida=$row['IdComida'];
    $Nombre=$row['Nombre'];
    $Descripcion=$row['Descripcion'];
    $Ingredientes=$row['Ingredientes'];
    $Precio=$row['Precio'];
    $Imagen=$row['Imagen'];
    $Tipo=$row['Tipo'];
    

    $comida[] = array('IdComida'=> $IdComida, 'Nombre'=> $Nombre, 'Descripcion'=> $Descripcion, 'Ingredientes'=> $Ingredientes,
                        'Precio'=> $Precio, 'Imagen'=> $Imagen, 'Tipo'=> $Tipo);

}
    
//desconectamos la base de datos
$close = mysqli_close($link) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($comida);


//Si queremos crear un archivo json, sería de esta forma:

$file = '../config/comida.json'; // ../config porque lo pide desde web/pedidos.php
file_put_contents($file, $json_string);
