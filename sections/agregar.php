<section>
    <?php
    if (isset($_SESSION["pokelog"])) {
        echo '<a href="formInsert.php" class="btn btn-primary" >
                Agregar nuevo pokemon
            </a>
            ';
    }
    ?>
</section>