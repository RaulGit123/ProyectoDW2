<?php


class Nigiri extends Modelo
{
//Funcion para eliminar platos
    public function EliminarComida($IdComida){
        $con = Conexion::getConection();
        $consulta = $con->prepare("DELETE FROM nigiri.Comida WHERE IdComida = :IdComida");
        $consulta->bindParam(':IdComida', $IdComida);
        $consulta->execute();
        return $consulta;
    }
    //Funcion para eliminar pedidos
    public function EliminarRegistroPedido($IdComida){
        $con = Conexion::getConection();
        $consulta = $con->prepare("DELETE FROM nigiri.RegistroPedidos WHERE IdComida = :IdComida");
        $consulta->bindParam(':IdComida', $IdComida);
        $consulta->execute();
        return $consulta;
    }
    //Funcion para insertar platos
    public function InsertarComida($Nombre, $Descripcion, $Ingredientes, $Precio, $Imagen, $Tipo){
        $consulta = "INSERT INTO nigiri.Comida ( Nombre, Descripcion,Ingredientes,Precio,Imagen,Tipo) VALUES (:nombre,:descripcion,:ingredientes,:precio,:imagen,:tipo)";
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
    //Funcion que permitirá realizar el login
    public function Login($Usuario, $Contraseña){
        $consulta = "SELECT * FROM nigiri.Usuarios WHERE NombreUsuario = :USU AND Contraseña = :PASS";
        $result = $this->conexion->prepare($consulta);
        $result->execute(array(":USU"=>$Usuario, ":PASS"=>$Contraseña));
        return $result;
    }
    
    //Funcion para guardar pedidos en la base de datos
    public function GuardaPedidos($IdUsuarios, $PrecioFinal, $FechaPedido, $direccion, $telefono, $metodoPago){
        $con = Conexion::getConection();
        $consulta = $con->prepare("INSERT INTO nigiri.Pedidos (IdUsuarios,PrecioFinal,FechaPedido,Direccion,Telefono,MetodoPago) VALUES (:idusuarios,:preciofinal,:fechapedido,:direccion,:telefono,:metodopago)");
        $consulta->bindParam(':idusuarios', $IdUsuarios);
        $consulta->bindParam(':preciofinal', $PrecioFinal);
        $consulta->bindParam(':fechapedido', $FechaPedido);
        $consulta->bindParam(':direccion', $direccion);
        $consulta->bindParam(':telefono', $telefono);
        $consulta->bindParam(':metodopago', $metodoPago);
        if ($consulta->execute()) {
            return true;
        } else
            return false;
    }
    //Funcion para detectar cual ha sido el ultimo pedido
    public function UltimoPedido(){
        $con = Conexion::getConection();
        $consulta = $con->prepare("SELECT IdPedidos FROM nigiri.Pedidos ORDER BY IdPedidos DESC LIMIT 1");
        $consulta -> execute(); 
        $results = $consulta -> fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    //Funcion para guardar la reserva en la base de datos
    public function AñadirRegRes($id,$mesa,$output2, $output,$output3){
        $con = Conexion::getConection();
        $consulta = $con->prepare("INSERT INTO nigiri.RegistroReservas (IdUsuarios,Mesa,FechaReserva,NumeroPersonas,HoraReserva) VALUES (:idUsuarios,:mesa,:fechaReserva,:numeroPersonas,:horareserva)");
        $consulta->bindParam(':idUsuarios', $id);
        $consulta->bindParam(':mesa', $mesa);
        $consulta->bindParam(':fechaReserva', $output2);
        $consulta->bindParam(':numeroPersonas', $output);
        $consulta->bindParam(':horareserva', $output3);
    return $consulta->execute();
    }
    //Funcion para guardar en la base de datos un registro del pedido
    public function AñadirRegPed($idCom,$cant,$idPed){
        $con = Conexion::getConection();
        $consulta = $con->prepare("INSERT INTO nigiri.RegistroPedidos (IdComida,cantidad,IdPedidos) VALUES (:idcom,:cant,:idped)");
        $consulta->bindParam(':idcom', $idCom);
        $consulta->bindParam(':cant', $cant);
        $consulta->bindParam(':idped', $idPed);
        return $consulta->execute();
    }
    //Funcion para obetener el codigo de una cuenta 
    public function ObtenerNombreCodigo($MailUsuario){
        $con = Conexion::getConection();
        $consulta = $con->prepare("SELECT NombreUsuario,Codigo FROM Usuarios WHERE CorreoElectronico = :mailusuario");
        $consulta->bindParam(':mailusuario', $MailUsuario);
        $consulta -> execute(); 
        $results = $consulta -> fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
}
?>