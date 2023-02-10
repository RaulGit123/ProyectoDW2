<?php




require_once("Conexion.php");

//se comprueba si sesión iniciada.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// se recojen datos de SESSION y de POST del formulario form_cambiaPass.php

$nombre = $_SESSION["NombreUsuario"];
$nuevaContraseña = md5($_POST["cambiaPass"]);
$actualContraseña = $_POST["passActual"];
$mdcinco = md5($actualContraseña); //se guarda la variable de post en md5 porque en la base de datos se encripta a  ese valor y para hacer una comparativa ==

//Realizamos consulta para verificar que la contraseña que introdujo el usuario en el formulario existe en la tabla Usuarios comparandola.
$con = Conexion::getConection();
$sql = "SELECT Contraseña FROM Usuarios WHERE Contraseña = '$mdcinco'";
$query = $con->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

// si encuentra un resultado recorriendo el objeto comparará si está seteado passActual y CambiaPass y hará una consulta para actualizar la contraseña filtrando por nombreUsuario 
if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        $contraseñaUsuario = $result->Contraseña;
    }
    if (isset($_POST["passActual"]) && isset($_POST["cambiaPass"])) {

        $con = Conexion::getConection();
        $sql = "UPDATE Usuarios SET Contraseña = '$nuevaContraseña' WHERE NombreUsuario = '$nombre' ";
        $query = $con->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        header("location:sesion.php");
    }

    // si no encuentra resultados devolverá al formulario

} else {
    header("location:../web/form_cambiaPass.php");
}
//
