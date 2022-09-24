<?php
// include("conexion/ConexionDatabase.php");

// $database = new ConexionDatabase();
// $database->getConexion();
session_start();
session_destroy();
header("Location: index.php");
