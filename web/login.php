<?php


$NombreUsuario = $Contraseña  = "";
$username_err = $password_err  = "";


if(empty(trim($NombreUsuario))){
    $username_err = "Please, enter your username.";
}
if(empty(trim($Contraseña))){
    $password_err = "Please, enter your password.";
}
?>


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
    <link rel="stylesheet" href="../web/styles/login.css">
    <link rel="shortcut icon" href="../web/img/logo2.png" type="image/x-icon">

</head>


<body id="page-top">

<!-- navigator -->
<nav class="stroke navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

        <div class="container">
            <a class="navbar-brand" href=".."><!-- href . lleva a web/index.php --><img src="../web/img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../web/menu.php">Our Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="../web/principal.php">Order Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="../web/principal.php">Book Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="../web/register.php">Register</a></li>
                 
                </ul>
            </div>
        </div>
    </nav>

    
<!-- navigator -->

<div id="griddy">
<div class="container caja1">
<br>  
<hr>





<div class="card bg-dar p-5">

<article class="card-body mx-auto articulo" id="bg-article">
	<h4 class="card-title mt-3 text-center text-uppercase">Login</h4>



    <form action="../controlador/CtrlLogin.php" method="POST" >

        

    <!-- form group -->
 
            
      
            <div class="form-group input-group ">

            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-user"></i> </span>

            </div>
         
       
            <input type="text" name="NombreUsuario" class="form-control" placeholder="Enter Username" value="<?php echo $NombreUsuario; ?>">
               
            <!-- <span class="invalid-feedback"><?php echo $username_err; ?></span> -->
            </div>



            	<!-- form-group// -->

                <div class="form-group input-group">

            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>

            </div>


            <input type="password" class="form-control" name="Contraseña" id="Contraseña"placeholder="Enter Password"value="<?php echo $Contraseña; ?>">
            <!-- <span class="invalid-feedback"><?php echo $password_err; ?></span> -->
            </div>


            <!-- form-group// -->



  



        


            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Log in">
                <input type="reset" class="btn btn-warning btn-block" value="Clear">
            </div>
            <div class="form-group ">
            <p class="text-center " style="color:white;">Do not you have an account yet? <a href="../web/register.php" class="btn btn-danger" >REGISTER</a> </p>
            
             
           
            <p class="text-center " style="color:white;">Didn't you validate the account? <a href="../web/verificar.php" class="btn btn-danger" >VERIFY</a> </p>
         
          
            <p class="text-center " style="color:white;">Forgot password? <a href="../web/form_veripass.php" class="btn btn-danger" >RECOVER</a> </p>
            </div>     
            
        </form>
        </article>
        </div>    
        </div>
</div>
           

    
    <script src="scripts/comun.js"></script>
    </body>

    



</html>