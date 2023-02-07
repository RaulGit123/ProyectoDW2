<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show dishes | Nigiri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" href="../web/styles/menu.css">
    <link rel="stylesheet" href="../web/styles/login.css"> -->
    <link rel="stylesheet" href="styles/pag_principal.css">
    <link rel="stylesheet" href="styles/mostrar.css">
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
</head>

<body id="page-top">
    <nav class="stroke navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><img src="img/logo2.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars my-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto py-4 py-lg-0"><?php

                    if (!empty($_SESSION["NombreUsuario"])) {
                    ?>
                        <li class="nav-item"><a class="nav-link" href="menu.php">Our Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="pedidos.php">Order Now</a></li>
                        <li class="nav-item"><a class="nav-link" href="reservas.php">Book Now</a></li>
                        <li class="nav-item"><a class="nav-link activo"><?php echo "Welcome " . $_SESSION["NombreUsuario"]; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
        <div class="mt-3 masthead-heading text-uppercase"><?php echo "Welcome to Nigiri, " . $_SESSION["NombreUsuario"]; ?></div>
        <div class="masthead-subheading font-italic">View all dish</div>
        <div class="card bg-dar">
            <article class="card-body mx-auto articulo" id="bg-article">
                <div class="form-group  ">
                    <table class="table table-dark table-hover bg-transparent">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Ingredients</th>
                            <th>Price</th>
                            <th>Kind</th>
                        </tr>

                        <?php require_once("../modelo/Conexion.php");

                        $con = Conexion::getConection();
                        $sql = "SELECT IdComida , Nombre , Descripcion ,Ingredientes, Precio,tipo FROM Comida";
                        $query = $con->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);


                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) {
                                echo " <tr> 
<td>" . $result->IdComida . "</td>
<td>" . $result->Nombre . "</td>
<td>" . $result->Descripcion . "</td>
<td>" . $result->Ingredientes . "</td>
<td>" . $result->Precio . "</td>
<td>" . $result->tipo . "</td>

</tr>";
                            }
                        } ?>

                </div>

            </article>

        </div>

    </header>

    <a class="mt-5 mb-5 mr-2 p-4 px-3 btn btn-success btn-lg text-uppercase" href="admin.php">Back to admin</a>
    <script src="scripts/comun.js"></script>
</body>

</html>