<?php

class Movimientos {
    public $fecha;
    public $motivo;
    public $monto;
    public $tipo;
    
    function __construct() {
        
    }
    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

        function getFecha() {
        return $this->fecha;
    }

    function getMotivo() {
        return $this->motivo;
    }

    function getMonto() {
        return $this->monto;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setMotivo($motivo) {
        $this->motivo = $motivo;
    }

    function setMonto($monto) {
        $this->monto = $monto;
    }


}
