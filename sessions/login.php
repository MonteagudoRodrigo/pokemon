<?php
include_once("../conexion/ConexionDatabase.php");
$conn = new ConexionDatabase();

session_start();
$usuario = $_POST["user"];
$password = $_POST["pass"];

$usuarioLogueado = $conn->existeUsuario($usuario, $password);

if($usuarioLogueado){
    $_SESSION["pokelog"] = $usuario;
    header("Location: ../index.php");
}else{
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}