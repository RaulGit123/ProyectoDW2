<?php
  if (session_status()===PHP_SESSION_NONE){
	session_start();
} 

$borrar=""
?>


<form action="../vista/borrar.php" method="get" >

        

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
            </div>
              
        </form>