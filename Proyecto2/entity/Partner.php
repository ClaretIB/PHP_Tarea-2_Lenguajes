<?php

class Partner {
    public $identification;
    public $password;
    public  $rol;
    public $fullname;
    public $email;
    public $state;
    public $address;
    
    function __construct() {
        
    }

    function getIdentification() {
        return $this->identification;
    }

    function getPassword() {
        return $this->password;
    }

    function getRol() {
        return $this->rol;
    }

    function getFullname() {
        return $this->fullname;
    }

    function getEmail() {
        return $this->email;
    }

    function getState() {
        return $this->state;
    }

    function getAddress() {
        return $this->address;
    }

    function setIdentification($identification) {
        $this->identification = $identification;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setFullname($fullname) {
        $this->fullname = $fullname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setState($state) {
        $this->state = $state;
    }

    function setAddress($address) {
        $this->address = $address;
    }


}
