<?php
include_once '../Clases/VInsertarDatos.php';

// Verificar si la solicitud fue enciada a través del método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el ID del animal a eliminar desde el formulario
    $id = $_POST['id'];

    // Crear una instancia de la clase VInsertarDatos para acceder a los métodos de la base de datos
    $animalI = new VInsertarDatos();

    // Llamar al método eliminarAnimal para borrar el animal con el ID especificado
    $result = $animalI->eliminarAnimal($id);

    // Verificar si la eliminación fue exitosa y mostrar un mensaje apropiado
    if ($result) {
        echo "Animal eliminado con éxito.";
    } else {
        echo "Error al eliminar el animal";
    }
}
?>