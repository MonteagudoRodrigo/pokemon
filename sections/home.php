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
<header>
    <?php
    include("header.php");
    ?>
</header>
<body>

<main>
 <section>
    <div>
        <form class="mt-2 input-group" action="buscarPokemon.php" method='POST' enctype='text/plaine'>
            <input class="form-control rounded" type="search" id="busqueda" placeholder="Search"
                   name="busqueda" aria-label="Search" aria-describedby="search-addon" required />
            <button type="submit" class="btn btn-outline-primary">Buscar</button>
        </form>
    </div>



    <table class="table table-bordered text-center mt-4">
        <thead>
        <tr class="table-success">
            <th scope="col" class="pokemon-column-info">Imagen</th>
            <th scope="col" class="pokemon-column-info">Tipo</th>
            <th scope="col">Numero</th>
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

    <section>
        <?php
        if (isset($_SESSION["pokelog"])) {
            echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar nuevo pokemon
            </button>
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
            </div>';
        }
        ?>
    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>

