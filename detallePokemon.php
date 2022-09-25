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
};
echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//db.onlinewebfonts.com/c/f4d1593471d222ddebd973210265762a?family=Pokemon" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./assets/styles/style.css?v=<?php echo time(); ?>">
    <title>Pokedex</title>
</head>';
include_once ('sections/header.php');
echo '   <body><tr>
            <td class="pokemon-column-info"> <img src=' . $imagenPokemon.' alt="" width="50" class="m-auto d-block"></td>
            <td class="pokemon-column-info"><img src='. $imagenTIpo.' alt="" width="50" class="m-auto"></td>
            <td> ' .$identificador. '</td>
            <td>  ' .$nombrePokemon.'</td>
            <td>  ' .$descripcionPokemon.'</td>
            </body> ';



include_once ('sections/footer.php');


