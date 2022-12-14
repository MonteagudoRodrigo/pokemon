<?php
include_once("./model/Pokemon.php");
class ConexionDatabase
{
    private $config;
    private $conexion;

    public function __construct()
    {
        $this->config = parse_ini_file("C:/xampp/htdocs/pokemon/config/config.ini");
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
        $sql = "SELECT * from Pokemon p JOIN Tipo_pokemon tp ON p.tipo=tp.id ORDER BY p.identificador; ";
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
        $stmt->bind_param("ssii", $input, $input, $input, $input);
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
        $sql = "DELETE FROM Pokemon WHERE identificador = ? ";
        $comando = $this->conexion->prepare($sql);
        $comando->bind_param("i", $input);
        $comando->execute();
        return $comando->get_result();
    }


    public function modificarPokemonAll($input, $nombre, $imagen, $descripcion, $tipo)
    {
        $sql = "UPDATE Pokemon SET identificador = ? ,  nombre = ? , imagen = ? , descripcion = ? , tipo = ?  WHERE identificador= ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("isssii",  $input, $nombre, $imagen, $descripcion, $tipo, $input);
        $stmt->execute();
        $mensaje = "el cambia a sido completado!";
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

    public function getUsuarios()
    {
        $sql = "SELECT * from credenciales";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function existeUsuario($user, $pass)
    {
        $usuarios = $this->getUsuarios();
        foreach ($usuarios as $usuario) {
            if ($usuario["email"] == $user && $usuario["password"] == $pass) {
                return true;
            }
        }
        return false;
    }
}
