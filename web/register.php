<?php
// Include config file
include("../config/config.php");
 
// Define variables and initialize with empty values
$NombreUsuario = $Contraseña = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$mail =$mail_err="";
$nombre= $name_err="";
$apellidos=$apellidos_err="";
$direccion=$direccion_err="";
$localidad=$localidad_err="";
$listaProvincias=[];
$codigo= md5( rand(0,1000) );;



// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate NombreUsuario
    if(empty(trim($_POST["NombreUsuario"]))){
        $username_err = "Please enter your Username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT IdUsuarios FROM Usuarios WHERE NombreUsuario = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["NombreUsuario"]);
            if( preg_match("/^[A-Za-zÑñ]+[\s]+[A-Za-zÑñ]+/",$param_username)){
                $username_err = "Username error.";
            } else{
                $NombreUsuario = trim($_POST["NombreUsuario"]);
            }
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "this user already exists.";
                } else{
                    $NombreUsuario = trim($_POST["NombreUsuario"]);
                }
                
          


            } else{
                echo "oops. It seems something went wrong.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }


    //validamos correo

    if(empty(trim($_POST["email"]))){
        $mail_err ="Please , enter your valid e-mail.";
} else{
    // Prepare a select statement
    $sql = "SELECT IdUsuarios FROM Usuarios WHERE CorreoElectronico = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $mail);
        
        // Set parameters
        $mail = trim($_POST["email"]);
        if( preg_match("/^[A-Za-zÑñ]+[\s]+[A-Za-zÑñ]+/",$mail)){
            $mail_err = "email error.";
        } else{
            $mail = trim($_POST["email"]);
        }
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                $mail_err = "Mail exist.";
            } else{
                $mail = trim($_POST["email"]);
            }
            
      


        } else{
            echo "oops. It seems something went wrong.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
    
    // Validamos Contraseña
    if(empty(trim($_POST["Contraseña"]))){
        $password_err = "Please , enter your password.";     
    } elseif(strlen(trim($_POST["Contraseña"])) < 6){
        $password_err = "The password must have at least 6 characters.";
    } elseif(!preg_match("/[a-zA-Z0-9\*\_\-\$&\/\\+]/",trim($_POST["Contraseña"]))){
        $password_err = "Please, enter a valid password.";
    }else{
        $Contraseña = trim($_POST["Contraseña"]);
    }
    
    // Validamos confirm Contraseña
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirm your password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($Contraseña != $confirm_password)){
            $confirm_password_err = "Password does not match.";
        }
    }

    //recogemos datos personales

    if(empty(trim($_POST["Nombre"]))){
        $name_err="Please, enter your name.";
    }elseif(!preg_match("/^[A-Za-zÑñ]+$/",trim($_POST["Nombre"]))&& !strlen(trim($_POST["Nombre"]))<=30){
        $name_err="Please, enter a valid name.";
    }else{
        $nombre = trim($_POST["Nombre"]);
    }
    //validamos apellidos
    if(empty(trim($_POST["apellidos"]))){
        $apellidos_err="Please , enter your last names.";
    }elseif(!preg_match("/^[A-Za-zÑñ ]+$/",trim($_POST["apellidos"]))&& strlen(trim($_POST["apellidos"]))<=50) {
        $apellidos_err="Please, enter a valid last name.";
    }else{
        $apellidos = trim($_POST["apellidos"]);
    }
    //validamos direccion
    if(empty(trim($_POST["direccion"]))){
        $direccion_err="Please, enter your address.";
    }elseif(preg_match("/^[A-Za-zÑñ]+$/",trim($_POST["direccion"]))&& strlen(trim($_POST["direccion"]))<=50){
        $direccion_err="Please, enter a valid address.";
    }else{
        $direccion = trim($_POST["direccion"]);
    }

 

