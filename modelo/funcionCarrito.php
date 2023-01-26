<?php
 require_once("Conexion.php");


function eliminarComida($IdComida)
{
    $con = Conexion::getConection();
    $sql = $con->prepare("DELETE FROM Comida WHERE IdComida = ?");
    return $sql->execute([$IdComida]);
}

function guardarComida($Nombre, $Precio, $Descripcion)
{
    $con = Conexion::getConection();
    $sql = $con->prepare("INSERT INTO Comida(Nombre, Precio, Descripción) VALUES(?, ?, ?)");
    return $sql->execute([$Nombre, $Precio, $Descripcion]);
}


//ejemplo seleccion comida

$con = Conexion::getConection();
$sql = "SELECT IdComida , Nombre , Descripción , Precio FROM Comida";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo "<tr>
<td>".$result -> IdComida."</td>
<td>".$result -> Nombre."</td>
<td>".$result -> Descripción."</td>
<td>".$result -> Precio."</td>
</tr>";

   }
 }


 function mostrarComida($IdComida){
    $con = Conexion::getConection(); 
    $sql = "SELECT IdComida , Nombre , Descripción , Precio FROM Comida WHERE IdComida = :IdComida";
    $query = $con -> prepare($sql); 
    $_array = array(
        ":IdComida" =>  $IdComida
    );

    if($query->execute($_array))
        return $query->fetch();

    
}

function mostraComida(){
    $rows = null;
    $con = Conexion::getConection(); 
    $sql = "SELECT IdComida , Nombre , Descripción , Precio FROM Comida ";
    $query = $con -> prepare($sql); 
    $query->execute();
    while($result=$query->fetch())
    {
        $rows[]=$result;
    }
    return $rows;


    
}




mostraComida();

?>