<?php
include_once("./model/Pokemon.php");
class ConexionDatabase
{
    private $config;
    private $conexion;

    public function __construct()
    {
        $this->config = parse_ini_file("C:/xampp/htdocs/Pokemon/config/config.ini");
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

    public function query($sql)
    {
        $respuesta = $this->conexion->query($sql);
        return $respuesta->fetch_all(MYSQLI_ASSOC);
    }

    public function execute($sql)
    {
        $this->conexion->query($sql);
    }

    public function getConexion()
    {
        return $this->conexion;
    }

    public function eliminarPokemon($input)
    {
        $sql = "DELETE  from Pokemon WHERE id= ? ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $input);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function editarPokemon($input)
    {
        $sql = "UP";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $input);
        $stmt->execute();
        return $stmt->get_result();
    }


    public function existePokemon($identificador, $nombre)
    {
        $pokemones = $this->getPokemon();
        foreach ($pokemones as $pokemon) {
            if ($pokemon["identificador"] == $identificador || $pokemon["nombre"] == $nombre) {
                return true;
            }
        }
        return false;
    }

    public function agregarPokemon($identificador, $imagen, $nombre, $tipo, $descripcion)
    {
        // $mensaje = "";
        // if ($this->buscarPokemon($identificador) == $identificador) {
        //     $mensaje = "Pokemon existente!";
        //     return $mensaje;
        // } else {

        $newPokemon = new Pokemon($identificador, $imagen, $nombre, $tipo, $descripcion);
        $sql = "INSERT INTO pokemon(identificador , imagen, nombre, tipo, descripcion) 
            VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $ident = $newPokemon->getIdentificador();
        $img = $newPokemon->getImagen();
        $nomb = $newPokemon->getNombre();
        $tip = $newPokemon->getTipo();
        $desc = $newPokemon->getDescripcion();
        $stmt->bind_param("issis",  $ident,  $img, $nomb, $tip, $desc);
        $stmt->execute();
        $mensaje = "Pokemon creado!";
       
    }
}
