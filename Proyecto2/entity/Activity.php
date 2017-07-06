<?php

class Activity {
    public $name;
    public $hour;
    public $date;
    
    function __construct() {
        
    }
    
    function getName() {
        return $this->name;
    }

    function getHour() {
        return $this->hour;
    }

    function getDate() {
        return $this->date;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setHour($hour) {
        $this->hour = $hour;
    }

    function setDate($date) {
        $this->date = $date;
    }


}
