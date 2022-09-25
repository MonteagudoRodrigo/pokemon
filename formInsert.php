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
        include("sections/header.php");
        ?>
    </header>
    <main>
        <?php
        if (isset($_COOKIE["PokemonExistente!"])) {
            setcookie("PokemonExistente!", 1, time() - (86400 * 15));
            echo '<script>
                alert("El número/pokemon ya existe por favor agregue otro");
            </script>';
        }
        ?>
        <section>
            <div class="modal-dialog">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos del pokemon</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-warning">
                        <form action="cargarPokemon.php" class="d-flex flex-column gap-3" method="post" id="form-insert" name="form-insert" enctype="multipart/form-data">
                            <label for="insertImagen" class="fst-italic">Insertar imagen del pokemon
                                <input type="file" class="form-control" id="insertImagen" name="insertImagen" accept="image/png, image/jpeg">
                            </label>
                            <select class="form-select" id="insertTipo" name="insertTipo">
                                <option disabled selected>Seleccionar tipo</option>
                                <option value="1">Veneno</option>
                                <option value="2">Agua</option>
                                <option value="3">Planta</option>
                                <option value="4">Electrico</option>
                            </select>
                            <input type="text" class="form-control" id="insertNumero" name="insertNumero" placeholder="Agregar número">
                            <input type="text" class="form-control" id="insertNombre" name="insertNombre" placeholder="Agregar nombre">
                            <textarea class="form-control" id="insertDescripcion" name="insertDescripcion" placeholder="Agregar descripción" rows="5" form="form-insert"></textarea>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </section>


    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>