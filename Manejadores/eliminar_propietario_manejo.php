<?php
include_once '../Clases/VInsertarDatos.php';

// Verificar si la solicitud fue enviada usando el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el ID del propietario que se desea eliminar desde los datos del forulario
    $propietarioId = $_POST['propietario_id'];

    // Crear una instancia de la clase VInsertarDatos para acceder a los métodos de la base de datos
    $animalI = new VInsertarDatos();

    // Llamar al método eliminarPropietario para eliminar el propietario con el ID especificado
    $result = $animalI->eliminarPropietario($propietarioId);

    // Verificar si la eliminación fue exitosa y mostrar un mensaje adecuado
    if ($result) {
        echo "Propietario y sus animales eliminados con éxito.";
    } else {
        echo "Error al eliminar el propietario.";
    }
}
?>