<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//db.onlinewebfonts.com/c/f4d1593471d222ddebd973210265762a?family=Pokemon" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./assets/styles/style.css?v=<?php echo time(); ?>">
    <title>Pokedex</title>
</head>

<body>

    <header>
        <?php
        session_start();
        include("header.php");
        ?>
    </header>

    <main>
        <section>
            <div>
                <form class="mt-2 input-group" action="buscarPokemon.php" method='POST' enctype='text/plaine'>
                    <input class="form-control rounded" type="search" id="busqueda" placeholder="Search" name="busqueda" aria-label="Search" aria-describedby="search-addon" />
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>

            <?php
            if (isset($_COOKIE["pokemonNoEncontrado"])) {
                setcookie("pokemonNoEncontrado", 1, time() - (86400 * 15));
                echo "<p>
                Pokemon no encontrado
            </p>";
            }
            if (isset($_COOKIE["PokemonAgregado"])) {
                setcookie("PokemonAgregado", 1, time() - (86400 * 15));
                echo '<script>
                        alert("El pokemon ha sido agregado exitosamente!);
                    </script>';
            }
            ?>

            <table class="table table-bordered text-center mt-4 bg-light">
                <thead>
                    <tr class="table-success">
                        <th scope="col">Imagen</th>
                        <th scope="col" class="pokemon-column-logout">Tipo</th>
                        <th scope="col" class="pokemon-column-info">Numero</th>
                        <th scope="col">Nombre</th>
                        <?php
                        if (isset($_SESSION["pokelog"])) {
                            echo '<th scope="col">Accion</th>';
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>

        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>