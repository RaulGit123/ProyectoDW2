<?php
require_once("../modelo/Conexion.php");
      if (session_status()===PHP_SESSION_NONE){
        session_start();
        $Usuario = $_SESSION["NombreUsuario"];
    } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders and Books | Nigiri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="styles/orders.css"> -->
    <link rel="stylesheet" href="styles/verPedRes.css">
     <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
</head>

<header class="masthead">
        
            <div class="mt-3 masthead-subheading text-uppercase">Your orders and booking</div>
                <div class="font-italic masthead-subheading mt-5" id="kanji">礼</div>
                <a class="mt-5 p-4 px-5 btn btn-danger btn-xl text-uppercase" href="../vista/PaginaUsuario.php">Volver</a> <!--AQUÍ TAMBIÉN!! ir a our menu-->
            
        </header>


<body id="page-top">
    <div class="grid">
        <!-- <section class="card bg-dar"> -->
        <!-- Los Pedidos del usuario  -->
        <div class="card-body mx-auto articulo" id="bg-article"> 
        <h4 class="card-title mt-3 text-center text-uppercase your">Your orders</h4>
        <article class="card-body mx-auto articulo" id="bg-article">  

<div class="form-group your">

    
<table border="0" cellspacing="1" cellpadding="1" class="table table-dark table-hover bg-transparent centrar"> 
<tr> 
<td> <font face="Arial">IdPedidos</font> </td> 
<td> <font face="Arial">PrecioFinal</font> </td> 
<td> <font face="Arial">FechaPedido</font> </td> 
<td> <font face="Arial">Direccion</font> </td>
<td> <font face="Arial">MetodoPago</font> </td> 
</tr>
<?php

$con = Conexion::getConection();
$sql = "SELECT p.IdPedidos , p.PrecioFinal , p.FechaPedido ,p.Direccion, p.MetodoPago FROM pedidos p, usuarios u WHERE p.IdUsuarios = u.IdUsuarios and u.NombreUsuario = '$Usuario'";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 


if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo " <tr> 
<td>".$result -> IdPedidos."</td>
<td>".$result -> PrecioFinal."</td>
<td>".$result -> FechaPedido."</td>
<td>".$result -> Direccion."</td>
<td>".$result -> MetodoPago."</td>

</tr>";



}
}
?>
</table>
</div>

</article>


                </div>
            <!-- Las Reservas del usuario -->
            <div class="card-body mx-auto articulo" id="bg-article">
            <h4 class="card-title mt-3 text-center text-uppercase your">Your bookings</h4>
            <article class="card-body mx-auto articulo" id="bg-article">  

<div class="form-group your">

    
<table border="0" cellspacing="1" cellpadding="1" class="table table-dark table-hover bg-transparent centrar"> 
<td> <font face="Arial">IdReservas</font> </td> 
<td> <font face="Arial">Mesa</font> </td> 
<td> <font face="Arial">FechaReserva</font> </td> 
<td> <font face="Arial">HoraReserva</font> </td>
<td> <font face="Arial">NumeroPersonas</font> </td> 
</tr>

<?php
$con = Conexion::getConection();
$sql = "SELECT r.IdReservas , r.Mesa , r.FechaReserva,r.NumeroPersonas,r.HoraReserva FROM registroreservas r, usuarios u WHERE r.IdUsuarios = u.IdUsuarios and u.NombreUsuario = '$Usuario'";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 


if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo " <tr> 
<td>".$result -> IdReservas."</td>
<td>".$result -> Mesa."</td>
<td>".$result -> FechaReserva."</td>
<td>".$result -> HoraReserva."</td>
<td>".$result -> NumeroPersonas."</td>

</tr>";



}
}?>
</table>
</div>

</article>

            </div>
    <!-- </section> -->
</div>                    
    <script src="comun.js"></script>
</body>
</html>