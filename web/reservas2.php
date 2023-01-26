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
    <link rel="stylesheet" href="styles/book.css">
</head>
<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
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
                            <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li> <!--FALTA PONER HREF CON RESTO DE PÁGINAS, NO #x-->
                            <li class="nav-item"><a class="nav-link" href="pedidos.php">Order Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="#page-top">Book Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="../controlador/CtrlSalir.php"><?php echo"Bienvenido ".$_SESSION["NombreUsuario"];?></a></li><?php
                        }else {
                            ?>
                            <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li> <!--FALTA PONER HREF CON RESTO DE PÁGINAS, NO #x-->
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
    <header class="masthead">
        <div class="px-0 container">
            <div class="my-3 masthead-heading text-uppercase">Our dishes</div>
            <div class="masthead-subheading font-italic">In the case of suffering from any food allergy or intolerance, you can contact our staff.</div>
        </div>
    </header>
    <section id="carta">
        <div class="seccion-carta"> <!--STARTERS-->
            <h1 class="text-uppercase">Starters</h1>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/platos/gyoza.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Gyoza</h5>
                    <p class="card-text">Culpa ea adipisicing veniam duis nostrud nisi fugiat amet laboris consequat irure do non exercitation.</p>
                    <hr style="border-top: 1px solid white;">
                    <h3 class="text-align-right">9,59€</h3>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/platos/edamame.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Edamame</h5>
                    <p class="card-text">Commodo reprehenderit cillum et nisi voluptate ut adipisicing exercitation voluptate ullamco.</p>
                    <hr style="border-top: 1px solid white;">
                    <h3 class="text-align-right">3,95€</h3>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/platos/rollitos.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Vegetable roll</h5>
                    <p class="card-text">Nostrud reprehenderit ipsum tempor deserunt aute aliqua sint.</p>
                    <hr style="border-top: 1px solid white;">
                    <h3 class="text-align-right">6,50€</h3>
                </div>
            </div>
        </div>
        <div class="seccion-carta"> <!--RAMEN-->
            <h1 class="text-uppercase">Ramen</h1>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/platos/black-garlic-chicken-ramen.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Black garlic chicken ramen</h5>
                    <p class="card-text">Classic, savory, and comforting. The perfect cozy companion for an evening at home. Overflowing with notes of garlic, scallions, and umami</p>
                    <hr style="border-top: 1px solid white;">
                    <h3 class="text-align-right">6,50€</h3>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/platos/paitan-chicken-ramen.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Paitan chicken ramen</h5>
                    <p class="card-text">Chicken paitan broth is the chicken-based cousin of tonkotsu ramen broth—creamy, rich, and perfect for noodle soups.</p>
                    <hr style="border-top: 1px solid white;">
                    <h3 class="text-align-right">7,99€</h3>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/platos/spicy-beef-ramen.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Spicy beef ramen</h5>
                    <p class="card-text">Hearty, rich, and spicy. A broth that takes your tastebuds on a trip across the world. Brimming with notes of Sichuan peppercorns, anise, and fennel.</p>
                    <hr style="border-top: 1px solid white;">
                    <h3 class="text-align-right">6,50€</h3>
                </div>
            </div>
        </div>
        <div class="seccion-carta"> <!--DESSERTS-->
            <h1 class="text-uppercase">Desserts</h1>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/platos/helado.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Ice cream ball</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt dicta atque maxime ipsa, consequuntur provident quis, consequatur aliquid totam.</p>
                    <hr style="border-top: 1px solid white;">
                    <h3 class="text-align-right">2,90€</h3>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/platos/Mochis.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">MOCHIS 3 units</h5>
                    <p class="card-text">Steamed filled dumplings made with sticky rice, called mochigome, which is particularly sweet.</p>
                    <hr style="border-top: 1px solid white;">
                    <h3 class="text-align-right">7,99€</h3>
                </div>
            </div>
        </div>
        <div class="seccion-carta"> <!--BEVERAGES-->
            <h1 class="text-uppercase">Beverage</h1>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/platos/sake.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Sake frío</h5>
                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus labore tempore asperiores provident, ipsam maxime! Odit aut doloribus eos explicabo consequatur eius.</p>
                    <hr style="border-top: 1px solid white;">
                    <h3 class="text-align-right">6,50€</h3>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/platos/kirin.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Kirin</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias ullam quaerat non ea autem molestiae officia. Exercitationem, illum?</p>
                    <hr style="border-top: 1px solid white;">
                    <h3 class="text-align-right">3,50€</h3>
                </div>
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