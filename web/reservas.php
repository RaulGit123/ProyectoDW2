<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now | Nigiri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/book.css">
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
                        if (session_status()===PHP_SESSION_NONE){
                            session_start();
                        }
                        if (!empty($_SESSION["NombreUsuario"])){
                           ?>  
                            <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li>
                            <li class="nav-item"><a class="nav-link" href="pedidos.php">Order Now</a></li>
                            <li class="nav-item"><a class="nav-link activo">Book Now</a></li>
                            <?php
                            if($_SESSION["NombreUsuario"]=="admin"){
                                ?><li class="nav-item"><a class="nav-link" href="admin.php"><?php echo"Welcome ".$_SESSION["NombreUsuario"];?></a></li><?php      
                            } 
                            ?>
                            <?php
                            if($_SESSION["NombreUsuario"]!="admin"){
                            ?> <li class="nav-item"><a class="nav-link" href="paginaUsuario.php"><?php echo"Welcome ".$_SESSION["NombreUsuario"];?></a></li><?php
                            }
                        }else {
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
    <div id="griddy">
   
        <header class="masthead">
        <div class="px-0 container">
            <div class="masthead-subheading font-italic">Book a table and enjoy your favorite Japanese food </div>
            <br>
            <br>
        </div>
        </header>
        <section class="card bg-dar">
        <!-- Cuanta gente va a acudir  -->
        <div class="card-body mx-auto articulo" id="bg-article"> 
        <h4 class="card-title mt-3 text-center text-uppercase booking">Booking</h4>
        <p class="text-center text-uppercase people">People</p>
     <div class="peopleselected ">
     <button class="btoMa" name="button">+</button>
     <div class="cantidad text-center">0</div>
     <button class="btoMe" name="button">-</button>
    </div>
    <div class="mt-2 d-none font-italic mal" id="resp">You cannot make a reservation for less than 2 people</div>
                </div>
            <!-- La fecha en la cual quieren reservar -->
            <div class="card-body mx-auto articulo" id="bg-article">
            <p class="text-center text-uppercase people">Date</p>
     <div class="dateselected ">
     <input type="date"class="text-center fecha" id="fechita" size="20"/>
    </div>
    <div class="mt-2 d-none font-italic mal" id="respf">You have to select a correct date</div>
            </div>
            <!-- La hora a la que quieren reservar -->
            <div class="card-body mx-auto articulo" id="bg-article">
            <p class="text-center text-uppercase people">Hours available</p>
     <div class="hourselected grid">
     <button class="item text-center">
             <div class="horas">13:30 15:00</div>          
                    </button>
     <button class="item text-center">
             <div class="horas">15:00 16:30</div>        
     </button>
     <button class="item text-center">
             <div class="horas">16:30 18:00</div>       
     </button>
     <button class="item text-center">
             <div class="horas">18:00 19:30</div>         
     </button>
     <button class="item text-center">
             <div class="horas">19:30 21:00</div>          
     </button>
     <button class="item text-center">
             <div class="horas">21:00 22:30</div>          
     </button>
    </div>
    <div class="mt-2 d-none font-italic mal" id="resph">You have to select a time</div>
            </div>
    </section>
    <div class="contenedor" id="contenedor">
  <button class="centrado masthead-subheading font-italic btn-danger">Finalize Booking</button>
</div>
<p class="respuesta mal d-none mb-4" id="respt">Todas las mesas en ese dia y hora estan ocupadas</p> 
</div>
    <script src="scripts/comun.js"></script>
    <script src="scripts/reservas.js"></script>
</body>
</html>