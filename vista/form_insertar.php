<?php
  if (session_status()===PHP_SESSION_NONE){
	session_start();
} 
?>



<form action="../modelo/insertar.php" method="post">


    Nombre <input type="text" name = "Nombre" placeholder="Nombre" ><br/>
    Descripcion <input type="text" name = "Descripcion" placeholder="Descripcion" ><br/>
    Ingredientes <input type="text" name = "Ingredientes" placeholder="Ingredientes"><br/>
    Precio <input type="text" name = "Precio" placeholder="Precio"><br/>
    Imagen <input type="text" name = "Imagen" placeholder="Imagen"><br/>
    Tipo <input type="text" name = "tipo" placeholder="tipo"><br/>
<input type="submit" class="btn btn-primary btn-block" value="Insertar datos en la tabla.">
<a class="admin" href="admin.php">Volver al panel de administrador</a>
</form>