<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link rel="stylesheet" href="styles/book.css">
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0">
                <?php
                        if (session_status()===PHP_SESSION_NONE){
                            session_start();
                        }
                        if (!empty($_SESSION["NombreUsuario"])){
                           ?>  
                            <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li> <!--FALTA PONER HREF CON RESTO DE PÁGINAS, NO #x-->
                            <li class="nav-item"><a class="nav-link" href="pedidos.php">Order Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="#page-top">Book Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="../controlador/CtrlSalir.php"><?php echo"Bienvenido ".$_SESSION["NombreUsuario"];?></a></li><?php
                        }else {
                            ?>
                            <li class="nav-item"><a class="nav-link" href="#page-top">Our Menu</a></li> <!--FALTA PONER HREF CON RESTO DE PÁGINAS, NO #x-->
                            <li class="nav-item"><a class="nav-link" href="../vista/principal.php">Order Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="../vista/principal.php">Book Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="../hugo.php">Log in</a></li><?php
                        }
                        ?>
                        <!-- href="../controlador/CtrlSalir.php"> referenciará a finalizar la sesión -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="card bg-dar" >
    <!-- <article class="card-body mx-auto articulo" id="bg-article"> -->
    <section class="p-2 page-section" id="aboutus">
        <div class="container">
            <header class="masthead">
                <div class="masthead-subheading font-italic text-uppercase titular">Booking</div>
                <div class="px-0 container">
                    <div class=" font-italic text-uppercase">People</div>

</div>
                    </div>
                    <!-- </article> -->
                    </div>
                    <script src="comun.js"></script>
</body>

</html>