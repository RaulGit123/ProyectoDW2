<?php
// Include config file
require_once "../config/config.php";
 
// Define variables and initialize with empty values
$NombreUsuario = $Contraseña = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$mail =$mail_err="";
$nombre= $name_err="";
$apellidos=$apellidos_err="";
$direccion=$direccion_err="";
$localidad=$localidad_err="";
$listaProvincias=[];



// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate NombreUsuario
    if(empty(trim($_POST["NombreUsuario"]))){
        $username_err = "Por favor ingrese un usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT IdUsuarios FROM Usuarios WHERE NombreUsuario = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["NombreUsuario"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este usuario ya existe.";
                } else{
                    $NombreUsuario = trim($_POST["NombreUsuario"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }


    //validamos correo

    if(empty(trim($_POST["email"]))){
        $mail_err ="Por favor introduzca un correo.";
} else{
    $mail = trim($_POST["email"]);
}
    
    // Validate Contraseña
    if(empty(trim($_POST["Contraseña"]))){
        $password_err = "Por favor ingresa una contraseña.";     
    } elseif(strlen(trim($_POST["Contraseña"])) < 6){
        $password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $Contraseña = trim($_POST["Contraseña"]);
    }
    
    // Validate confirm Contraseña
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($Contraseña != $confirm_password)){
            $confirm_password_err = "No coincide la contraseña.";
        }
    }

    //recogemos datos personales

    if(empty(trim($_POST["Nombre"]))){
        $name_err="porfavor , introduzca su nombre.";
    }else{
        $nombre = trim($_POST["Nombre"]);
    }

    if(empty(trim($_POST["apellidos"]))){
        $apellidos_err="porfavor , introduzca sus apellidos.";
    }else{
        $apellidos = trim($_POST["apellidos"]);
    }

    if(empty(trim($_POST["direccion"]))){
        $direccion_err="porfavor , introduzca una dirección.";
    }else{
        $direccion = trim($_POST["direccion"]);
    }

 

