<?php
include_once ('./conexion/ConexionDatabase.php');
session_start();
$conn = new ConexionDatabase();
$parametro = $_GET['param'];

$pokemonSeleccionado = $conn->buscarPokemon($parametro);
foreach ($pokemonSeleccionado as $pokemon) {
    $id = $pokemon['id'];
    $identificador = $pokemon['identificador'];
    $nombrePokemon = $pokemon['nombre'];
    $imagenPokemon = $pokemon['imagen'];
    $imagenTIpo = $pokemon['imagenTipo'];
    $descripcionPokemon = $pokemon['descripcion'];
    $tiempo = time();
};
echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//db.onlinewebfonts.com/c/f4d1593471d222ddebd973210265762a?family=Pokemon" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../assets/styles/style.css?v='. $tiempo . '">
    <title>Pokedex</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <img src="http://localhost/pokemon/assets/images/logo-pokebola.png" alt="" width="50" />
        <a class="ms-4 fw-bold fst-italic logotipe" href="../index.php">Pokedex</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

            </ul>
';
            if (isset($_SESSION["pokelog"])) {
                $usuarioLogueado = $_SESSION["pokelog"];
                echo '<div class="d-flex justify-content-between menu-info-admin gap-2 align-items-center">
                <img src="../assets/images/ash.png" alt="" width="60" class="menu-info-admin__item">
                <p class="m-0 fw-bold text-center menu-info-admin__item">
                ' . $usuarioLogueado . '</p>
                <a href="../sessions/logout.php" class="btn btn-danger menu-info-admin__item">Salir</a>
                </div>';
                } else {
                echo '<form action="../sessions/login.php" method="post" class="d-flex  align-items-center gap-2 m-0 form-login">
                <input type="text" name="user" id="user" placeholder="email" class="form-control">
                <input type="password" name="pass" id="pass" placeholder="password" class="form-control">
                <input type="submit" value="ingresar" class="btn btn-light fw-bold login-button" name="ingresar" id="ingresar">
                </form>';
               };
echo '   </div>
    </div>

</nav>
            
            <main>
            <section>
           
            <div class="p-4 d-flex my-4 align-items-center  pokemon-detail rounded border border-warning">
            <tr>
        <div class="col-6 mb-4">
                <img src="../' . $imagenPokemon . '" alt="" width="450" class="m-auto d-block pokemon-img-detail">
        </div>
        <div class="col-6">
            <h2 class="pro-d-title">
                ' . $nombrePokemon . '
            </h2>
            <div class="product_meta">
                <span class="posted_in"> <strong>Tipo:</strong> <img src="../' . $imagenTIpo . '" alt="" width="50" class="m-auto"></span>
            </div>
            <div class="m-bot15 mb-4"> <strong>Numero : </strong> <span class="amount-old">' . 
            ($identificador < 10 ? '00'.$identificador  : '0'.$identificador). '</span></div>
            <p>
            ' . $descripcionPokemon . '
            </p>
        </div>

    </div>
            </section>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
            </body> ';


