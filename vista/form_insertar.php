
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
    <title>Welcome | Nigiri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../web/styles/pag_principal.css">
    <link rel="shortcut icon" href="../web/img/logo2.png" type="image/x-icon">
</head>
<body id="page-top">
    <nav class="stroke navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><img src="../web/img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars my-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0">
                   

                   <?php
              
               if (!empty($_SESSION["NombreUsuario"])){
               ?>  
                <li class="nav-item"><a class="nav-link" href="../web/menu.php">Our Menu</a></li> <!--FALTA PONER HREF CON RESTO DE PÁGINAS, NO #x-->
                <li class="nav-item"><a class="nav-link" href="../web/pedidos.php">Order Now</a></li>
                <li class="nav-item"><a class="nav-link" href="../web/reservas.php">Book Now</a></li>
                <li class="nav-item"><a class="nav-link activo"><?php echo"Welcome ".$_SESSION["NombreUsuario"];?></a></li>
            <?php }?>
                           
           </ul>
                
            </div>
        </div>
    </nav>
    <div id="griddy">
    <header class="masthead">
       
        <div class="mt-3 masthead-heading text-uppercase"><?php echo"Welcome to Nigiri, ".$_SESSION["NombreUsuario"];?></div>
            <div class="masthead-subheading font-italic">Register a new dish.</div>

            <div class="card bg-dar" >
    <article class="card-body mx-auto articulo" id="bg-article">   
        <form action="../modelo/insertar.php" method="post">

    <!--form-groud-->
          
    <div class="form-group input-group ">

    <div class="input-group-prepend">

    <span class="input-group-text"> <i class="fa fa-user"></i> </span>

    </div>


    <input type="text" name="Nombre" class="form-control" placeholder="Name">
   
    </div>

    <!--form-groud-->   
     <!--form-groud-->
          
     <div class="form-group input-group ">

    <div class="input-group-prepend">

    <span class="input-group-text"> <i class="fa-solid fa-pen-to-square"></i> </span>

    </div>


    <input type="text" name="Descripcion" class="form-control" placeholder="Description">

    </div>
     <!--form-groud--> 
     <!--form-groud-->
          
     <div class="form-group input-group ">

    <div class="input-group-prepend">

    <span class="input-group-text"> <i class="fa-solid fa-fish"></i> </span>

    </div>


    <input type="text" name="Ingredientes" class="form-control" placeholder="Ingredients">

    </div>
 <!--form-groud-->    
 <!--form-groud-->
          
    <div class="form-group input-group ">

    <div class="input-group-prepend">

    <span class="input-group-text"> <i class="fa-solid fa-sack-dollar"></i> </span>

    </div>


    <input type="text" name="Precio" class="form-control" placeholder="Price">

    </div>
 <!--form-groud-->     
 <!--form-groud-->
          
    <div class="form-group input-group ">

    <div class="input-group-prepend">

    <span class="input-group-text"> <i class="fa-solid fa-images"></i> </span>

    </div>


    <input type="text" name="Imagen" class="form-control" placeholder="Image">

    </div>
<!--form-groud-->
 <!--form-groud-->
          
    <div class="form-group input-group ">

    <div class="input-group-prepend">

    <span class="input-group-text"> <i class="fa-solid fa-bars-staggered"></i> </span>

    </div>


    <input type="text" name="tipo" class="form-control" placeholder="Kind of food">

    </div>
<!--form-groud-->                            

       <div class="form-group ">
        <input type="submit" class="btn btn-primary btn-block btn-lg text-uppercase" value="Insert a new dish">
        <input type="reset" class="btn btn-primary btn-block btn-lg text-uppercase" value="Clear form">
        </div>
        <a class="mt-5 mr-2 p-4 px-3 btn btn-success btn-lg text-uppercase" href="admin.php">Back to admin</a>
        </form>
  
 <div class="font-italic masthead-subheading mt-5" id="kanji">礼</div>
        </div>
    </header>
    </article>


    <section class="p-5 page-section" id="aboutus"> <!--id services-->
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Admin control</h2>
                <h3 class="section-subheading mx-auto">Administrator control panel, the elements will be modified in real time, handle with care.</h3>
            </div>
        </div>
    </section>
    </div>
    <script src="../web/comun.js"></script>
</body>
</html>
