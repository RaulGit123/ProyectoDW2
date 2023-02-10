<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Nigiri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/pag_principal.css">
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

                    //Si no hay sesion abierta se mostrará la página principal , de lo contrario se redirige a la página usuario.
                    if (empty($_SESSION["NombreUsuario"])) {

                        include_once("../modelo/modeloLogin.php");
                    ?>

                        <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li>
                        <li class="nav-item"><a class="nav-link aqui activo">Order Now</a></li>
                        <li class="nav-item"><a class="nav-link aqui activo">Book Now</a></li>
                        <li class="nav-item"><a class="nav-link" href="../modelo/sesion.php">Log in</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <div id="griddy">
        <div class="contenido">
            <header class="masthead">
                <!-- form-group -->
                <div class="px-0 container">
                    <div class="mt-3 masthead-heading text-uppercase">Welcome to Nigiri</div>
                    <div class="masthead-subheading font-italic">Enter with your user and enjoy your order at home.</div>
                    <a class="mt-5 p-4 px-5 btn btn-danger btn-xl text-uppercase" href="../modelo/sesion.php">Enter</a>
                </div>
                <!-- form-group -->
            </header>

            <section class="p-5 page-section" id="aboutus">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Booking and orders</h2>
                        <h3 class="section-subheading mx-auto">To make a reservation or an order you need to register on the web to make sure that you are not a robot.</h3>
                    </div>
                </div>
        </div>
        </section>
    </div>
    <script src="scripts/comun.js"></script>
</body>

</html>



<?php
                        exit();
                    } else {
                        header('Location: ../web/paginaUsuario.php');
                    }
?>