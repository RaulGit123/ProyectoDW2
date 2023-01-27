<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="web/styles/login.css">
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="web/styles/style.css">
    <link rel="shortcut icon" href="web/img/logo2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>


<body id="page-top">

<!-- navigator -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

        <div class="container">
            <a class="navbar-brand" href="../index.php"><img src="web/img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="./web/menu.php">Our Menu</a></li> <!--FALTA PONER HREF CON RESTO DE PÁGINAS, NO #x-->
                    <li class="nav-item"><a class="nav-link" href="./vista/principal.php">Order Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="./vista/principal.php">Book Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="./vista/register.php">Register</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> -->
                </ul>
            </div>
        </div>
    </nav>

    <br><br> <br><br>     <br><br>
<!-- navigator -->


<div class="container">
<br>  
<!-- <p class="text-center" style="color:white;">Logo</p> -->
<hr>





<div class="card bg-dar" >

<article class="card-body mx-auto articulo" id="bg-article">
	<h4 class="card-title mt-3 text-center text-uppercase" style="color:white; max-width: 400px; font-family: Montserrat;" >Crear cuenta</h4>
	<!-- <p class="text-center text-uppercase " style="color:white;">Disfruta de tu pedido en casa.</p> -->


    <form action="./controlador/CtrlLogin.php" method="POST" class="needs-validation" novalidate>

        

    <!-- form group -->
 
            
      
            <div class="form-group input-group ">

            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-user"></i> </span>

            </div>
            <input type="text"  class="form-control" name="NombreUsuario" id="NombreUsuario" required placeholder="Nombre de Usuario"autofocus >
            <div class="invalid-feedback">
            Porfavor elige un nombre de usuario.
            </div>
            </div>



            	<!-- form-group// -->

                <div class="form-group input-group">

            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>

            </div>


            <input type="password" class="form-control" name="Contraseña" id="Contraseña"placeholder="Contraseña">
</div>


            <!-- form-group// -->



  



        


            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Ingresar">
                <input type="reset" class="btn btn-warning btn-block" value="Borrar">
            </div>
            <p class="text-center" style="color:white;">Aún no tienes una cuenta? <a href="./vista/register.php" class="btn btn-danger" >REGISTRATE!</a> </p>   
        </form>
        </article>
        </div>    
        </div>

            <br><br>     <br><br>     <br><br>     <br><br>     <br><br>

    
    <script src="web/comun.js"></script>
    <script src="validate-forms.js"></script>
    </body>

    



</html>