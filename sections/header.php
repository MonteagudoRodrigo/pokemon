<?php

if (isset($_POST["ingresar"])) {
    //mysqli_real_scape.... para que el usuario no pueda ingresar inyeccion sql
    $usuario = mysqli_real_escape_string($database->getConexion(), $_POST["user"]);
    $password = mysqli_real_escape_string($database->getConexion(), $_POST["pass"]);

    // $password_encriptada = sha1($password);

    $sql = "SELECT email FROM credenciales WHERE email = '$usuario' AND PASSWORD = '$password'";
    $resultado = $database->getConexion()->query($sql);
    $rows =  $resultado->num_rows;

    if ($rows > 0) {
        $row = $resultado->fetch_assoc();
        $_SESSION["email"] = $row["email"];
        header("Location: admin.php");
    } else {
        echo "<script>
            alert('Usuario o Password incorrecto');
            window.location = 'index.php';
            </script>";
    }
}


?>

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <img src="./assets/images/logo-pokebola.png" alt="" width="50" />
        <a class="navbar-brand ms-4 fw-bold" href="#">Pokedex ♥</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

            </ul>
            <form action="../sessions/login.php" method="POST" class="d-flex  align-items-center gap-2 m-0">
                <input type="text" name="user" id="user" placeholder="email" class="form-control me-2">
                <input type="password" name="pass" id="pass" placeholder="password" class="form-control me-2">
                <input type="submit" value="ingresar" class="btn btn-light fw-bold" name="ingresar" id="ingresar">
            </form>
        </div>
    </div>
</nav>