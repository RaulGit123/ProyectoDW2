<?php

// include("conexion.php");
// function ListadoCoomida(){
//     $con = Conexion::getConection();
//     $sql = "SELECT Nombre FROM comida";
//     $query = $con->prepare($sql);
//     $query->execute();
//     $results = $query -> fetchAll(PDO::FETCH_OBJ);

// if($query -> rowCount() > 0)   { 
//   foreach($results as $result) { 
//     echo '<div id="idUsu" style="display: none;">'.$result -> Nombre.'</div>';
//   }
// }
    
   
// }

class Nigiri extends Modelo
{
    public function ListadoComida(){
        $consulta = "SELECT * FROM nigiri.comida";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function EliminarComida($IdComida){
        $consulta = "DELETE FROM nigiri.comida WHERE IdComida = :IdComida";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':IdComida', $IdComida);
        $result->execute();
        return $result;
    }
    public function InsertarComida($Nombre, $Descripcion, $Ingredientes, $Precio, $Imagen, $Tipo){
        $consulta = "INSERT INTO nigiri.comida ( Nombre, Descripcion,Ingredientes,Precio,Imagen,tipo) VALUES (:nombre,:descripcion,:ingredientes,:precio,:imagen,:tipo)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre', $Nombre);
        $result->bindParam(':descripcion', $Descripcion);
        $result->bindParam(':ingredientes', $Ingredientes);
        $result->bindParam(':precio', $Precio);
        $result->bindParam(':imagen', $Imagen);
        $result->bindParam(':tipo', $Tipo);
        $result->execute();
        return $result;
    }
    public function Login($Usuario, $Contraseña){
        $consulta = "SELECT * FROM nigiri.usuarios WHERE NombreUsuario = :USU AND Contraseña = :PASS";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':USU', $Usuario);
        $result->bindParam(':PASS', $Contraseña);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function MuestraId($nombre){
        $consulta = "SELECT IdUsuarios FROM nigiri.usuarios WHERE NombreUsuario = :USU";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':USU', $nombre);
        $result->execute();
        return $result;

    }
    public function InsertarUsuario($NombreUsuario, $Nombre, $Apellidos, $Contraseña, $CorreoElectronico, $Direccion, $Provincia, $Codigo){
        $consulta = "INSERT INTO nigiri.usuarios (NombreUsuario,Nombre,Apellidos,Contraseña,CorreoElectronico,Direccion,Provincia,Rol,Activado,Codigo) VALUES (:nombreusuario,:nombre,:apellidos,:contraseña,:correoelectronico,:direccion,:provincia,2,'no',:codigo)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombreusuario', $NombreUsuario);
        $result->bindParam(':nombre', $Nombre);
        $result->bindParam(':apellidos', $Apellidos);
        $result->bindParam(':contraseña', $Contraseña);
        $result->bindParam(':correoelectronico', $CorreoElectronico);
        $result->bindParam(':direccion', $Direccion);
        $result->bindParam(':provincia', $Provincia);
        $result->bindParam(':codigo', $Codigo);
        $result->execute();
        return $result;
    }
    public function GuardaPedidos($IdUsuarios, $PrecioFinal, $FechaPedido){
        $consulta = "INSERT INTO nigiri.pedidos (IdUsuarios,PrecioFinal,FechaPedido) VALUES (:idusuarios,:preciofinal,:fechapedido)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idusuarios', $IdUsuarios);
        $result->bindParam(':preciofinal', $PrecioFinal);
        $result->bindParam(':fechapedido', $FechaPedido);
        $result->execute();
        return $result;
    }
    public function UltimoPedido(){
        $consulta = "SELECT IdPedidos FROM nigiri.pedidos ORDER BY IdPedidos DESC LIMIT 1";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function AñadirRegPed($id,$mesa,$output2, $output,$output3){
        $con = Conexion::getConection();
        $consulta = $con->prepare("INSERT INTO nigiri.RegistroReservas (IdUsuarios,Mesa,FechaReserva,NumeroPersonas,HoraReserva) VALUES (:idUsuarios,:mesa,:fechaReserva,:numeroPersonas,:horareserva)");
        $consulta->bindParam(':idUsuarios', $id);
        $consulta->bindParam(':mesa', $mesa);
        $consulta->bindParam(':fechaReserva', $output2);
        $consulta->bindParam(':numeroPersonas', $output);
        $consulta->bindParam(':horareserva', $output3);
    return $consulta->execute();
    }
    public function AñadirRegRes($IdUsuarios,$Mesa,$FechaReserva,$NumeroPersonas,$HoraReserva){
        $consulta = $this->prepare("INSERT INTO nigiri.RegistroReservas (IdUsuarios,Mesa,FechaReserva,NumeroPersonas,HoraReserva) VALUES (:idUsuarios,:mesa,:fechaReserva,:numeroPersonas,:horareserva)");
        $consulta->bindParam(':idUsuarios', $IdUsuarios);
        $consulta->bindParam(':mesa', $Mesa);
        $consulta->bindParam(':fechaReserva', $FechaReserva);
        $consulta->bindParam(':numeroPersonas', $NumeroPersonas);
        $consulta->bindParam(':horareserva', $HoraReserva);
        if ($consulta->execute()) {
            return true;
        } else
            return false;
    }
    public function ComprobarReservas($mesa,$fecha,$hora){
        $consulta = "SELECT Mesa FROM nigiri.RegistroReservas WHERE Mesa = :mesa and FechaReserva = :fecha and HoraReserva = :hora" ;
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':mesa', $mesa);
        $result->bindParam(':fecha', $fecha);
        $result->bindParam(':hora', $hora);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}
?>