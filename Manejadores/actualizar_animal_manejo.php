<?php
include_once '../Clases/VInsertarDatos.php';
include_once '../Clases/Animal.php';

// Verificar si el formulario fue enviado con el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener y sanitizar los datos del formulario
    $id = (int)$_POST['id'];
    $nombre = trim($_POST['nombre']);
    $edad = (int)$_POST['edad'];
    $numeroVacunas = (int)$_POST['numero_vacunas'];
    $tipoAnimal = $_POST['tipo_animal'];

    // Validar que los campos requeridos estén completos y correctos
    if (empty($nombre) || $edad <= 0 || $numeroVacunas < 0) {
        echo "Por favor completa todos los campos correctamente.";
        exit; // Salir si hay errores de validación
    } 

    // Crear una instancia de la clase VInsertarDatos para manejar la actualización
    $animalI = new VInsertarDatos();

    // Crear una instancia del objeto Animal con los datos actualizados
    $animal = new Animal($nombre, (int)$edad, (int)$numeroVacunas);

    // Llamar al método para actualizar la información básica del animal
    if ($animalI->actualizarAnimal($animal, $id)) {
        // Actualizar atributos para actualizar la información básica del animal
        switch ($tipoAnimal) {
            case "Perro":
                // Si es un perro, obtener y actualizar la raza si fue proporcionada
                $raza = $_POST['raza'] ?? null;
                if ($raza) {
                    if ($animalI->actualizarRaza($id, $raza)) {
                        echo "Raza actualizada" . "<br>";
                    } else {
                        echo "Error al actualizar la raza";
                    }
                }
                break;
            case "Gato":
                // Si es un gato, obtener y actualizar el color si fue proporcionada
                $color = $_POST['color'] ?? null;
                if ($color) {
                    if ($animalI->actualizarColor($id, $color)) {
                        echo "Color actualizado" . "<br>";
                    } else {
                        echo "Error al actualizar el color";
                    }
                }
                break;
            case "Iguana":
                // Si es una iguana, obtener y actualizar la longitud si fue proporcionada
                $longitud = $_POST['longitud'] ?? null;
                if ($longitud) {
                    if ($animalI->actualizarLongitud($id, $longitud)) {
                        echo "Longitud actualizada" . "<br>";
                    } else {
                        echo "Error al actualizar la longitud";
                    }
                }
                break; 
        }   
        // Mensaje de éxito si todas las actualizaciones fueron exitosas
        echo "Animal actualizado con éxito";
    } else {
        // Mensaje de error si no se pudo actualizar el animal
        echo "Error al actualizar el animal.";
    }
}
?>