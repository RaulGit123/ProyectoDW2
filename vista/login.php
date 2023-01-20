<form action="./controlador/CtrlLogin.php" method="POST">
    <label for="usu">Usuario:</label>
    <input type="text" name="NombreUsuario" id="NombreUsuario" autofocus>

    <label for="pass">Contraseña:</label>
    <input type="password" name="Contraseña" id="Contraseña">

    <input type="submit" value="Iniciar sesión">
    <!-- <p>¿No tienes una cuenta? <a href="./vista/register.php">Regístrate ahora</a>.</p>   -->
    <!-- asi permitirá acceder a register desde la ventana principal de localhost/prueba -->


    <p>¿No tienes una cuenta? <a href="./vista/register.php">Regístrate ahora</a>.</p>

    <!-- así permitirá acceder a register desde la ventana prueba/vista -->

    <!-- no es lo mismo la dirección inicial que carga el ctrlMain del login.php que cuando la direccionamos desde el link de registro. -->
</form>





      