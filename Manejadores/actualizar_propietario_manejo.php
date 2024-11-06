<?php
include_once '../Clases/VInsertarDatos.php';
include_once '../Clases/Propietario.php';

// Verificar si el formulario fue enviado usando el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir y sanitizar los datos del formulario
    $id = (int)$_POST['id'];
    $nombre = $_POST['nombre'];
    $edad = (int)$_POST['edad'];
    $telefono = (int)$_POST['telefono'];

    // Crear una insstancia de la clase Propietario con los datos proporcionados
    $propietario = new Propietario($nombre, $edad, $telefono);

    // Crear una instancia de VInsertarDatos para acceder a los métodos de la base de datos
    $iDatos = new VInsertarDatos();

    // Llamar al método actualizarPropietario para realizar la actualización en la base de datos
    $result = $iDatos->actualizarPropietario($propietario, $id);
    
    // Verificar si la actualizaciób fue exitoso y mostrar el mensaje correspondiente
    if($result) {
        echo "Propietario actualizado con éxito";
    } else {
        echo "Error al actualizar el propietario";
    }
}
?>