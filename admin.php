<?php

include("conexion/ConexionDatabase.php");

$conn = new ConexionDatabase();
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: index.php");
}

//OBTENER EL USUSARIO PARA HEADER
$nameUser = $_SESSION["email"];
$sql = "SELECT email FROM credenciales WHERE email = '$nameUser'";
$result = $conn->getConexion()->query($sql);
$row = $result->fetch_assoc();

//OBTENER ARRAY DE POKEMONES
$sqlPokemon = "SELECT * FROM Pokemon";
$resultPokemon = $conn->getConexion()->query($sqlPokemon);
$allPokemon = $resultPokemon->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/styles/style.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <img src="./assets/images/logo-pokebola.png" alt="" width="50" />
            <a class="navbar-brand ms-4 fw-bold" href="#">Pokedex ♥</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                </ul>
                <div class="d-flex justify-content-between menu-info-admin">
                    <img src="./assets/images/ash.png" alt="" width="60">
                    <p class="d-flex align-items-center m-0 fw-bold text-center"><?php
                                                                        echo utf8_decode($row["email"]);
                                                                        ?></p>
                    <a href="./logout.php" class="btn btn-danger ms-2">Salir</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <section class="mt-4">
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="table-warning">
                        <th scope="col" class="pokemon-column-info">Imagen</th>
                        <th scope="col" class="pokemon-column-info">Tipo</th>
                        <th scope="col">Numero</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($allPokemon as $item) {
                        $imagen = $item["imagen"];
                        $tipo = "Random";
                        $numero = $item["identificador"];
                        $nombre = $item["nombre"];
                        echo "<tr>
                                <th class='pokemon-column-info'>$imagen</th>
                                <td class='pokemon-column-info'>$tipo</td>
                                <td>$numero</td>
                                <td>$nombre</td>
                                <td>
                                    <div class='d-flex justify-content-center gap-2'>
                                        <button class='btn btn-success'>Editar</button>
                                        <button class='btn btn-danger'>Borrar</button>
                                    </div>
                                </td>
                                </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <section>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar nuevo pokemon
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos del pokemon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    include("./sections/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>