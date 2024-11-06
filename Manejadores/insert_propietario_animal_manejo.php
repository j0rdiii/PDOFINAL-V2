<?php
include_once '../Clases/VInsertarDatos.php';
include_once '../Clases/Propietario.php';
include_once '../Clases/Perro.php';
include_once '../Clases/Gato.php';
include_once '../Clases/Iguana.php';

// Verificar si el formulario fue enviado mediante el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Datos del propietario
    $nombrePropietario = trim($_POST['nombre_propietario']);
    $edadPropietario = (int)$_POST['edad_propietario'];
    $telefono = (int)$_POST['telefono'];

    // Validación de los campos del propietario
    if (empty($nombrePropietario) || $edadPropietario <= 0 || $telefono <= 0) {
        echo "Porfavor completa los campos";
        exit;
    }

    // Crear una instancia del objeto Propietario con los datos proporcionados
    $propietario = new Propietario($nombrePropietario, $edadPropietario, $telefono);
    $iDatos = new VInsertarDatos(); // Instancia para manejjar la base de datos

    // Insertar el propietario en la base de datos y obtener su ID
    $propietarioId = $iDatos->insertarPropietario($propietario);

    // Vreificar si hubo algún error al insertar el propietario
    if (!$propietarioId) {
            echo "Error al insertar el propietario";
            exit;
    }

    // Datos del animal
    $nombreAnimal = trim($_POST['nombre_animal']);
    $edadAnimal = (int)$_POST['edad_animal'];
    $numeroVacunas = (int)$_POST['numero_vacunas'];
    $tipoAnimal = $_POST['tipo_animal'];

    // Validación de los campos del animal
    if (empty($nombreAnimal) || $edadAnimal <= 0 || $numeroVacunas < 0 || empty($tipoAnimal)) {
        echo "Por favor completa todos los campos del animal correctamente";
        exit;
    }

    $resultado = false; // Inicializar variable para almacenar el resultado de la inserción del animal

    // Inserta el animal según el tipo especifiacdo
    switch ($tipoAnimal) {
        case 'Perro':
            // Captura y valida la raza del perro
            $raza = trim($_POST['raza']) ?? null; // Se asegura de que se captura la raza
            if (!empty($raza)) {
                // Crear instancia de Perro y realizar la inserción
                $perro = new Perro ($nombreAnimal, $edadAnimal, $numeroVacunas, $raza);
                $resultado = $iDatos->insertarPerro($perro, $propietarioId);
            }
            break;
        case 'Gato':
            // Crear instancia de Gato y realizar la inserción
            $color = trim($_POST['color']) ?? null; // Se asegura de que se captura el color
            if (!empty($color)) {
                // Crear instancia de Gato y realizar la inserción
                $gato = new Gato ($nombreAnimal, $edadAnimal, $numeroVacunas, $color);
                $resultado = $iDatos->insertarGato($gato, $propietarioId);
            }
            break;
        case 'Iguana':
            // Captura y valida la lingitud de la iguana
            $longitud = (float)$_POST['longitud'] ?? null; // Se asegura de que se captura la longitud
            if ($longitud > 0) {
                // Crear instancia de Iguana y realizar la inserción
                $iguana = new Iguana ($nombreAnimal, $edadAnimal, $numeroVacunas, $longitud);
                $resultado = $iDatos->insertarIguana($iguana, $propietarioId);
            }
            break;
        default:
            // Si el tipo de animal es inválido, muestra un mensaje de error
            echo "Tipo de aninmal no válido";
            exit;
    }

    // Verificar si la inserción del animal fue exitosa y mostrar el mensaje correspondiente
    if ($resultado) {
        echo "Propietario y animal registrados con éxito";
    } else {
        echo "Error al registrar el animal";
    }
}
?>