<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nigiri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body id="page-top">
    <nav class="stroke navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="activo navbar-brand"><img src="img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0">


                    <?php

                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
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
                                                                                                                                                            ?>
                        <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="principal.php">Order Now</a></li>
                        <li class="nav-item"><a class="nav-link" href="principal.php">Book Now</a></li>
                        <li class="nav-item"><a class="nav-link" href="../modelo/sesion.php">Log in</a></li><?php
                                                                                                                                                    }
                                                                                                            ?>
                    <!-- href="../controlador/CtrlSalir.php"> referenciar?? a finalizar la sesi??n -->
                </ul>
            </div>
        </div>
    </nav>
    <div id="griddy">
        <!--header-->
        <header class="masthead">
            <div class="px-0 container">
                <div class="masthead-subheading font-italic">The best Japanese restaurant in Valencia</div>
                <div class="mt-3 mx-1 masthead-heading text-uppercase">Welcome to Nigiri</div>
                <a class="mt-5 p-4 px-5 btn btn-danger btn-xl text-uppercase" href="menu.php">Menu</a>
            </div>
        </header>
        <!--header-->
        <!--section-->
        <section class="p-5 page-section" id="aboutus">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">ABOUT US</h2>
                    <h3 class="section-subheading mx-auto">Nigiri was born out of love for Japanese food and its diversity. Our philosophy maintains the essence of traditional cuisine, providing a touch of creativity and innovation, with a firm commitment to product quality. Japanese flavors and textures carefully fused to satisfy the most demanding palates.</h3>
                </div>
            </div>
        </section>
        <!--section-->
        <section class="p-5 page-section bg-dark" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our ramen</h2>
                    <h3 class="section-subheading mx-auto pb-4">Ramen is a traditional Japanese noodle soup dish, and our specialty. The secret of Nigiri ramen is our broth.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/platos/black-garlic-chicken-ramen.png" alt="..." />
                            <h4>Black Garlic "Chicken" Ramen</h4>
                            <p class="text-muted">Classic, savory, and comforting. The perfect cozy companion for an evening at home. Overflowing with notes of garlic, scallions, and umami.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/platos/paitan-chicken-ramen.png" alt="..." />
                            <h4>Paitan Chicken Ramen</h4>
                            <p class="text-muted px-3">The taste that started it all, the Paitan Chicken Ramen is topped with your choice of char-grilled chicken or pork chashu, bamboo shoots (menma), molten lava egg (ajitsuke tamago), green vegetables and spring onions.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/platos/spicy-beef-ramen.png" alt="..." />
                            <h4>Spicy "Beef" Ramen</h4>
                            <p class="text-muted">Hearty, rich, and spicy. A broth that takes your tastebuds on a trip across the world. Brimming with notes of Sichuan peppercorns, anise, and fennel.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section-->
    </div>
    <script src="scripts/comun.js"></script> <!--carga de footer-->
</body>

</html>