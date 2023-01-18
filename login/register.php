<?php
// Include config file
require_once "config.php";
 
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

    // if(empty(trim($_POST["localidad"]))){
    //     $localidad_err="porfavor , introduzca su localidad.";
    // }else{
    //     $localidad = trim($_POST["localidad"]);
    // }
    

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
            $param_password = password_hash($Contraseña, PASSWORD_DEFAULT); // Creates a Contraseña hash
            $param_name = $nombre;
            $param_apellidos = $apellidos;
            $param_direccion = $direccion;
            $param_provincia = $listaProvincias;
            $param_mail =$mail;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Nuevo usuario.</h2>
        <p>crea una cuenta y disfruta ahora.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="NombreUsuario" class="form-control" value="<?php echo $NombreUsuario; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($mail_err)) ? 'has-error' : ''; ?>">
                <label>E-mail</label>
                <input type="email" name="email" class="form-control" value="<?php echo $mail; ?>">
                <span class="help-block"><?php echo $mail_err; ?></span>
            </div>   
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="Contraseña" class="form-control" value="<?php echo $Contraseña; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>


            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Nombre</label>
                <input type="text" name="Nombre" class="form-control" value="<?php echo $nombre; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($apellidos_err)) ? 'has-error' : ''; ?>">
                <label>Apellidos</label>
                <input type="text" name="apellidos" class="form-control" value="<?php echo $apellidos; ?>">
                <span class="help-block"><?php echo $apellidos_err; ?></span>
            </div>   
            <div class="form-group <?php echo (!empty($direccion_err)) ? 'has-error' : ''; ?>">
                <label>Dirección</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo $direccion; ?>">
                <span class="help-block"><?php echo $direccion_err; ?></span>
            </div>    
            <!-- <div class="form-group <?php echo (!empty($localidad_err)) ? 'has-error' : ''; ?>">
                <label>Localidad</label>
                <input type="text" name="localidad" class="form-control" value="<?php echo $localidad; ?>">
                <span class="help-block"><?php echo $localidad_err; ?></span>
            </div>    -->

     

            <div class="form-group">
                <label>Provincia</label>
                <select name="provincia">

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
                <input type="submit" class="btn btn-primary" value="Ingresar">
                <input type="reset" class="btn btn-default" value="Borrar">
            </div>
            <p>¿Ya tienes una cuenta? <a href="login.php">Ingresa aquí</a>.</p>
        </form>
    </div>    
</body>
</html>