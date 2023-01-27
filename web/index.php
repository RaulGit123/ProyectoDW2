<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
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
                        
                        if (session_status()===PHP_SESSION_NONE){
                            session_start();
                        }
                        if (!empty($_SESSION["NombreUsuario"])){
                           ?>  
                            <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li> <!--FALTA PONER HREF CON RESTO DE PÁGINAS, NO #x-->
                            <li class="nav-item"><a class="nav-link" href="pedidos.php">Order Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="reservas.php">Book Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="../vista/paginaUsuario.php"><?php echo"Bienvenido ".$_SESSION["NombreUsuario"];?></a></li><?php
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
            <div class="masthead-subheading font-italic">El mejor restaurante japonés de València</div>
            <div class="mt-3 mx-1 masthead-heading text-uppercase">Bienvenido a Nigiri</div>
            <a class="mt-5 p-4 px-5 btn btn-danger btn-xl text-uppercase" href="#aboutus">Ver carta</a> <!--AQUÍ TAMBIÉN!! ir a our menu-->
        </div>
    </header>
    <section class="p-5 page-section" id="aboutus"> <!--id services-->
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">SOBRE NOSOTROS</h2>
                <h3 class="section-subheading mx-auto">Nigiri nace por el amor a la comida japonesa y a su diversidad. Nuestra filosofía mantiene la esencia de la cocina tradicional aportando un toque de creatividad y de innovación, con un firme compromiso con la calidad del producto. Sabores y texturas japonesas cuidadosamente fusionadas para satisfacer los paladares más exigentes.</h3>
            </div>
        </div>
    </section>
    <section class="p-5 page-section bg-dark" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nuestro ramen</h2>
                <h3 class="section-subheading mx-auto pb-4">El Ramen es un plato japonés tradicional de sopa de fideos, y nuestra especialidad. El secreto del ramen Nigiri es nuestro caldo.</h3>
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
    <script src="comun.js"></script>
</body>
</html>