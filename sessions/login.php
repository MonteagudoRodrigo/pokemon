<?php
session_start();
$usuario = $_POST["user"];
$password = $_POST["pass"];

if($usuario == "admin@mail.com" && $password == "123"){
    $_SESSION["pokelog"] = $usuario;
    header("Location: ../index.php");
}else{
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}
