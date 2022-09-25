<?php
include_once("./conexion/ConexionDatabase.php");

$conn = new ConexionDatabase();

$pokemones= $conn->getPokemon();
foreach ($pokemones as $pokemon) {
    $identificador = $pokemon['identificador'];
    $nombrePokemon = $pokemon['nombre'];
    $imagenPokemon = $pokemon['imagen'];
    $imagenTIpo = $pokemon['imagenTipo'];

    echo '<tr>
            <td class="pokemon-column-info"><img src="'. $imagenPokemon.'" alt="" width="50" class="m-auto d-block"></td>
            <td class="pokemon-column-info"><img src="'. $imagenTIpo.'" alt="" width="50" class="m-auto"></td>
            <td>'.$identificador.'</td>
            <td>'.$nombrePokemon.'</td>';
    if (isset($_SESSION["pokelog"])) {
        echo "<td><div class='d-flex justify-content-center gap-2'>
                         <button class='btn btn-success'>Editar</button>
                         <button class='btn btn-danger'>Borrar</button>
                     </div></td>";
    }

    echo '</tr>';
}

?>

</tbody>
</table>

