<form method="POST" action="borrar.php">
    <br>
    <?php
      //Creamos la sentencia SQL y la ejecutamos
      $ssql="SELECT Nombre FROM comida ORDER BY IdComida";
      $result = $conexion->query($ssql);
    
      echo '<select name="Nombre">';
      //Mostramos los registros en forma de menú desplegable
      while ($fila = $result->fetch_array()) {
        echo '<option>'.$fila["Nombre"];
      }
      $result->free_result();
    ?>
    </select>
    <br>
    <input TYPE="submit" value="Borrar">
</form>
