<?php
include_once("TipoPokemon.php");
class Pokemon
{
    private $identificador;
    private $imagen;
    private $nombre;
    private $tipo;
    private $descripcion;

    public function __construct($identificador, $tipo)
    {
        $this->identificador = $identificador;
        $this->tipo = $tipo;

    }

    public function getIdentificador()
    {
        return $this->identificador;
    }

    public function setIdentificador($identificador): void
    {
        $this->identificador = $identificador;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen): void
    {
        $this->imagen = $imagen;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function obtenerDescripcionTipoPokemon(){
        return $this->tipo->getDescripcion();
    }

    public function obtenerImagenTipoPokemon(){
        return $this->tipo->getImagenTipo();
    }

    public function obtenerId(){
        return $this->tipo->getId();
    }

    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }




}