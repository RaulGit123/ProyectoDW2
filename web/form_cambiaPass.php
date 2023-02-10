<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password | Nigiri</title>
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
    <nav class="stroke navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0">
                    <?php
                    require_once("../modelo/Conexion.php");
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    $nombre = $_SESSION["NombreUsuario"];
                    $con = Conexion::getConection();
                    $sql = "SELECT IdUsuarios FROM Usuarios WHERE NombreUsuario = '$nombre'";
                    $query = $con->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                            $id = $result->IdUsuarios;
                        }
                    }

                    $sql = "SELECT Direccion FROM `Usuarios` WHERE IdUsuarios = $id;";
                    $query = $con->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                            $dire = $result->Direccion;
                        }
                    }
                    if (!empty($_SESSION["NombreUsuario"])) {

                    ?>
                        <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="pedidos.php">Order Now</a></li>
                        <li class="nav-item"><a class="nav-link" href="reservas.php">Book Now</a></li>
                        <?php

                        if ($_SESSION["NombreUsuario"] == "admin") {
                        ?><li class="nav-item"><a class="nav-link" href="admin.php"><?php echo "Welcome " . $_SESSION["NombreUsuario"]; ?></a></li><?php
                        }
                            ?>
                        <?php
                        if ($_SESSION["NombreUsuario"] != "admin") {
                        ?> <li class="nav-item"><a class="nav-link" href="paginaUsuario.php"><?php echo "Welcome " . $_SESSION["NombreUsuario"]; ?></a></li><?php
                        }
                    } else {
                        header("location:principal.php");
                            ?>
                        <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li> <!--FALTA PONER HREF CON RESTO DE PÁGINAS, NO #x-->
                        <li class="nav-item"><a class="nav-link" href="../modelo/sesion.php">Order Now</a></li>
                        <li class="nav-item"><a class="nav-link" href="../modelo/sesion.php">Book Now</a></li>
                        <li class="nav-item"><a class="nav-link" href="../modelo/sesion.php">Log in</a></li><?php
                    }?>
                </ul>
            </div>
        </div>
    </nav>

    <div id="griddy">
        <div class="container caja1">
            <div class="card bg-dar p-5">
                <article class="card-body mx-auto articulo" id="bg-article">
                    <h4 class="card-title mt-3 text-center text-uppercase">CHANGE YOUR PASSWORD</h4>

                    <form action="../modelo/nuevoPass.php" method="post">

                        <!-- form-group// -->
                        <div class="form-group input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa fa-lock"></i> </span>
                            </div>
                            <input type="password" name="passActual" id="passActual" class="form-control " placeholder="Current Password">
                        </div>

                        <!-- form group -->
                        <div class="form-group input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa fa-lock"></i> </span>
                            </div>
                            <input type="password" name="cambiaPass" id="cambiaPass" class="form-control " placeholder="New Password">
                        </div>

                        <!-- form group -->
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Update Password">
                            <input type="reset" class="btn btn-warning btn-block" value="Clear">
                        </div>
                        
                    </form>
                </article>
            </div>
        </div>
    </div>
    <script src="scripts/comun.js"></script>
</body>


</html>