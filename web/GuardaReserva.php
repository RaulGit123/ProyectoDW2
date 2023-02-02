<?php
include ("../modelo/ClaseModelo.php");
include ("../modelo/ClaseNigiri.php");
require_once("../modelo/Conexion.php");
if (session_status()===PHP_SESSION_NONE){
    session_start();
} 
$text = $_POST['text'];
$text2 = $_POST['text2'];
$text3 = $_POST['text3'];

$output = wordwrap($text, 60);
$output2 = wordwrap($text2, 60);
$output3 = wordwrap($text3, 60);
// $dom = new DOMDocument('1.0', 'utf-8');
$mesa = rand(1,4);



$nombre = $_SESSION["NombreUsuario"];
$con = Conexion::getConection();
$sql = "SELECT IdUsuarios FROM usuarios WHERE NombreUsuario = '$nombre'";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 


if($query -> rowCount() > 0)   { 
foreach($results as $result) { 

$id= $result -> IdUsuarios;



   }
 }


// function AñadirRegistro($id, $output, $output2, $output3,$mesa)
// {
//     // $reserva = AsignarMesa($mesa, $output2, $output3);
//     // echo $reserva;
//     // if ($reserva != 0) {
//         $con = Conexion::getConection();
//         $sql = $con->prepare("INSERT INTO RegistroReservas (IdUsuarios,Mesa,FechaReserva,NumeroPersonas,HoraReserva) VALUES (?,?,?,?,?)");
//         return $sql->execute([
//             $id,
//             1,
//             $output2,
//             $output,
//             $output3
//         ]);
//     } 

    
// }
//AñadirRegistro($id,$output,$output2,$output3);
$hola = new Nigiri();
$hola->AñadirRegPed($id,$mesa,$output2,$output,$output3);

// function AsignarMesa($mesa,$output2,$output3)
// {
//     $disponible = 0;
//     $con = Conexion::getConection();
//     for ($i = 0; $i < count($mesa);$i++) {
//         $sql = "SELECT Mesa,FechaReserva,HoraReserva FROM RegistroReservas
//         WHERE Mesa = $mesa[$i] and 
//         FechaReserva = $output2 and
//         HoraReserva = $output3" ;
//         $query = $con -> prepare($sql); 
//         $query -> execute(); 
//         if($query -> rowCount() < 1)   {
//             $disponible = $mesa[$i];
//             break;
//              }else{
//             $disponible = 0;
//              }
//     }
//     if($disponible !=0){
//         return $disponible;
//     }else{
//         // $d_nested = document.getElementById("respt");
//         // $MuestraError = $doc->d_nested.classList.remove("d-none");
//         echo "hola";
//         header("location: reservas.php");
//         echo '<script type="text/javascript">
//         let d_nested4 = document.getElementById("respt");
//         d_nested.classList.remove("d-none");
//         </script>';
//     }
    
// }

// function format_post_content($content = '') {
//     $document = new DOMDocument();
//     $document->loadHTML($content);
    
//     $tags = $document->getElementsByTagName('p');
//     foreach ($tags as $tag) {
//       $tag->classList.remove('src', 
//         str_replace('http://programacion.net', 
//                     'https://programacion.net', 
//                     $tag->getAttribute('src')
//         )
//       );
//     }
//     return $document->saveHTML();
//   }
?>  