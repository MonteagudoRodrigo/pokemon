<?php
include_once("conexion/ConexionDatabase.php");

$conn = new ConexionDatabase();


$insertImagen = 'img/' . $_FILES["insertImagen"]["name"];
$insertTipo = $_POST["insertTipo"];
$insertNumero = $_POST["insertNumero"];
$insertNombre = $_POST["insertNombre"];
$insertDescripcion = $_POST["insertDescripcion"];

$rutaArchivoTemporal = $_FILES["insertImagen"]["tmp_name"];
$rutaArchivoFinal = $insertImagen;
move_uploaded_file($rutaArchivoTemporal, $rutaArchivoFinal);

$existe = $conn->existePokemon($insertNumero, $insertNombre);

if ($existe) {
    setcookie("PokemonExistente!", 1, time() + (86400 * 15));
    header("location: formInsert.php");
} else {
    $conn->agregarPokemon($insertNumero, $insertImagen, $insertNombre, $insertTipo, $insertDescripcion);
    setcookie("PokemonAgregado", 1, time() + (86400 * 15));
    header("location: index.php");
}

?>

