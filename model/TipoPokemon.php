<?php

class TipoPokemon
{
    private $id;
    private $descripcion;
    private $imagenTipo;

    public function __construct($id, $descripcion, $imagenTipo)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->imagenTipo = $imagenTipo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getImagenTipo()
    {
        return $this->imagenTipo;
    }

    public function setImagenTipo($imagenTipo): void
    {
        $this->imagenTipo = $imagenTipo;
    }



}