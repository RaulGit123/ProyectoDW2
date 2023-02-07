<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | Nigiri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/menu.css">
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
</head>
<body id="page-top">
    <nav class="stroke navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars my-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0">
                    <?php
                        
                        if (session_status()===PHP_SESSION_NONE){
                            session_start();
                        }
                        if (!empty($_SESSION["NombreUsuario"])){
                           ?>  
                            <li class="nav-item"><a class="nav-link activo">Our Menu</a></li> <!--FALTA PONER HREF CON RESTO DE PÁGINAS, NO #x-->
                            <li class="nav-item"><a class="nav-link" href="pedidos.php">Order Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="reservas.php">Book Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="../hugo.php"><?php echo"Welcome ".$_SESSION["NombreUsuario"];?></a></li><?php
                        }else {
                            ?>
                            <li class="nav-item"><a class="nav-link activo">Our Menu</a></li> <!--FALTA PONER HREF CON RESTO DE PÁGINAS, NO #x-->
                            <li class="nav-item"><a class="nav-link" href="principal.php">Order Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="principal.php">Book Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="../hugo.php">Log in</a></li><?php
                        }
                        ?>
                        <!-- href="../controlador/CtrlSalir.php"> referenciará a finalizar la sesión -->
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
        <div class="px-0 container">
            <div class="my-3 masthead-heading text-uppercase">Our dishes</div>
            <div class="masthead-subheading font-italic">In the case of suffering from any food allergy or intolerance, you can contact our staff.</div>
        </div>
    </header>
    <section id="carta">
        
    </section>
    <?php 
    include_once('../config/CreacionJSON.php');
    ?>
    <script type="module" src="menu.js"></script>
    <script src="comun.js"></script>
</body>
</html>