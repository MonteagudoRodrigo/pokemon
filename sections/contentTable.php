<table class="table table-bordered text-center mt-4">
    <thead>
    <tr class="table-success">
        <th scope="col" class="pokemon-column-info">Imagen</th>
        <th scope="col" class="pokemon-column-info">Tipo</th>
        <th scope="col">Numero</th>
        <th scope="col">Nombre</th>
        <?php
        if (isset($_SESSION["pokelog"])) {
            echo '<th scope="col">Accion</th>';
        }
        ?>
    </tr>
    </thead>
<?php
include_once("./conexion/ConexionDatabase.php");

$conn = new ConexionDatabase();

    $pokemones= $conn->getPokemon();
    foreach ($pokemones as $pokemon) {
        $identificador = $pokemon['identificador'];
        $tipo = $pokemon['tipo'];
        $nombrePokemon = $pokemon['nombre'];
        $imagenPokemon = $pokemon['imagen'];
        $descripcion = $pokemon['descripcion'];
        $imagenTIpo = $pokemon['imagenTipo'];
        $id = $pokemon['id'];
        //$tipoPokemon = new TipoPokemon($id, $descripcion, $imagenTIpo);
        //$pokemones = new Pokemon($identificador, $tipoPokemon);
        // echo $pokemones->obtenerDescripcionTipoPokemon();

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
