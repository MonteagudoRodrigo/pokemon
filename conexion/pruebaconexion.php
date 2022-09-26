<?php

include_once("ConexionDatabase.php");

$conn = new ConexionDatabase();
$falopero = $conn->getPokemon();

foreach ($falopero as $pokemon) {
    $identificador = $pokemon['identificador'];
    $tipo = $pokemon['tipo'];
    $descripcion = $pokemon['descripcion'];
    $imagenTIpo = $pokemon['imagenTipo'];
    $id = $pokemon['id'];
    $tipoPokemon = new TipoPokemon($id, $descripcion, $imagenTIpo);
    $pokemones = new Pokemon($identificador, $tipoPokemon);

    echo $pokemones->obtenerDescripcionTipoPokemon();
}
