<?php
      if (session_status()===PHP_SESSION_NONE){
        session_start();
    } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../web/styles/menu.css">
    <link rel="stylesheet" href="../web/styles/pag_principal.css">
</head>
<body id="page-top">
    <nav class="stroke navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="../web/img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars my-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0">
                   

                   <?php
              
               if (!empty($_SESSION["NombreUsuario"])){
               ?>  
                <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li> <!--FALTA PONER HREF CON RESTO DE PÁGINAS, NO #x-->
                <li class="nav-item"><a class="nav-link" href="../web/pedidos.php">Order Now</a></li>
                <li class="nav-item"><a class="nav-link" href="../web/reservas.php">Book Now</a></li>
                <li class="nav-item"><a class="nav-link activo" href="#page-top"><?php echo"Bienvenido ".$_SESSION["NombreUsuario"];?></a></li>
            <?php }?>
                           
           </ul>
                
            </div>
        </div>
    </nav>
    <header class="masthead">
       
        <div class="mt-3 masthead-heading text-uppercase"><?php echo"Bienvenido a nigiri, ".$_SESSION["NombreUsuario"];?></div>
            <div class="masthead-subheading font-italic">Que deseas? Quizá una reserva? o mejor te lo traemos a casa?</div>
            <a class="mt-5 mr-2 p-4 px-3 btn btn-danger btn-lg text-uppercase" href="../web/pedidos.php">Realizar pedido</a>
            <a class="mt-5 mr-2 p-4 px-3 btn btn-danger btn-lg text-uppercase" href="../web/reservas.php">Reservar mesa</a>
            <a class="mt-5 mr-2 p-4 px-3 btn btn-danger btn-lg text-uppercase" href="carrito.php">Ver carrito</a>

            <div class="font-italic masthead-subheading mt-5" id="kanji">礼</div>
            <a class="mt-5 p-4 px-5 btn btn-danger btn-xl text-uppercase" href="../controlador/CtrlSalir.php">Salir</a> <!--AQUÍ TAMBIÉN!! ir a our menu-->
        </div>
    </header>

    <section class="p-5 page-section" id="aboutus"> <!--id services-->
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Reservas y pedidos</h2>
                <h3 class="section-subheading mx-auto">Para efectuar una reserva o un pedido necesita registrarse en la web para asegurarnos de que no eres un robot.</h3>
            </div>
        </div>
    </section>
    
    <footer class="bg-dark text-center text-white">
        <div class="container p-4">
            <section class="mb-4">
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i
                        class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-linkedin"></i></a>
            </section>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                Contact us at: <a class="text-light" href="mailto:nigirijapan@gmail.com">nigirijapan@gmail.com</a> | <a
                    class="text-light" href="tel:+34963123456">963 12 34 56</a> | <a class="text-light"
                    href="https://goo.gl/maps/x7VUrEzaKU3dV3cV8">C/D'Alberic 18, 46008 València</a>
            </div>
    </footer>
    <script>
        window.onscroll = function () { scrollFunction() };
        function scrollFunction() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                document.querySelector("nav").classList.add("navbar-shrink");
            } else {
                document.querySelector("nav").classList.remove("navbar-shrink");
            }
        }
    </script>
</body>
</html>
