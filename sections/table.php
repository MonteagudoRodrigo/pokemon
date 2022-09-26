<?php
include_once("./conexion/ConexionDatabase.php");


$conn = new ConexionDatabase();

$pokemones = $conn->getPokemon();
foreach ($pokemones as $pokemon) {

    $identificador = $pokemon['identificador'];
    $nombrePokemon = $pokemon['nombre'];
    $imagenPokemon = $pokemon['imagen'];
    $imagenTIpo = $pokemon['imagenTipo'];


    echo "<tr>
            <td> <img src=" . $imagenPokemon . " alt='' width='50' class='m-auto d-block'></td>
            <td class='pokemon-column-logout'><img src=" . $imagenTIpo . " alt='' width='50' class='m-auto'></td>
            <td class='pokemon-column-info'><a href='./detallePokemon.php/?param=$identificador'> " . $identificador . "</td>
            <td> <a href='./detallePokemon.php/?param=$nombrePokemon'> " . $nombrePokemon . "</td>";

    if (isset($_SESSION["pokelog"])) {
        echo "<style>
        @media (max-width: 767px) {
            .pokemon-column-logout{
                display: none;
            }
        }
    </style>";
        echo "<td> <form action= './modificarPokemon.php' method='get' enctype='text/plain'>
                <div class='d-flex justify-content-center gap-3 flex-wrap'>
                         <button class='btn-editar' name = 'editar' method='GET'><a class='btn btn-success' href='./vistaModificarPokemon.php/?param=$identificador'>Editar</a></button>
                         <button class='btn btn-danger' name = 'eliminar' method='GET' value='$identificador'>Borrar</button>
                     </div>
                     </form>
                     </td>";
    }

    echo '</tr>';
}

?>

</tbody>
</table>

<section>
    <?php
    if (isset($_SESSION["pokelog"])) {

        echo '<div class="d-flex justify-content-center"><a href="formInsert.php" class="btn btn-primary text-center" >
                Agregar nuevo pokemon
            </a></div>
            ';
    }
    ?>

</section>