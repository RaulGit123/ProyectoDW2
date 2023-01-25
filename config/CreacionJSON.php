<?php
require_once("config.php");

//generamos la consulta
$sql = "SELECT * FROM comida";
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
    $tipo=$row['tipo'];
    

    $comida[] = array('IdComida'=> $IdComida, 'Nombre'=> $Nombre, 'Descripcion'=> $Descripcion, 'Ingredientes'=> $Ingredientes,
                        'Precio'=> $Precio, 'Imagen'=> $Imagen, 'tipo'=> $tipo);

}
    
//desconectamos la base de datos
$close = mysqli_close($link) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($comida);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:

$file = 'comida.json';
file_put_contents($file, $json_string);

    

?>
<!-- Código para parsear JSON con jQuery.
$(document).ready(function(){
var url="generarJSON.php";
$("#tablajson tbody").html("");
$.getJSON(url,function(clientes){
$.each(clientes, function(i,cliente){
var newRow =
"<tr>"
+"<td>"+cliente.id+"</td>"
+"<td>"+cliente.nombre+"</td>"
+"<td>"+cliente.edad+"</td>"
+"<td>"+cliente.genero+"</td>"
+"<td>"+cliente.email+"</td>"
+"<td>"+cliente.localidad+"</td>"
+"<td>"+cliente.telefono+"</td>"
+"</tr>";
$(newRow).appendTo("#tablajson tbody");
});
});
}); -->