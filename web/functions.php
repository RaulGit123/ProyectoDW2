<?php
if(isset($_POST)){
$nombre = $_POST['nombre'];
echo 'Buenos dias '.$nombre;
}?>
<?php
$mysqli = new mysqli("localhost", "root", "", "nigiri");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("Insert into RegistroReservas (IdUsuarios,Mesa,FechaReserva,NumeroPersonas) VALUES (1,1,$nombre,3)")) {
    echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
}
?>