<?php

include_once("ConexionDatabase.php");

$conn = new ConexionDatabase();

$conn->probarBase();

 $prueba = $conn->buscarPokemon();

foreach ($prueba as $pokemon) {
    $identificador = $pokemon['identificador'];
    $nombre = $pokemon['nombre'];
    echo $identificador;
    echo $nombre;
}

