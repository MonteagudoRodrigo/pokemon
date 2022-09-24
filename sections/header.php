<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <img src="./assets/images/logo-pokebola.png" alt="" width="50" />
        <a class="ms-4 fw-bold fst-italic logotipe" href="">Pokedex</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

            </ul>
            <?php
            session_start();
            if (isset($_SESSION["pokelog"])) {
                $usuarioLogueado = $_SESSION["pokelog"];
                echo '<div class="d-flex justify-content-between menu-info-admin gap-2 align-items-center">
                <img src="./assets/images/ash.png" alt="" width="60" class="menu-info-admin__item">
                <p class="m-0 fw-bold text-center menu-info-admin__item">
                ' . $usuarioLogueado .
                    '</p>
                <a href="./sessions/logout.php" class="btn btn-danger menu-info-admin__item">Salir</a>
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