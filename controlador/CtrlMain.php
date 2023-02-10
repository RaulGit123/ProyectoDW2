<?php
    session_start();              //invocamos session_start para iniciar la sesion
    if (isset($_SESSION["NombreUsuario"]) && isset($_SESSION["Contraseña"]) ) {  //comprobamos si está sesion setteado
        require_once("Validar.php");                                                                
        $validar = new Validar();        //creamos un nuevo objeto validar donde llamaremos a la función para validar los campos
        $validar->validarDatos();
      
        $nombre = $_SESSION["NombreUsuario"];   //capturamos la variable nombreUsuario del usuario de la sesión para comparar luego.
        $con = Conexion::getConection();  //creamos una nueva conexion con la funcion creada en la clase conexion que hereda de la hoja conexion-php que es requerida en validar.php
        /* Hacemos una consulta para ver si el usuario que ha iniciado sesión está verificado.*/
        $sql = "SELECT Activado FROM Usuarios WHERE NombreUsuario = '$nombre'"; 
        $query = $con -> prepare($sql); 
        $query -> execute(); 
        $results = $query -> fetchAll(PDO::FETCH_OBJ);    //se guardan los resultados en un array
        if($query -> rowCount() > 0)   { 
        foreach($results as $result) { 
            echo '<div id="idUsu" style="display: none;">'.$result -> Activado.'</div>';  // se recorre en un foreach para comparar todos los códigos.
        }
        }
        $activado = $result->Activado;  
// este condicional enviará a páginas privadas al usuario si es admin,usuario validado o no validado.
        if($_SESSION["NombreUsuario"]=="admin" ){
                header('Location: ../web/admin.php');}   
                
        if($_SESSION["NombreUsuario"]!="admin" && $activado=='si'){
                include_once("../web/principal.php");}   
        else{
            include_once("../web/login.php");
            echo '<script language="javascript">alert("Error de verificación");</script>'; }
            
            
     //si no está seteada la sesión devolverá un error
    } else {
        if (isset($_SESSION["error"])) {
            echo '<script language="javascript">alert("Error log in");</script>';
            unset($_SESSION["error"]);
        }
    
        include_once("../web/login.php");

 
    }
