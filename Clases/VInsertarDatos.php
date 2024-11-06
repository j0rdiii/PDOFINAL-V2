<?php
include_once '../Clases/Propietario.php';
include_once '../Clases/Animal.php';
include_once '../Clases/Perro.php';
include_once '../Clases/Gato.php';
include_once '../Clases/Iguana.php';
include_once '../Clases/Database.php';

// Clase para insertar y manejar datos en la base de datos
class VInsertarDatos {
    private $conn; // Variable para almacenar la conexión de la base de datos

    // Constructor: establece la conexión a la base de datos al crear una instancia
    public function __construct() {
        $database = new Database(); // Crea una instancia de la clase Database
        $this->conn = $database->getConnection(); // Obtiene la conexión

        // Verifica si la conexión falla o no
        if ($this->conn === null) {
            die("Error: No se pudo conectar a la base de datos.");
        }
    }

    // Método para inserir un propietario en la tabla propietario
    public function insertarPropietario(Propietario $propietario) {
        try {

            // Consulta SQL para insertar datos de propietario
            $query = "INSERT INTO Propietario (nombre, edad, telefono) VALUES (:nombre, :edad, :telefono)";
            $stmt = $this->conn->prepare($query);

            // Obtiene los datos del propietario a través de los metodos de la clase Propietario
            $nombre = $propietario->getNombre();
            $edad = $propietario->getEdad();
            $telefono = $propietario->getTelefono();

            // Asigna los valores a los parámetros de la consulta SQL
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':edad', $edad, PDO::PARAM_INT);
            $stmt->bindParam(':telefono', $telefono, PDO::PARAM_INT);

            // Ejecuta la consulta y devuelve el último id inserido si tiene éxito
            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
            } else {
                echo "Error en la inserción del propietario: " . implode(", ", $stmt->errorInfo());
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al insertar propietario: " . $e->getMessage();
            return false;
        }
    }

    // Método para asignar un propietario a un animal específico
    public function asignarPropietarioiAAnimal(int $animalId, int $propietarioId) {
        try {
            // Consulta SQL para actualizar el propietario de un animal específico
            $query = "UPDATE Animal SET propietario_id = :propietario_id WHERE id = :animal_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':propietario_id', $propietarioId, PDO::PARAM_INT);
            $stmt->bindParam(':animal_id', $animalId, PDO::PARAM_INT);

            return $stmt->execute(); // Devuelve true si la ejecución es exitosa
        } catch (PDOException $e) { 
            echo "Error al asignar propietario al animal: " . $e->getMessage();
            return false;
        }
    }

    // Método para actualizar un propietario en la tabla propietario
    public function actualizarPropietario(Propietario $propietario, int $id) {
        try {
            // Consulta SQL para actualizar los datos de un propietario específico
            $query = "UPDATE Propietario SET nombre = :nombre, edad = :edad, telefono = :telefono WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $nombre = $propietario->getNombre();
            $edad = $propietario->getEdad();
            $telefono = $propietario->getTelefono();

            // Asigna los valores a los parámetros de la consulta
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':edad', $edad, PDO::PARAM_INT);
            $stmt->bindParam(':telefono', $telefono, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar propietario: " . $e->getMessage();
            return false;
        }
    }

    // Método para eliminar un propietario en la tabla propietario
    public function eliminarPropietario(int $id) {
        try {
            // Consulta SQL para eliminar un propietario específico
            $query = "DELETE FROM Propietario WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar propietario: " . $e->getMessage();
            return false;
        }
    }

    // Método para obtener todos los propietarios
    public function obtenerTodosLosPropietarios() {
        try {
            // Consulta SQL para obtener todos los propietarios
            $query = "SELECT id, nombre, edad, telefono FROM Propietario";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener propietarios: " . $e->getMessage();
            return[];
        }
    }

    // Método para inserir un animal en la tabla animal
    public function insertarAnimal(Animal $animal, int $propietarioId) {
        try {
            // Consulta SQL para insertar datos de un animal
            $query = "INSERT INTO Animal (nombre, edad, numeroVacunes, propietario_id) VALUES (:nombre, :edad, :numeroVacunes, :propietario_id)";
            $stmt = $this->conn->prepare($query);

            // Obtiene los datos del animal
            $nombre = $animal->getNombre();
            $edad = $animal->getEdad();
            $numeroVacunes = $animal->getNumeroVacunes();

            // Asigna los valores a los parámetros
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':edad', $edad, PDO::PARAM_INT);
            $stmt->bindParam(':numeroVacunes', $numeroVacunes, PDO::PARAM_INT);
            $stmt->bindParam(':propietario_id', $propietarioId, PDO::PARAM_INT);

            // Ejecuta la consulta y devuelve el último id insertado si tiene éxito
            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
            } else {
                echo "Error al insertar animal: " . implode(", ", $stmt->errorInfo());
                return false;
            }
        } catch (PDOException $e) {
                echo "Error al insertar animal: " . $e->getMessage();
                return false;
        }
    }

    //Métodos adicionales (insertarPerro(), insertarGato(), insertarIguana())
    // Estos métodos crean instancias específicas de animales y las insertan en la base de datos

    // Método para insertar un perro
    public function insertarPerro(Perro $perro, int $propietarioId) {
        $animalId = $this->insertarAnimal($perro, $propietarioId); // Inserta el animal general
        if ($animalId) { // Si fue exitoso, se inserta en la tabla específica
            try {
                $query = "INSERT INTO Perro (animal_id, raza) VALUES (:animal_id, :raza)";
                $stmt = $this->conn->prepare($query);

                $raza = $perro->getRaza();
                $stmt->bindParam(':animal_id', $animalId);
                $stmt->bindParam(':raza', $raza);

                return $stmt->execute();
            } catch (PDOException $e) {
                echo "Error al insertar un perro: ". $e->getMessage();
                return false;
            }
        }
        return false;
    }

    // Método para insertar un gato
    public function insertarGato(Gato $gato, int $propietarioId) {
        $animalId = $this->insertarAnimal($gato, $propietarioId);
        if ($animalId) {
            try {
                $query = "INSERT INTO Gato (animal_id, color) VALUES (:animal_id, :color)";
                $stmt = $this->conn->prepare($query);

                $color = $gato->getColor();
                $stmt->bindParam(':animal_id', $animalId);
                $stmt->bindParam(':color', $color);

                return $stmt->execute();
            } catch (PDOException $e) {
                echo "Error al insertar un gato: ". $e->getMessage();
                return false;
            }
        }
        return false;
    }
    

    // Método para insertar una iguana
    public function insertarIguana(Iguana $iguana, int $propietarioId): bool {
        $animalId = $this->insertarAnimal($iguana, $propietarioId);
        if ($animalId) {
            try {
                $query = "INSERT INTO Iguana (animal_id, longitud) VALUES (:animal_id, :longitud)";
                $stmt = $this->conn->prepare($query);

                $longitud = $iguana->getLongitud();
                $stmt->bindParam(':animal_id', $animalId);
                $stmt->bindParam(':longitud', $longitud);

                return $stmt->execute();
            } catch (PDOException $e) {
                echo "Error al insertar un gato: ". $e->getMessage();
                return false;
            }
        }
        return false;
    }

    // Método para obtener todos los animales con su tipo y detalles del propietario
    public function obtenerTodosLosAnimales() {
        try {
            // Consulta SQL para obtener datos de aninmales y detalles adicionales como tipo, propietario y atributos específicos
            $query = "
            SELECT Animal.id, Animal.nombre, Animal.edad, Animal.numeroVacunes,
                    IF(Perro.animal_id IS NOT NULL, 'Perro',
                        IF(Gato.animal_id IS NOT NULL, 'Gato',
                            IF(Iguana.animal_id IS NOT NULL, 'Iguana', 'Desconocido')
                        )
                    ) AS tipo, 
                    Propietario.nombre AS propietario_nombre, 
                    Propietario.edad AS propietario_edad, 
                    Propietario.telefono AS propietario_telefono,
                    Perro.raza,
                    Gato.color,
                    Iguana.longitud
            FROM Animal
            LEFT JOIN Perro ON Animal.id = Perro.animal_id                    
            LEFT JOIN Gato ON Animal.id = Gato.animal_id                    
            LEFT JOIN Iguana ON Animal.id = Iguana.animal_id
            LEFT JOIN Propietario ON Animal.propietario_id = Propietario.id;                    
            ";

            // Prepara y ejecuta la consulta
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            // Devuelve todos los resultados commo un array asociativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) { 
            echo "Error al obtener animales: " . $e->getMessage();
            return[];
        }
    }

    // Método para obtener un animal específico por su ID
    public function obtenerAnimalPorId(int $id) {
        try {
            // Consulta SQL para obtener un animal por su ID
            $query = "SELECT * FROM Animal WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Ejecuta la consulta y retorna un solo registro
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener el animal: " . $e->getMessage();
            return null;
        }
    }


    // Método para actualizar la información básica de un animal en la base de datos
    public function actualizarAnimal(Animal $animal, int $id) {
        try {
            // Consulta SQL para actualizar datos de un animal
            $query = "UPDATE Animal SET nombre = :nombre, edad = :edad, numeroVacunes = :numeroVacunes WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            // Obtiene los valores del animal a través de los métodos de la clase Animal
            $nombre = $animal->getNombre();
            $edad = $animal->getEdad();
            $numeroVacunes = $animal->getNumeroVacunes();

            // Asigna los valores obtenidos a los parámetros de la consulta
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':edad', $edad);
            $stmt->bindParam(':numeroVacunes', $numeroVacunes);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Ejecuta la consulta y devuelve true si es exitoso
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar animal: " . $e->getMessage();
            return false;
        }
    }

    // Método para actualizar la raza de un perro específico
    public function actualizarRaza(int $animalId, String $raza) {
        try {
            // Consulta SQL para actualizar la raza de un perro basado en su ID de animal
            $query = "UPDATE Perro SET raza = :raza WHERE animal_id = :animal_id";
            $stmt = $this->conn->prepare($query);

            // Asigna los valores a los parámetros de la consulta
            $stmt->bindParam(":raza", $raza);
            $stmt->bindParam(":animal_id", $animalId, PDO::PARAM_INT);

            // Ejecuta la consulta y devuelve true si es exitosa
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar la raza: ". $e->getMessage();
            return false;
        }
    }

    // Método para actualizar color de un gato específico
    public function actualizarColor(int $animalId, String $color) {
        try {
            // Consulta SQL para actualizar el color de un gato basado en su ID de animal
            $query = "UPDATE Gato SET color = :color WHERE animal_id = :animal_id";
            $stmt = $this->conn->prepare($query);

            // Asigna los valores a los parámetros de la consulta
            $stmt->bindParam(":color", $color);
            $stmt->bindParam(":animal_id", $animalId, PDO::PARAM_INT);

            // Ejecuta la consulta y devuelve true si es exitosa
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar el color: ". $e->getMessage();
            return false;
        }
    }

    // Método para actualizar la longitud de una iguana específica

    public function actualizarLongitud(int $animalId, float $longitud) {
        try {
            // Consulta SQL para actualizar la longitud de una iguana basado en su ID de animal
            $query = "UPDATE Iguana SET longitud = :longitud WHERE animal_id = :animal_id";
            $stmt = $this->conn->prepare($query);

            // Asigna los valores a los parámetros de la consulta
            $stmt->bindParam(":longitud", $longitud);
            $stmt->bindParam(":animal_id", $animalId, PDO::PARAM_INT);

            // Ejecuta la consulta y devuelve true si es exitosa
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar la longitud: ". $e->getMessage();
            return false;
        }
    }

    public function eliminarAnimal(int $id) {
        try {
            // Consulta SQL para eliminar un animal específico
            $query = "DELETE FROM Animal WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            // Asigna el ID del animal al parámetro de la consulta
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Ejecuta la consulta y devuelve true si es exitosa
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar animal: " . $e->getMessage();
            return false;
        }
    }
}
?>