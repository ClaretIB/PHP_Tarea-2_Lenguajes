<?php

class Reserva {
    public $nombrePersona;
    public $email;
    public $tarjeta;
    public $fecha;
    public $hora;
    public $total;
    
    function __construct() {
        
    }

    function getNombrePersona() {
        return $this->nombrePersona;
    }

    function getEmail() {
        return $this->email;
    }

    function getTarjeta() {
        return $this->tarjeta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getTotal() {
        return $this->total;
    }

    function setNombrePersona($nombrePersona) {
        $this->nombrePersona = $nombrePersona;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTarjeta($tarjeta) {
        $this->tarjeta = $tarjeta;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setTotal($total) {
        $this->total = $total;
    }


}
