<?php
include_once("./conexion/ConexionDatabase.php");

$conn = new ConexionDatabase();

$pokemones= $conn->getPokemon();
foreach ($pokemones as $pokemon) {
    $identificador = $pokemon['identificador'];
    $nombrePokemon = $pokemon['nombre'];
    $imagenPokemon = $pokemon['imagen'];
    $imagenTIpo = $pokemon['imagenTipo'];
    $descripcionPokemon = $pokemon['descripcion'];
}

echo '
<p>esto funciona</p>
            <div class="pokemon-column-info"><img src="'. $imagenPokemon.'" alt="" width="50" class="m-auto d-block"></div>
            <div class="pokemon-column-info"><img src="'. $imagenTIpo.'" alt="" width="50" class="m-auto"></div>
            <div> '.$identificador.'</div>
            <div>  '.$nombrePokemon.'</div> 
            <div>  '.$descripcionPokemon.'</div>';





