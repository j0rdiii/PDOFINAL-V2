<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Propietarios</title>
    <link rel="stylesheet" href="../css/ver_propietarios.css">
</head>
<body>
    <div class="container">
        <h2>Lista de Propietarios</h2>
            <ul>
                <?php
                include_once '../Clases/VInsertarDatos.php';

                $datos = new VInsertarDatos();

                $propietarios = $datos->obtenerTodosLosPropietarios();

                // Verifica si hay propietarios en la base de datos
                if (!empty($propietarios)) {
                    // Recorre el array $propietarios y muestra cada uno
                    foreach ($propietarios as $propietario) {
                        // Muestra los datos generales del propietario
                        echo "<li>ID: " . $propietario['id'] .
                        " - Nombre: " . $propietario['nombre'] . 
                        " - Edad: " . $propietario['edad'] . 
                        " - Teléfono: " . $propietario['telefono'] . "</li>";
                    }
                } else {
                    echo "<li>No se encontraron propietarios.</li>";
                }
                ?>
            </ul>
    </div>
</body>
</html>