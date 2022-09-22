<?php

include("conexion/ConexionDatabase.php");

$conn = new ConexionDatabase();
session_start();
if(!isset($_SESSION["email"])){
    header("Location: index.php");
}

$nameUser = $_SESSION["email"];

$sql = "SELECT email FROM credenciales WHERE email = '$nameUser'";

$result = $conn->getConexion()->query($sql);

$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <img src="./assets/images/logo-pokebola.png" alt="" width="50" />
            <a class="navbar-brand ms-4" href="#">Pokedex ♥</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                </ul>
                <p class="d-flex align-items-center m-0"><?php
                                                            echo utf8_decode($row["email"]);
                                                            ?></p>
            </div>
        </div>
    </nav>

    <main>
        <p>Hola admin</p>
        
            <a href="./logout.php" class="btn btn-danger">salir</a>
        
    </main>

    <?php
    include("./sections/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>