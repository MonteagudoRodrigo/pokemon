<?php
include_once ('conexion/ConexionDatabase.php');
$conn = new ConexionDatabase();

if(isset($_GET['eliminar'])){
    $conn->eliminarPokemon($_GET['eliminar']);
    header('location: index.php');

}else {



    $insertNumero =$_GET['identificador'];
    $insertNombre = $_POST["insertNombre"];
    $insertImagen = $_FILES["insertImagen"]["name"] != null ? 'img/' . $_FILES["insertImagen"]["name"] : "";
    $insertTipo = $_POST["insertTipo"];
    $insertDescripcion = $_POST["insertDescripcion"];
    var_dump($insertNumero);
    var_dump($insertNombre);
    var_dump($insertImagen);
    var_dump($insertDescripcion);


    $rutaArchivoTemporal = $_FILES["insertImagen"]["tmp_name"];
    $rutaArchivoFinal = $insertImagen;
    move_uploaded_file($rutaArchivoTemporal, $rutaArchivoFinal);


    $resultado = $conn->buscarPokemon($insertNumero);
    if($resultado->num_rows >= 1){
        foreach ($resultado as $pokemon) {
            $identificadorB = $pokemon['identificador'];
            $nombrePokemonB = $pokemon['nombre'];
            $imagenPokemonB = $pokemon['imagen'];
            $tipoB = $pokemon['tipo'];
            $descripcionTIpoB = $pokemon['descripcion'];
            var_dump($identificadorB);
            var_dump($nombrePokemonB);
            var_dump($imagenPokemonB);
            var_dump($descripcionTIpoB);
            var_dump($tipoB);
        }
    }


    $imagenFinal = $insertImagen!=null || $insertImagen!="" ? $insertImagen : $imagenPokemonB;
    $nombreFinal = $insertNombre!=null || $insertNombre!="" ? $insertNombre : $nombrePokemonB;
    $tipoFinal = $insertTipo!=null || $insertTipo!="" ? $insertTipo : $tipoB;
    $descripcionFinal = $insertDescripcion!=null || $insertDescripcion!="" ? $insertDescripcion : $descripcionTIpoB;

    var_dump($insertNumero);
    var_dump($nombreFinal);
    var_dump($imagenFinal);
    var_dump($descripcionFinal);
    var_dump($tipoFinal);

    $conn->modificarPokemonAll($insertNumero, $nombreFinal, $imagenFinal, $descripcionFinal, $tipoFinal);

    setcookie("PokemonEditado", 2, time() + (86400 * 15));
    header("location: ../index.php");
}
