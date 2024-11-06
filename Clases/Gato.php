<?php
include_once 'Animal.php';

class Gato extends Animal {
    protected string $color;

    // Constructor
    public function __construct($nombre, $edad, $numeroVacunes, $color, $id = 0) {
        parent::__construct($nombre, $edad, $numeroVacunes, $id);
        $this -> color = $color;
    }

    // Getters
    function getColor(): string {
        return $this->color;
    }

    // Setters
    function setColor(string $color){
        $this->color = $color;
    }
}
?>