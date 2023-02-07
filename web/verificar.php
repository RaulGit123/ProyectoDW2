
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Nigiri</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/login.css">
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">

</head>



        

    <!-- form group -->

 
        <body id="page-top">


    <nav class="stroke navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

        <div class="container">
            <a class="navbar-brand" href="../index.php"><!-- href . lleva a web/index.php --><img src="../web/img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../web/menu.php">Our Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="./principal.php">Order Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="./principal.php">Book Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="./register.php">Register</a></li>
                 
                </ul>
            </div>
        </div>
    </nav>
    


<div id="griddy">
<div class="container caja1">
<br>  


<hr>





<div class="card bg-dar p-5">

<article class="card-body mx-auto articulo" id="bg-article">
	<h4 class="card-title mt-3 text-center text-uppercase">Verificar cuenta</h4>
	<!-- <p class="text-center text-uppercase " style="color:white;">Disfruta de tu pedido en casa.</p> -->


    <form action="../modelo/verificado.php" method="post">

        

    <!-- form group -->
 
            
      
            <div class="form-group input-group ">

            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa-solid fa-apple-whole"></i> </span>

            </div>
         
       
            <input type="text" name="codigo" id="codigo" class="form-control " placeholder="Introduzca su código" >
               
            </div>



            	<!-- form-group// -->




        


            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Ingresar código">
                <input type="reset" class="btn btn-warning btn-block" value="Borrar código">
            </div>
            <p class="text-center" style="color:white;">¿Aún no tienes una cuenta? <a href="register.php" class="btn btn-danger" >REGÍSTRATE</a> </p>   
        </form>
        </article>
        </div>    
        </div>
</div>
           

    
    <script src="scripts/comun.js"></script>
    </body>

    
</html>