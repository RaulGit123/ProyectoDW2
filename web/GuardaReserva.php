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
$mesa = [1,2,3,4];


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
if(AsignarMesa($mesa,$output2,$output3)>0){
  $mesita = AsignarMesa($mesa, $output2, $output3);
$hola->AñadirRegRes($id,$mesita,$output2,$output,$output3);
}
function AsignarMesa($mesa,$output2,$output3)
{
    $disponible = 0;
    for ($i = 0; $i < count($mesa);$i++) {
      $con = Conexion::getConection();
        $sql = $con -> prepare("SELECT Mesa,FechaReserva,HoraReserva FROM RegistroReservas
        WHERE Mesa = '$mesa[$i]' and 
        FechaReserva = '$output2' and
        HoraReserva = '$output3'" );
        $sql -> execute();
        $sql -> fetchAll(PDO::FETCH_OBJ);
        // print_r($sql -> fetchAll(PDO::FETCH_OBJ));
        if($sql -> rowCount() >0)   {
          $disponible = 0;
             }else{
            $disponible = $mesa[$i];
            break;
             }
    }
    if($disponible !=0){
        return $disponible;
    }else{
      echo $disponible;
      return $disponible;
        // $d_nested = document.getElementById("respt");
        // $MuestraError = $doc->d_nested.classList.remove("d-none");
        // header("location: reservas.php");
        // echo '<script type="text/javascript">
        // let d_nested4 = document.getElementById("respt");
        // d_nested.classList.remove("d-none");
        // </script>';
    }
    
}
// function debug_to_console($data) {
//   $output = $data;
//   if (is_array($output))
//       $output = implode(',', $output);

//   echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
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