$listaProvincias = trim($_POST["provincia"]);



    // Checkeamos errores antes de enviarlo

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&& empty($mail_err) && empty($name_err)&& empty($apellidos_err)&& empty($direccion_err)&& empty($localidad_err)){
        
        // preparado para insertar consulta los valores serán anonimos
        $sql = "INSERT INTO Usuarios (NombreUsuario,Nombre,Apellidos,Contraseña,CorreoElectronico,Direccion,Provincia,Rol,Activado,Codigo) VALUES (?,?,?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // bindeamos los parametros de la consulta. el string  "sssssssiss" hace referencia a las values anonimas y su tipo (string,int)
            mysqli_stmt_bind_param($stmt, "sssssssiss", $param_username,$param_name,$param_apellidos,$param_password,$param_mail,$param_direccion,$param_provincia,$rol,$Activado,$Codigo);
            
            // Set parameters
            $param_username = $NombreUsuario;
            $param_password = md5($Contraseña); // Creamos la contraseña encriptada.
            $param_name = $nombre;
            $param_apellidos = $apellidos;
            $param_direccion = $direccion;
            $param_provincia = $listaProvincias;
            $param_mail =$mail;
            $rol = 2;  //determinará el rol del usuario por defecto
            $Activado = "no";
            $Codigo = rand(1000,9999);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                include_once("../Recursos/mailer.php");
            } else{
                echo "oops. It seems something went wrong.";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Nigiri</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/login.css">
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">

</head>


<body id="page-top">

<!-- navigator -->
<nav class="stroke navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

        <div class="container">
            <a class="navbar-brand" href="../index.php"><img src="img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> 
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li> 
                    <li class="nav-item"><a class="nav-link" href="principal.php">Order Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="principal.php">Book Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="../modelo/sesion.php">Log in</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <br><br> <br><br>
<!-- navigator -->
<div id="griddy">
<div class="container">
<br>  

<hr>





<div class="card bg-dar bg-dark cajat" >

<article class="card-body mx-auto articulo" id="bg-article">
	<h4 class="card-title mt-3 text-center text-uppercase" style="color:white; max-width: 400px; font-family: Montserrat;" >Create Account</h4>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <h5 class="card-title mt-3 text-center text-uppercase " style="color:white; max-width: 400px; font-family: Montserrat;" >User Info</h5>

    <!-- form group -->
            <div class="form-group input-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
			
            </div>

                <input type="text" name="NombreUsuario" class="form-control is-invalid" placeholder="Username" value="<?php echo $NombreUsuario; ?>">
               
                <span class="invalid-feedback"><?php echo $username_err; ?></span>

            </div>    

    
    <!-- form group -->

    <div class="form-group input-group <?php echo (!empty($mail_err)) ? 'has-error' : ''; ?>">

<div class="input-group-prepend">

<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>



</div>

    <input type="email" name="email" class="form-control is-invalid" placeholder="E-mail" value="<?php echo $mail; ?>">
   
    <span class="invalid-feedback"><?php echo $mail_err; ?></span>


</div>    

<!-- form-group// -->


        


                <div class="form-group input-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                <div class="input-group-prepend">

                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>

                </div>


             <input type="password" name="Contraseña" class="form-control  is-invalid" placeholder="Password" value="<?php echo $Contraseña; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>

            <!-- form-group// -->





            <div class="form-group input-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">

            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>

            </div>

                <input type="password" name="confirm_password" class="form-control  is-invalid" placeholder="Repeat  pasword" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>

            

            	<!-- form-group// -->

                <h5 class="card-title mt-3 text-center text-uppercase titulo" style="color:white; max-width: 400px; font-family: Montserrat;" >Personal Details</h5>

            <div class="form-group input-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                
            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-user"></i> </span>

            </div>

                <input type="text" name="Nombre" class="form-control  is-invalid"  placeholder="Name" value="<?php echo $nombre; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>    

            	<!-- form-group// -->

            <div class="form-group input-group <?php echo (!empty($apellidos_err)) ? 'has-error' : ''; ?>">
                
            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-user"></i> </span>

            </div>

                <input type="text" name="apellidos" class="form-control  is-invalid" placeholder="Last name" value="<?php echo $apellidos; ?>">
                <span class="invalid-feedback"><?php echo $apellidos_err; ?></span>
            </div>   

            	<!-- form-group// -->

            <div class="form-group input-group <?php echo (!empty($direccion_err)) ? 'has-error' : ''; ?>">
                
            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-address-card "></i> </span>

            </div>

                <input type="text" name="direccion" class="form-control  is-invalid"  placeholder="Address" value="<?php echo $direccion; ?>">
                <span class="invalid-feedback"><?php echo $direccion_err; ?></span>
            </div>    



        	<!-- form-group// -->

            <div class="form-group input-group">
                
            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-address-card"></i> </span>

            </div>

                <select  class="form-control" name="provincia">
                <option selected="">Province</option>

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
                <input type="submit" class="btn btn-primary btn-block" value="Send">
                <input type="reset" class="btn btn-warning btn-block" value="Clear">
            </div>
            <p class="text-center" style="color:white;">do you already have an account? <a href="../modelo/sesion.php" class="btn btn-danger" >Log in</a> </p>   
        </form>
            </article>
        </div>    
            </div>

            
            </div>
            <script src="scripts/comun.js"></script>

    </body>

    



</html>