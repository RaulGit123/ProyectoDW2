<?php
require_once("../modelo/Conexion.php");
$text = $_POST['text'];
$text2 = $_POST['text2'];

$output = wordwrap($text, 60);
$output2 = wordwrap($text2, 60);

// echo $output;
// echo $output2;

function AñadirRegistro($output,$output2)
{
    $con = Conexion::getConection();
    $sql = $con->prepare("INSERT INTO RegistroReservas (IdUsuarios,Mesa,FechaReserva,NumeroPersonas) VALUES (?,?,?,?)");
    return $sql->execute([1,2,$output2,$output
    ]);
}

AñadirRegistro($output,$output2);
?>  