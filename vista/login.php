<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in | Nigiri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="web/styles/menu.css">
    <link rel="stylesheet" href="web/styles/pag_principal.css">
    <link rel="stylesheet" href="web/styles/login.css">
    <link rel="shortcut icon" href="web/img/logo2.png" type="image/x-icon">

</head>


<body id="page-top">

<!-- navigator -->
<nav class="stroke navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

        <div class="container">
            <a class="navbar-brand" href="."><!-- href . lleva a web/index.php --><img src="web/img/logo2.png" alt="logo" /></a>
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

    
<!-- navigator -->


<div class="container caja1">
<br>  
<!-- <p class="text-center" style="color:white;">Logo</p> -->
<hr>





<div class="card bg-dar" >

<article class="card-body mx-auto articulo" id="bg-article">
	<h4 class="card-title mt-3 text-center text-uppercase" style="color:white; max-width: 400px; font-family: Montserrat;" >Iniciar sesión</h4>
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
            <p class="text-center" style="color:white;">¿Aún no tienes una cuenta? <a href="./vista/register.php" class="btn btn-danger" >REGÍSTRATE</a> </p>   
        </form>
        </article>
        </div>    
        </div>

           

    
    <script src="web/comun.js"></script>
    <script src="validate-forms.js"></script>
    </body>

    



</html>