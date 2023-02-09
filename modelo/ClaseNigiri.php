<?php


class Nigiri extends Modelo
{
    //No funciona(Hay que implementarlo en CreacionJSON.php y mostrar.php)
    public function ListadoComida(){
        $con = Conexion::getConection();
        $consulta = $con->prepare("SELECT * FROM nigiri.Comida");
        if ($consulta->execute()) {
            return true;
        } else
            return false;
    }
//Funciona
    public function EliminarComida($IdComida){
        $con = Conexion::getConection();
        $consulta = $con->prepare("DELETE FROM nigiri.Comida WHERE IdComida = :IdComida");
        $consulta->bindParam(':IdComida', $IdComida);
        $consulta->execute();
        return $consulta;
    }
    //Funciona
    public function EliminarRegistroPedido($IdComida){
        $con = Conexion::getConection();
        $consulta = $con->prepare("DELETE FROM nigiri.RegistroPedidos WHERE IdComida = :IdComida");
        $consulta->bindParam(':IdComida', $IdComida);
        $consulta->execute();
        return $consulta;
    }
    //FuncionaF
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
    //Funciona
    public function Login($Usuario, $Contraseña){
        $consulta = "SELECT * FROM nigiri.Usuarios WHERE NombreUsuario = :USU AND Contraseña = :PASS";
        $result = $this->conexion->prepare($consulta);
        $result->execute(array(":USU"=>$Usuario, ":PASS"=>$Contraseña));
        return $result;
    }
    //No funciona(en idusuario.php desaparece el contenido al poner los includes, hay que implementarlo en register.php y en GuardaPedido.php y GuardaReserva.php)
    public function MuestraId($nombre){
        $con = Conexion::getConection();
        $consulta = $con->prepare("SELECT IdUsuarios FROM nigiri.Usuarios WHERE NombreUsuario = :USU");
        $consulta->bindParam(':USU', $nombre);
        $consulta -> execute(); 
        $results = $consulta -> fetchAll(PDO::FETCH_OBJ);
        return $results;

    }
 
    
    public function InsertarUsuario($NombreUsuario, $Nombre, $Apellidos, $Contraseña, $CorreoElectronico, $Direccion, $Provincia, $Codigo){
        $consulta = "INSERT INTO nigiri.Usuarios (NombreUsuario,Nombre,Apellidos,Contraseña,CorreoElectronico,Direccion,Provincia,Rol,Activado,Codigo) VALUES (:nombreusuario,:nombre,:apellidos,:contraseña,:correoelectronico,:direccion,:provincia,2,'no',:codigo)";
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
    //Funciona
    public function GuardaPedidos($IdUsuarios, $PrecioFinal, $FechaPedido, $direccion, $metodoPago){
        $con = Conexion::getConection();
        $consulta = $con->prepare("INSERT INTO nigiri.Pedidos (IdUsuarios,PrecioFinal,FechaPedido,Direccion,MetodoPago) VALUES (:idusuarios,:preciofinal,:fechapedido,:direccion,:metodopago)");
        $consulta->bindParam(':idusuarios', $IdUsuarios);
        $consulta->bindParam(':preciofinal', $PrecioFinal);
        $consulta->bindParam(':fechapedido', $FechaPedido);
        $consulta->bindParam(':direccion', $direccion);
        $consulta->bindParam(':metodopago', $metodoPago);
        if ($consulta->execute()) {
            return true;
        } else
            return false;
    }
    //Funciona
    public function UltimoPedido(){
        $con = Conexion::getConection();
        $consulta = $con->prepare("SELECT IdPedidos FROM nigiri.Pedidos ORDER BY IdPedidos DESC LIMIT 1");
        $consulta -> execute(); 
        $results = $consulta -> fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    //Funciona
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
    //Funciona
    public function AñadirRegPed($idCom,$cant,$idPed){
        $con = Conexion::getConection();
        $consulta = $con->prepare("INSERT INTO nigiri.RegistroPedidos (IdComida,cantidad,IdPedidos) VALUES (:idcom,:cant,:idped)");
        $consulta->bindParam(':idcom', $idCom);
        $consulta->bindParam(':cant', $cant);
        $consulta->bindParam(':idped', $idPed);
        return $consulta->execute();
    }
    //No implementado
    public function ComprobarReservas($mesa,$fecha,$hora){
        $consulta = "SELECT Mesa FROM nigiri.RegistroReservas WHERE Mesa = :mesa and FechaReserva = :fecha and HoraReserva = :hora" ;
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':mesa', $mesa);
        $result->bindParam(':fecha', $fecha);
        $result->bindParam(':hora', $hora);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    //No Funciona
    public function ActivarCuenta($Codigo){
        $consulta = $this->prepare("UPDATE nigiri.Usuarios SET Activado = 'si' WHERE Codigo = :codigo ");
        $consulta->bindParam(':codigo', $Codigo);
        $consulta->execute();
        if ($consulta->execute()) {
            return true;
        } else
            return false;
    }
    //No he podido comprobar si funciona
    public function ObtenerNombreCodigo($MailUsuario){
        $con = Conexion::getConection();
        $consulta = $con->prepare("SELECT NombreUsuario,Codigo FROM Usuarios WHERE CorreoElectronico = :mailusuario");
        $consulta->bindParam(':mailusuario', $MailUsuario);
        $consulta -> execute(); 
        $results = $consulta -> fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    //Salta un error por una redeclaracion? Aunque si inicia la sesion
    public function ComprobarActivacion($Nombre){
        $con = Conexion::getConection();
        $consulta = $con->prepare("SELECT Activado FROM Usuarios WHERE NombreUsuario = :nombre");
        $consulta->bindParam(':nombre', $Nombre);
        $consulta -> execute(); 
        $results = $consulta -> fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
}
?>