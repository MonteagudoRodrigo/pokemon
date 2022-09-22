<?php
if (empty($_POST["ingresar"])) {
    echo '<form action="login.php" method="post" class="d-flex  align-items-center gap-2 m-0">
    <input type="text" name="user" id="user" placeholder="email" class="form-control me-2">
    <input type="password" name="pass" id="pass" placeholder="password" class="form-control me-2">
    <input type="submit" value="ingresar" class="btn btn-success" name="ingresar">
</form>';
}else{
    echo "hola admin";
}
