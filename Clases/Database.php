<?php
// Maneja la conexión con esta clase
class Database {
    private $host = "localhost:3306"; 
    private $db_name = "veterinaridb";
    private $user = "root";
    private $password = "1234";
    public $conn; // Donde se almacena

    // Método para obtener la conexión
    public function getConnection() {
        $this->conn = null; // Inicializamos con null
        try {
            // Intentamos la conexión usando PDO
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa" . "</br>";
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
        return $this->conn;
        }
    }
?>