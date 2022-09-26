<?php
$identificador =  isset($_GET['param']) ? $_GET['param'] : "";
session_start();
if(isset($_SESSION["pokelog"])){
    echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//db.onlinewebfonts.com/c/f4d1593471d222ddebd973210265762a?family=Pokemon" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../assets/styles/style.css">
    <title>Pokedex</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <img src="http://localhost/pokedex2/pokemon/assets/images/logo-pokebola.png" alt="" width="50" />
        <a class="ms-4 fw-bold fst-italic logotipe" href="../index.php">Pokedex</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

            </ul>
';
    if (isset($_SESSION["pokelog"])) {
        $usuarioLogueado = $_SESSION["pokelog"];
        echo '<div class="d-flex justify-content-between menu-info-admin gap-2 align-items-center">
                <img src="../assets/images/ash.png" alt="" width="60" class="menu-info-admin__item">
                <p class="m-0 fw-bold text-center menu-info-admin__item">
                ' . $usuarioLogueado . '</p>
                <a href="../sessions/logout.php" class="btn btn-danger menu-info-admin__item">Salir</a>
                </div>';
    } else {
        echo '<form action="./sessions/login.php" method="post" class="d-flex  align-items-center gap-2 m-0 form-login">
                <input type="text" name="user" id="user" placeholder="email" class="form-control">
                <input type="password" name="pass" id="pass" placeholder="password" class="form-control">
                <input type="submit" value="ingresar" class="btn btn-light fw-bold login-button" name="ingresar" id="ingresar">
                </form>';
    };
    echo '   </div>
    </div>

</nav>
';
    echo '
    <main>';
    if (isset($_COOKIE["PokemonExistente!"])) {
        setcookie("PokemonExistente!", 1, time() - (86400 * 15));
        echo '<script>
                alert("El número/pokemon ya existe por favor agregue otro");
            </script>';
    }
    if (isset($_COOKIE["PokemonAgregado"])) {
        setcookie("PokemonAgregado", 1, time() - (86400 * 15));
        echo '
                <script>
                    alert("El pokemon ha sido agregado exitosamente!);
                    window.location = "";
                </script>;
           ';
        header("Location: index.php");
    }

    echo "<section>
            <div class='modal-dialog'>
                <div class='modal-content bg-light'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Ingrese los nuevos datos del pokemon</h5>
                    </div>
                    <div class='modal-body bg-warning'>
                        <form action='../modificarPokemon.php/?identificador=$identificador' class='d-flex flex-column gap-3' method='post' id='form-insert' name='form-insert' enctype='multipart/form-data'>
                            <label for='insertImagen' class='fst-italic'>Insertar imagen del pokemon
                                <input type='file' class='form-control' id='insertImagen' name='insertImagen' accept='image/png, image/jpeg'>
                            </label>
                            <select class='form-select' id='insertTipo' name='insertTipo'>
                                <option disabled selected>Seleccionar tipo</option>
                                <option value='1'>Veneno</option>
                                <option value='2'>Agua</option>
                                <option value='3'>Planta</option>
                                <option value='4'>Electrico</option>
                            </select>                            
                            <input type='text' class='form-control' id='insertNombre' name='insertNombre' placeholder='Agregar nombre'>
                            <textarea class='form-control' id='insertDescripcion' name='insertDescripcion' placeholder='Agregar descripción' rows='5' form='form-insert'></textarea>
                    </div>
                    <div class='modal-footer bg-light'>
                        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'><a class='btn-danger' href='../index.php'>Cancelar</a></button>
                        <button type='submit' class='btn btn-primary'>Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </section>


    </main>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'>
    </script>
</body>

</html>";

}else{
    header("location: index.php");
}
