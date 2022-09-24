<?php
// if (isset($_POST["ingresar"])) {
//     qli_real_sca//myspe.... para que el usuario no pueda ingresar inyeccion sql
//     $usuario = mysqli_real_escape_string($database->getConexion(), $_POST["user"]);
//     $password = mysqli_real_escape_string($database->getConexion(), $_POST["pass"]);

//     // $password_encriptada = sha1($password);

//     $sql = "SELECT email FROM credenciales WHERE email = '$usuario' AND PASSWORD = '$password'";
//     $resultado = $database->getConexion()->query($sql);
//     $rows =  $resultado->num_rows;

//     if ($rows > 0) {
//         $row = $resultado->fetch_assoc();
//         $_SESSION["email"] = $row["email"];
//         header("Location: admin.php");
//     } else {
//         echo "<script>
//             alert('Usuario o Password incorrecto');
//             window.location = 'index.php';
//             </script>";
//     }
// }

?>

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <img src="./assets/images/logo-pokebola.png" alt="" width="50" />
        <a class="navbar-brand ms-4 fw-bold fst-italic" href="#">POKEDEX</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

            </ul>
            <?php
            if (!isset($_SESSION["pokelog"])) {
                $usuarioLogueado = $_SESSION["pokelog"];
                echo '<div class="d-flex justify-content-between menu-info-admin gap-2 align-items-center">
                <img src="./assets/images/ash.png" alt="" width="60">
                <p class="m-0 fw-bold text-center">
                ' . $usuarioLogueado .
                    '</p>
                <a href="./logout.php" class="btn btn-danger ">Salir</a>
            </div>';
            } else {
                echo '<form action="./sessions/login.php" method="post" class="d-flex  align-items-center gap-2 m-0 form-login">
                <input type="text" name="user" id="user" placeholder="email" class="form-control">
                <input type="password" name="pass" id="pass" placeholder="password" class="form-control">
                <input type="submit" value="ingresar" class="btn btn-light fw-bold login-button" name="ingresar" id="ingresar">
            </form>';
            };
            ?>
        </div>
    </div>
</nav>