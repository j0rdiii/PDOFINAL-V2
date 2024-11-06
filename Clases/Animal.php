<?php
class Animal {
    public int $id;
    public string $nombre;
    public int $edad;
    public int $numeroVacunes;
    
    // Constructor
    function __construct($nombre, $edad, $numeroVacunes, $id = 0) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->numeroVacunes = $numeroVacunes;
    }

    // Getters
    function getId(): int {
        return $this->id;
    }

    function getNombre(): String {
        return $this -> nombre;
    }

    function getEdad(): Int {
        return $this -> edad;
    }

    function getNumeroVacunes(): Int {
        return $this -> numeroVacunes;
    }

    // Setters
    function setNombre($nombre) {
        $this -> nombre = $nombre;
    }

    function setEdad($edad) {
        $this -> edad = $edad;
    }

    function setNumeroVacunes($numeroVacunes) {
        $this -> numeroVacunes = $numeroVacunes;
    }
}
?>