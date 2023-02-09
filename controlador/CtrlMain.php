<?php
echo " estamos aqui";
    session_start();
   
    if (isset($_SESSION["NombreUsuario"]) && isset($_SESSION["Contraseña"]) ) {
        
        require_once("Validar.php");
        $validar = new Validar();
        $validar->validarDatos();
      
        $nombre = $_SESSION["NombreUsuario"];
        $con = Conexion::getConection();

        $sql = "SELECT Activado FROM usuarios WHERE NombreUsuario = '$nombre'";
        $query = $con -> prepare($sql); 
        $query -> execute(); 
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
    echo "estamos antes del fetch";
        if($query -> rowCount() > 0)   { 
        foreach($results as $result) { 
            echo '<div id="idUsu" style="display: none;">'.$result -> Activado.'</div>';
        }
        }
        $activado = $result->Activado;

        if($_SESSION["NombreUsuario"]=="admin" ){
                header('Location: ../web/admin.php');}
                
        if($_SESSION["NombreUsuario"]!="admin" && $activado=='si'){
                include_once("../web/principal.php");}   
        else{
            include_once("../web/login.php");
            echo '<script language="javascript">alert("Error de verificación");</script>'; }
            
            
     
    } else {

        if (isset($_SESSION["error"])) {
        
            echo '<script language="javascript">alert("Error de login");</script>';
            unset($_SESSION["error"]);
        }
    
        include_once("../web/login.php");

        //aqui luego desviariamos a vista registro de usuario.
    }
?>