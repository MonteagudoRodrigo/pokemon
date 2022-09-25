<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//db.onlinewebfonts.com/c/f4d1593471d222ddebd973210265762a?family=Pokemon" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/styles/style.css?v=<?php echo time(); ?>">
    <title>Pokedex</title>
<body>
<header>
    <?php
    include("sections/header.php");
    ?>
</header>
<p>funciona la concha de tu madre</p>
<?
$dale = $_GET['param'];
echo ($dale);
?>
</body>
<?php
include("sections/footer.php");
?>