$listaProvincias = trim($_POST["provincia"]);



    // Check input errors before inserting in database

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&& empty($mail_err) && empty($name_err)&& empty($apellidos_err)&& empty($direccion_err)&& empty($localidad_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO Usuarios (NombreUsuario,Nombre,Apellidos,Contraseña,CorreoElectronico,Direccion,Provincia) VALUES (?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_username,$param_name,$param_apellidos,$param_password,$param_mail,$param_direccion,$param_provincia);
            
            // Set parameters
            $param_username = $NombreUsuario;
            $param_password = md5($Contraseña); // Creates a Contraseña hash
            $param_name = $nombre;
            $param_apellidos = $apellidos;
            $param_direccion = $direccion;
            $param_provincia = $listaProvincias;
            $param_mail =$mail;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../hugo.php");
            } else{
                echo "Algo salió mal, por favor inténtalo de nuevo.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../web/styles/login.css">
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../web/styles/style.css">


</head>


<body id="page-top">

<!-- navigator -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="../web/img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="menu.html">Our Menu</a></li> <!--FALTA PONER HREF CON RESTO DE PÁGINAS, NO #x-->
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Order Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Book Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="../hugo.php">Log in</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> -->
                </ul>
            </div>
        </div>
    </nav>

    <br><br> <br><br>
<!-- navigator -->

<div class="container">
<br>  
<!-- <p class="text-center" style="color:white;">Logo</p> -->
<hr>





<div class="card bg-dar" >

<article class="card-body mx-auto articulo" id="bg-article">
	<h4 class="card-title mt-3 text-center text-uppercase" style="color:white; max-width: 400px; font-family: Montserrat;" >Crear cuenta</h4>
	<!-- <p class="text-center text-uppercase " style="color:white;">Disfruta de tu pedido en casa.</p> -->


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <h4 class="card-title mt-3 text-center text-uppercase " style="color:white; max-width: 400px; font-family: Montserrat;" >Datos de usuario</h4>

            <div class="form-group input-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
			
            </div>

                <input type="text" name="NombreUsuario" class="form-control is-invalid" placeholder="Nombre usuario" value="<?php echo $NombreUsuario; ?>">
               
                <span class="invalid-feedback"><?php echo $username_err; ?></span>

            </div>    

	<!-- form-group// -->

            <div class="form-group  input-group<?php echo (!empty($mail_err)) ? 'has-error' : ''; ?>">
               
            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>

            </div>

                <input type="email" name="email" class="form-control  is-invalid" placeholder="E-mail" value="<?php echo $mail; ?>">
             
                <span class="invalid-feedback"><?php echo $mail_err; ?></span>

            </div>   

            	<!-- form-group// -->


            
            	


                <div class="form-group input-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                <div class="input-group-prepend">

                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>

                </div>


             <input type="password" name="Contraseña" class="form-control  is-invalid" placeholder="contraseña" value="<?php echo $Contraseña; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>

            <!-- form-group// -->





            <div class="form-group input-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">

            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>

            </div>

                <input type="password" name="confirm_password" class="form-control  is-invalid" placeholder="Repetir contraseña" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>

            

            	<!-- form-group// -->

                <h4 class="card-title mt-3 text-center text-uppercase titulo" style="color:white; max-width: 400px; font-family: Montserrat;" >Datos personales</h4>

            <div class="form-group input-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                
            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-user"></i> </span>

            </div>

                <input type="text" name="Nombre" class="form-control  is-invalid"  placeholder="Nombre" value="<?php echo $nombre; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>    

            	<!-- form-group// -->

            <div class="form-group input-group <?php echo (!empty($apellidos_err)) ? 'has-error' : ''; ?>">
                
            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-user"></i> </span>

            </div>

                <input type="text" name="apellidos" class="form-control  is-invalid" placeholder="Apellidos" value="<?php echo $apellidos; ?>">
                <span class="invalid-feedback"><?php echo $apellidos_err; ?></span>
            </div>   

            	<!-- form-group// -->

            <div class="form-group input-group <?php echo (!empty($direccion_err)) ? 'has-error' : ''; ?>">
                
            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-address-card "></i> </span>

            </div>

                <input type="text" name="direccion" class="form-control  is-invalid"  placeholder="Dirección" value="<?php echo $direccion; ?>">
                <span class="invalid-feedback"><?php echo $direccion_err; ?></span>
            </div>    



        	<!-- form-group// -->

            <div class="form-group input-group">
                
            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-address-card"></i> </span>

            </div>

                <select  class="form-control" name="provincia">
                <option selected="">Provincia</option>

                <?php 
                $listaProvincias = ['Alava', 'Albacete', 'Alicante', 'Almería', 'Asturias' ,'Avila', 'Badajoz', 'Barcelona', 'Burgos', 'Cáceres', 'Guipúzcoa', 'Huelva', 'Huesca', 'Islas Baleares', 'Jaén', 'León', 'Lérida', 'Lugo', 'Madrid', 'Málaga', 'Murcia', 'Navarra', 'Orense', 'Palencia', 'Las Palmas', 'Pontevedra', 'La Rioja', 'Salamanca', 'Segovia', 'Sevilla', 'Soria', 'Tarragona', 'Santa Cruz de Tenerife', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Vizcaya', 'Zamora', 'Zaragoza'];

                echo count($listaProvincias);
                for ($i=0; $i < count($listaProvincias); $i++) { 
                    echo "<option value=\"".$listaProvincias[$i]."\"";

                    echo ">".$listaProvincias[$i];
                }
                ?>

                </select>

            </div>


            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Ingresar">
                <input type="reset" class="btn btn-warning btn-block" value="Borrar">
            </div>
            <p class="text-center" style="color:white;">Ya tienes una cuenta? <a href="../hugo.php">Iniciar sesión</a> </p>   
        </form>
            </article>
        </div>    
            </div>

            <br><br>

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
    </footer>
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