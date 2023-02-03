<?php
  if (session_status()===PHP_SESSION_NONE){
	session_start();
} 

$borrar=""
?>
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
                <li class="nav-item"><a class="nav-link activo"><?php echo"Bienvenido ".$_SESSION["NombreUsuario"];?></a></li>
            <?php }?>
                           
           </ul>
                
            </div>
        </div>
    </nav>
    <div id="griddy">
    <header class="masthead">
       
        <div class="mt-3 masthead-heading text-uppercase"><?php echo"Bienvenido a nigiri, ".$_SESSION["NombreUsuario"];?></div>
            <div class="masthead-subheading font-italic">Registro de productos.</div>

            <div class="card bg-dar" >
    <article class="card-body mx-auto articulo" id="bg-article">  

<form action="../modelo/borrar.php" method="get" >

        

    <!-- form group -->
 
            
      
            <div class="form-group input-group ">

            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa-solid fa-apple-whole"></i> </span>

            </div>
         
       
            <input type="text" id="IdComida" name="IdComida" class="form-control" placeholder="IdComida">
               
          
            </div>


            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block text-uppercase" value="Eliminar">
                <input type="reset" class="btn btn-primary btn-lg btn-block text-uppercase" value="Reiniciar">
                
            </div>
            <a class="mt-5 mr-2 p-4 px-3 btn btn-success btn-lg text-uppercase" href="admin.php">Volver a administración</a>
        </form>
              
               <div class="font-italic masthead-subheading mt-5" id="kanji">礼</div>
        </div>
    </header>
    </article>
               


    <section class="p-5 page-section" id="aboutus"> <!--id services-->
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Reservas y pedidos</h2>
                <h3 class="section-subheading mx-auto">Para efectuar una reserva o un pedido necesita registrarse en la web para asegurarnos de que no eres un robot.</h3>
            </div>
        </div>
    </section>
    </div>
    
    <script src="../web/comun.js"></script>
</body>
</html>