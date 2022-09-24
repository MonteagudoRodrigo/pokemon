<?php
include_once("./model/Pokemon.php");
include_once("./model/TipoPokemon.php");

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

    public function getPokemon()
    {
        $sql = "SELECT * from Pokemon p JOIN Tipo_pokemon tp ON p.tipo=tp.id;";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function buscarPokemon($input)
    {
        $sql = "SELECT * from Pokemon p JOIN Tipo_pokemon tp ON p.tipo=tp.id WHERE identificador= ?;";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $input);
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


