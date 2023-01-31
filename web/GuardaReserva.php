<?php
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
$nombre = $_SESSION["NombreUsuario"];
echo $nombre;
// echo $output;
// echo $output2;

$con1=conexion::getConection();
$sql="SELECT IdUsuarios FROM usuarios WHERE NombreUsuario ='$nombre'";
$query= $con1 -> prepare($sql);
$query->execute();
$resultado=$query->fetchAll(PDO::FETCH_OBJ);

echo '<table border="0" cellspacing="2" cellpading = "2">
        <tr>
        <td> <font face="Arial">IdUsuario</font> </td>
        </tr>';

if($query -> rowCount() > 0) {
    echo $nombre; 
foreach($resultado as $result){
    
    echo "<tr><td>".$result->IdUsuarios."</td></tr>";
   
}
}

function AñadirRegistro($id,$output,$output2,$output3)
{
    $con = Conexion::getConection();
    $sql = $con->prepare("INSERT INTO RegistroReservas (IdUsuarios,Mesa,FechaReserva,NumeroPersonas,HoraReserva) VALUES (?,?,?,?,?)");
    return $sql->execute([$id,1,$output2,$output,$output3
    ]);
}

//AñadirRegistro($output,$output2,$output3);
?>  