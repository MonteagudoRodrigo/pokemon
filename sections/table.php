<?php
include_once("./conexion/ConexionDatabase.php");


$conn = new ConexionDatabase();

$pokemones= $conn->getPokemon();
foreach ($pokemones as $pokemon) {
    $id = $pokemon['id'];
    $identificador = $pokemon['identificador'];
    $nombrePokemon = $pokemon['nombre'];
    $imagenPokemon = $pokemon['imagen'];
    $imagenTIpo = $pokemon['imagenTipo'];


    echo '<tr>
            <td class="pokemon-column-info"><a href="detallePokemon.php"> <img src="'. $imagenPokemon.'" alt="" width="50" class="m-auto d-block"></td>
            <td class="pokemon-column-info"><img src="'. $imagenTIpo.'" alt="" width="50" class="m-auto"></td>
            <td><a href="detallePokemon.php"> '.$identificador.'</td>
            <td> <a href="detallePokemon.php"> '.$nombrePokemon.'</td>';
    if (isset($_SESSION["pokelog"])) {
        echo "<td> <form action= './modificarPokemon.php' method='get' enctype='text/plain'>
<div class='d-flex justify-content-center gap-2'>
                         <button class='btn btn-success' name = 'editar' method='GET' value='$id'>Editar</button>
                         <button class='btn btn-danger' name = 'eliminar' method='GET' value='$id'>Borrar</button>
                     </div></form></td>";
    }

    echo '</tr>';
}

?>

</tbody>
</table>

<?php
include("footer.php");
?>
