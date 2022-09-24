<?php
include_once("conexion/ConexionDatabase.php");

$conn = new ConexionDatabase();
$buscar = $_POST["busqueda"];

$resultado = $conn->buscarPokemon($buscar);

if($resultado->num_rows >= 1){
    foreach ($resultado as $pokemon) {
        $identificador = $pokemon['identificador'];
        $nombrePokemon = $pokemon['nombre'];
        $imagenPokemon = $pokemon['imagen'];
        $imagenTIpo = $pokemon['imagenTipo'];

        include_once("sections/home.php");
        echo '<tr>
            <th class="pokemon-column-info"><img src="' . $imagenPokemon . '" alt="" width="50" class="m-auto d-block"></th>
            <td class="pokemon-column-info"><img src="' . $imagenTIpo . '" alt="" width="50" class="m-auto"></td>
            <td>' . $identificador . '</td>
            <td>' . $nombrePokemon . '</td>';

        if (isset($_SESSION["pokelog"])) {
            echo "<td>
                     <div class='d-flex justify-content-center gap-2'>
                         <button class='btn btn-success'>Editar</button>
                         <button class='btn btn-danger'>Borrar</button>
                     </div>
                     </td>";
        }
        echo '</tr>';
    }
}else{
    //Agregar "Pokemon no encontrado"
    header("Location: index.php");
}


?>

</tbody>
</table>

<?php
include("sections/footer.php");
?>
