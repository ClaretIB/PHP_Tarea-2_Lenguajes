<?php

class Acta {
    public $titulo;
    public $descripcion;
    public $fecha;
    public $nombre;
    
    function __construct() {
        
    }
    
    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}
