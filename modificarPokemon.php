<?php
include_once ('conexion/ConexionDatabase.php');
$conn = new ConexionDatabase();

if(isset($_GET['eliminar'])){
    $conn->eliminarPokemon($_GET['eliminar']);
    header('location: index.php');

}else {


}
