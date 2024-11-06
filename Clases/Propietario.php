<?php
class Propietario {
    private $id;
    private $nombre;
    private $edad;
    private $telefono;

    // Constructor
    public function __construct($nombre, $edad, $telefono = null, $id = 0) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->telefono = $telefono;
    }

    // Getters
    public function getId() { 
        return $this->id; 
    }

    public function getNombre() { 
        return $this->nombre; 
    }

    public function getEdad() { 
        return $this->edad; 
    }
    
    public function getTelefono() { 
        return $this->telefono; 
    }

    // Setters
    public function setId($id) { 
        $this->id = $id; 
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
}
?>