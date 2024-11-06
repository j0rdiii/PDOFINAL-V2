<?php
include_once 'Animal.php';

class Perro extends Animal {
    protected string $raza;

    // Constructor
    public function __construct($nombre, $edad, $numeroVacunes, $raza, $id = 0) {
        parent::__construct($nombre, $edad, $numeroVacunes, $id);
        $this -> raza = $raza;
    }

    // Getters
    function getRaza():string {
        return $this -> raza;
    }

    // Setters
    function setRaza($raza) {
        $this -> raza = $raza;
    }
}
?>