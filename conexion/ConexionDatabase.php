<?php

class ConexionDatabase
{
    private $config;
    private $conexion;

    public function __construct()
    {
        $this->config = parse_ini_file("./config/config.ini");
        $config = $this->config;
        $this->conexion = new mysqli($config["host"], $config["usuario"], $config["clave"], $config["base"]);
    }

    public function probarBase()
    {
        if ($this->conexion->connect_error) {
            die("Error !!!! " . $this->conexion->connect_error);
        }
    }

    public function buscarPokemon()
    {
        $sql = "SELECT * from Pokemon where identificador = ?;";
        $identificador = 1;
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $identificador);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function query($sql) {
        $respuesta = $this->conexion->query($sql);
        return $respuesta->fetch_all(MYSQLI_ASSOC);
    }

    public function execute($sql) {
        $this->conexion->query($sql);
    }

    public function getConexion()
    {
        return $this->conexion;
    }

    
}

