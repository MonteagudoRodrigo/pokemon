<?php
include("./conexion/ConexionDatabase.php");
$database =  new ConexionDatabase();

if(isset($_POST["ingresar"])){
    //mysqli_real_scape.... para que el usuario no pueda ingresar inyeccion sql
    $usuario = mysqli_real_escape_string($database->getConexion(), $_POST["user"]);
    $password = mysqli_real_escape_string($database->getConexion(), $_POST["pass"]);

    $sql = "SELECT email FROM credenciales WHERE email = '$usuario' AND PASSWORD = '$password'";
    $resultado = $database->getConexion()->query($sql);
    $rows =  $resultado->num_rows;

    if($rows > 0){
        $row = $resultado->fetch_assoc();
        $_SESSION["email_usuario"] = $row["email"];
        header("Location: admin.php");
    }else{
        echo "Usuario No encontrado";
    }
}

?>
