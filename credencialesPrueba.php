<?php
include_once("./conexion/ConexionDatabase.php");
$conn = new ConexionDatabase();

$a = "admin1@mail.com";
$b = "123";

$usuarios = $conn->getUsuarios();

$c = $conn->existeUsuario($a, $b);
var_dump($c);

foreach ($usuarios as $usuario) {
    $email = $usuario['email'];
    $password = $usuario['password'];
    echo $email, $password;
}
?>