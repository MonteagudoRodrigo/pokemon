<?php
session_start();
$usuario = $_POST["user"];
$password = $_POST["pass"];

if($usuario == "admin@mail.com" && $password == "202cb962ac59075b964b07152d234b70"){
    session_start();
    $_SESSION["pokelog"] = "yes";
    header("Location : index.php");
    exit();
}else{
    session_destroy();
    header("Location: index.php");
    exit();
}
echo "WEOLCOME ADMIN! " . $usuario;


// if(isset($_POST["ingresar"])){
//     //mysqli_real_scape.... para que el usuario no pueda ingresar inyeccion sql
//     $usuario = mysqli_real_escape_string($database->getConexion(), $_POST["user"]);
//     $password = mysqli_real_escape_string($database->getConexion(), $_POST["pass"]);

//     $password_encriptada = md5($password);

//     $sql = "SELECT email FROM credenciales WHERE email = '$usuario' AND PASSWORD = '$password_encriptada'";
//     $resultado = $database->getConexion()->query($sql);
//     $rows =  $resultado->num_rows;

//     if($rows > 0){
//         $row = $resultado->fetch_assoc();
//         $_SESSION["email"] = $row["email"];
//         header("Location: admin.php");
//     }else{
//         echo "<script>
//             alert('Usuario o Password incorrecto');
//             window.location = 'index.php';
//             </script>";
//     }
// }


?>