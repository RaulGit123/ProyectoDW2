<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Registro</title>
    <!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" /> -->
	<link rel="stylesheet" href="../web/styles/login.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"> -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="../web/styles/book.css">
</head>
<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="../web/img/logo2.png" alt="logo" /></a>
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
                            <li class="nav-item"><a class="nav-link" href="#page-top">Book Now</a></li>
                            <li class="nav-item"><a class="nav-link" href="../controlador/CtrlSalir.php"><?php echo"Bienvenido ".$_SESSION["NombreUsuario"];?></a></li><?php
                        }
                        ?>
                            
                            </ul>
            </div>
        </div>
    </nav> 
   
    <header class="masthead">
        <div class="px-0 container">
            <div class="masthead-subheading font-italic">Book a table and enjoy your favorite Japanese food </div>
            <br>
            <br>
            <!-- <div class="mt-3 masthead-heading text-uppercase">Booking</div> -->
        </div>
    </header>
    <div class="card bg-dar" >
<!-- Cuanta gente va a acudir  -->
<article class="card-body mx-auto articulo" id="bg-article">
	<h4 class="card-title mt-3 text-center text-uppercase">Booking</h4>
	 <p class="text-center text-uppercase people">People</p>
     <div class="peopleselected ">
     <button class="btoMa" name="button">+</button>
     <div class="cantidad text-center">0</div>
     <button class="btoMe" name="button">-</button>
    </div>
        </article>
<!-- La fecha en la cual van a acudir -->
        <article class="card-body mx-auto articulo" id="bg-article">
	 <p class="text-center text-uppercase people">Date</p>
     <div class="dateselected ">
     <input type="date"class="text-center fecha" size="20"/>
    </div>
        </article>
<!-- La hora a la que quieren acudir(y puedan) -->
        <article class="card-body mx-auto articulo" id="bg-article">
	 <p class="text-center text-uppercase people">Hours available</p>
     <div class="hourselected grid">
     <button class="item text-center">
             <div class="horas">13:30</div>
             <div class="horas">15:00</div>           
                    </button>
     <button class="item text-center">
             <div class="horas">15:00</div>
             <div class="horas">16:30</div>           
     </button>
     <button class="item text-center">
             <div class="horas">16:30</div>
             <div class="horas">18:00</div>           
     </button>
     <button class="item text-center">
             <div class="horas">18:00</div>
             <div class="horas">19:30</div>           
     </button>
     <button class="item text-center">
             <div class="horas">19:30</div>
             <div class="horas">21:00</div>           
     </button>
     <button class="item text-center">
             <div class="horas">21:00</div>
             <div class="horas">22:30</div>           
     </button>
    </div>
        </article>

        </div> 
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
        </div>
    </footer>
    <script src="reservas.js"></script>
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
                            
                            
                        
                       
                        <!-- href="../controlador/CtrlSalir.php"> referenciará a finalizar la sesión -->
     