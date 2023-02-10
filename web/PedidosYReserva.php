<?php
require_once("../modelo/Conexion.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $Usuario = $_SESSION["NombreUsuario"];
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders & bookings | Nigiri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/VerPedRes.css">
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
</head>


<body id="page-top">
    <nav class="stroke navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0">
                    <?php
                    require_once("../modelo/Conexion.php");
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    //Seleccionamos el id del usuario logeado
                    $nombre = $_SESSION["NombreUsuario"];
                    $con = Conexion::getConection();
                    $sql = "SELECT IdUsuarios FROM Usuarios WHERE NombreUsuario = '$nombre'";
                    $query = $con->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                            $id = $result->IdUsuarios;
                        }
                    }

                    $sql = "SELECT Direccion FROM `Usuarios` WHERE IdUsuarios = $id;";
                    $query = $con->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                            $dire = $result->Direccion;
                        }
                    }
                    if (!empty($_SESSION["NombreUsuario"])) {

                    ?>
                        <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="pedidos.php">Order Now</a></li>
                        <li class="nav-item"><a class="nav-link" href="reservas.php">Book Now</a></li>
                        <?php

                        if ($_SESSION["NombreUsuario"] == "admin") {
                        ?><li class="nav-item"><a class="nav-link" href="admin.php"><?php echo "Welcome " . $_SESSION["NombreUsuario"]; ?></a></li><?php
                                                            }
                                                                ?>
                        <?php
                        if ($_SESSION["NombreUsuario"] != "admin") {
                        ?> <li class="nav-item"><a class="nav-link" href="paginaUsuario.php"><?php echo "Welcome " . $_SESSION["NombreUsuario"]; ?></a></li><?php
                                                                    }
                                                                } else {
                                                                    header("location:principal.php");
                                                                        ?>
                        <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="../modelo/sesion.php">Order Now</a></li>
                        <li class="nav-item"><a class="nav-link" href="../modelo/sesion.php">Book Now</a></li>
                        <li class="nav-item"><a class="nav-link" href="../modelo/sesion.php">Log in</a></li><?php
                                                                }?>
                </ul>
            </div>
        </div>
    </nav>
    <div id="griddy">
        <header class="masthead">
            <div class="mt-3 mx-2 masthead-heading text-uppercase">Your orders and booking</div>
            <div class="font-italic masthead-subheading mt-5" id="kanji">礼</div>
            <a class="mt-5 p-4 px-5 btn btn-danger btn-xl text-uppercase" href="paginaUsuario.php">Back</a>
        </header>
            <!-- Los Pedidos del usuario  -->
            <div class="card-body mx-auto articulo" id="bg-article">
                <h4 class="card-title mt-3 text-center text-uppercase your">Your orders</h4>
                <div class="form-group your">
                    <article class="card-body mx-auto articulo" id="bg-article">
                        <table class="table table-dark table-hover bg-transparent centrar">
                            <tr>
                                <th>
                                    Total price
                                </th>
                                <th>
                                    Order date
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Payment Method
                                </th>
                            </tr>
                            
                            <?php
                            //Mostramos todos los pedidos realizados por el usuario
                            $con = Conexion::getConection();
                            $sql = "SELECT p.IdUsuarios,p.PrecioFinal , p.FechaPedido ,p.Direccion, p.MetodoPago FROM Pedidos p, Usuarios u WHERE p.IdUsuarios = u.IdUsuarios and u.NombreUsuario = '$Usuario'";
                            $query = $con->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);


                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                                    echo " <tr> 
<td>" . $result->PrecioFinal . "</td>
<td>" . $result->FechaPedido . "</td>
<td>" . $result->Direccion . "</td>
<td>" . $result->MetodoPago . "</td>

</tr>";
                                }
                            }
                            ?>
                        </table>
                    </article>
                </div>
            </div>

            <!-- Las Reservas del usuario -->
            <div class="card-body mx-auto articulo" id="bg-article">
                <h4 class="card-title mt-3 text-center text-uppercase your">Your bookings</h4>

                <div class="form-group your">
                    <article class="card-body mx-auto articulo" id="bg-article">
                        <table class="table table-dark table-hover bg-transparent centrar">
                            <th>
                                Table
                            </th>
                            <th>
                                Book date
                            </th>
                            <th>
                                Book hour
                            </th>
                            <th>
                                nº diners
                            </th>
                            </tr>

                            <?php
                            $con = Conexion::getConection();
                            $sql = "SELECT r.IdUsuarios,  r.Mesa , r.FechaReserva,r.NumeroPersonas,r.HoraReserva FROM RegistroReservas r, Usuarios u WHERE r.IdUsuarios = u.IdUsuarios and u.NombreUsuario = '$Usuario'";
                            $query = $con->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                                    echo " <tr> 
<td>" . $result->Mesa . "</td>
<td>" . $result->FechaReserva . "</td>
<td>" . $result->HoraReserva . "</td>
<td>" . $result->NumeroPersonas . "</td>
</tr>";
                                }
                            } ?>
                        </table>
                    </article>
                </div>
            </div>
        </div>

    <script src="scripts/comun.js"></script>

</body>

</html>