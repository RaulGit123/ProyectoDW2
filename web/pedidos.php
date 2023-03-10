<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Now | Nigiri</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/orders.css">
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


//sentencia sql para recoger direccion usuario
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
                        <li class="nav-item"><a class="nav-link activo">Order Now</a></li>
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
                                                                                                                                                    }
                                                                                                            ?>

                </ul>
            </div>
        </div>
    </nav>
    <section class="p-2 page-section" id="aboutus">
        <div class="container principal">
            <header class="masthead">

            </header>
            <div></div>
            <div id="zonaCarrito">
                <div id="carrito">
                    <h1>Basket summary</h1>

                </div>
                <div id="total">
                    <h1>TOTAL</h1>
                    <div id="precioFinal">0,00???</div>
                    <button id="fafin" class="btn btn-info">Order</button>
                </div>
            </div>
        </div>
    </section>
    <div class="d-none" id="precioReal"></div>
    <div class="d-none" id="dirBase"></div>
    <?php
    require_once('../modelo/idusuario.php');
    include_once('../config/CreacionJSON.php');
    ?>
    <div id="pago" class="d-none">
        <div id="recuadro">
            <div id="botonX">
                <button class="close-btn"><i class="fas fa-times"></i></button>
            </div>
            <h1 class="text-uppercase">Enter your address</h1>
            <input id="dire" name="dire" type="text" value="<?php echo $dire; ?>" required>
            <h1 class="text-uppercase">Enter your phone number</h1>
            <input id="phone" name="phone" type="text" value="<?php #echo $dire;
                                                                ?>" placeholder="Phone number" pattern="(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}" required>
            <h1 class="text-uppercase">Choose a payment method</h1>
            <div id="metodos">
                <img class="pp" src="img/pago/paypal.png" alt="paypal">
                <img class="cc" src="img/pago/visa.png" alt="visa">
                <img class="cc" src="img/pago/master.png" alt="master">
            </div>
              <!-- form-group -->
            <div id="cc" class="d-none">
                <h1>Bank data</h1>
                <div id="datosb">
                    <label for="numTar">Card Number</label>
                    <input name="numTar" type="text" placeholder="0000 0000 0000 0000" pattern="^(\b\d{4}\s?\d{4}\s?\d{4}\s?\d{4}\b)$" required>
                    <div><label for="expi">Expires</label>
                        <input name="expi" type="text" placeholder="MM/YY" pattern="(\b\d{2}\/\d{2}\b)" required>
                    </div>
                    <div><label for="cvc">CVC</label>
                        <input name="cvc" type="text" placeholder="***" pattern="(\b\d{3}\b)" required>
                    </div>
                </div>
            </div>
              <!-- form-group -->
            <div id="pp" class="d-none">
                <h1>Payment with PayPal</h1>
                <div id="datosp">
                    <label for="ppMail">PayPal account email</label>
                    <input name="ppMail" type="email" placeholder="example@mail.com" required>
                    <label for="ppPass">Password</label>
                    <input name="ppPass" type="password" placeholder="Password" minlength="6" required>
                </div>
            </div>
              <!-- form-group -->
            <button id="fin" class="btn btn-info">Finish</button>
        </div>
    </div>
    <script type="module" src="scripts/pedidos.js"></script>
    <script src="scripts/comun.js"></script>
</body>

</html>