<html>
<body>
<?php 

require_once("../modelo/Conexion.php");

$con = Conexion::getConection();
$sql = "SELECT IdComida , Nombre , Descripcion ,Ingredientes, Precio,tipo FROM Comida";
$query = $con -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 
echo '<table border="0" cellspacing="2" cellpadding="2"> 
     <tr> 
          <td> <font face="Arial">IdComida</font> </td> 
          <td> <font face="Arial">Nombre</font> </td> 
          <td> <font face="Arial">Descripcion</font> </td> 
          <td> <font face="Arial">Ingredientes</font> </td>
          <td> <font face="Arial">Precio</font> </td> 
         <td> <font face="Arial">Tipo</font> </td> 
  </tr>';

if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo " <tr> 
<td>".$result -> IdComida."</td>
<td>".$result -> Nombre."</td>
<td>".$result -> Descripcion."</td>
<td>".$result -> Ingredientes."</td>
<td>".$result -> Precio."</td>
<td>".$result -> tipo."</td>

</tr>";


   }
 }


?>
<a class="admin" href="admin.php">Volver al panel de administrador</a>

<form action="../modelo/borrar.php" method="get" >

        

    <!-- form group -->
 
            
      
            <div class="form-group input-group ">

            <div class="input-group-prepend">

            <span class="input-group-text"> <i class="fa fa-user"></i> </span>

            </div>
         
       
            <input type="text" id="IdComida" name="IdComida" placeholder="IdComida">
               
          
            </div>


            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Enviar id">
                <input type="reset" class="btn btn-warning btn-block" value="Borrar">
                <a class="admin" href="admin.php">Volver al panel de administrador</a>
            </div>
              
        </form>
</body>
</html>