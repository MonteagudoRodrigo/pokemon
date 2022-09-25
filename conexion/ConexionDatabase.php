<?php

class ConexionDatabase
{
    private $config;
    private $conexion;

    public function __construct()
    {
        $this->config = parse_ini_file("D:/xampp/htdocs/pokedex2/pokemon/config/config.ini");
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
        $sql = "SELECT p.id, p.tipo, p.identificador, p.nombre, tp.imagenTipo, p.imagen, p.descripcion FROM Pokemon 
        p JOIN tipo_pokemon tp ON p.tipo=tp.id 
        WHERE p.nombre = ? OR tp.descripcion= ? OR p.identificador = ? or p.id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssii", $input , $input , $input, $input);
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


