<?php
require_once("../modelo/Conexion.php");
$text = $_POST['text'];
$text2 = $_POST['text2'];
$text3 = $_POST['text3'];

$output = wordwrap($text, 60);
$output2 = wordwrap($text2, 60);
$output3 = wordwrap($text3, 60);

// echo $output;
// echo $output2;

function AñadirRegistro($output,$output2,$output3)
{
    $con = Conexion::getConection();
    $sql = $con->prepare("INSERT INTO RegistroReservas (IdUsuarios,Mesa,FechaReserva,NumeroPersonas,HoraReserva) VALUES (?,?,?,?,?)");
    return $sql->execute([1,1,$output2,$output,$output3
    ]);
}

AñadirRegistro($output,$output2,$output3);
?>  