<?php
include_once 'Animal.php';

class Iguana extends Animal {
    protected float $longitud;

    // Constructor
    public function __construct($nombre, $edad, $numeroVacunes, $longitud, $id = 0) {
        parent::__construct($nombre, $edad, $numeroVacunes, $id);
        $this -> longitud = $longitud;
    }

    // Getters
    function getLongitud():float {
        return $this -> longitud;
    }

    // Setters
    function setLongitud(float $longitud):void {
        $this -> longitud = $longitud;
    }
}
?>