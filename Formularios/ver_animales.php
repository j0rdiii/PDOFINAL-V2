<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Animales</title>
    <link rel="stylesheet" href="../css/ver_animales.css">
</head>
<body>
    <div class="container">
        <h2>Lista de Animales</h2>
            <ul>
                <?php
                include_once "../Clases/VInsertarDatos.php";

                $datos = new VInsertarDatos();
                $animales = $datos->obtenerTodosLosAnimales();

                // Verifica si hay animales en la base de datos
                if (!empty($animales)) {
                    // Recorre el array $animales y muestra cada uno
                    foreach ($animales as $animal) {
                        // Muestra los datos generales del animal
                        echo "<li>ID: " . $animal['id'] . 
                        " - Nombre: " . $animal['nombre'] . 
                        " - Edad: " . $animal['edad'] .
                        " - Vacunas: " . $animal['numeroVacunes'] .
                        " - Tipo: " . $animal['tipo'] . "<br>";
                        
                        if ($animal['tipo'] == 'Perro') {
                            echo 'Raza: ' . $animal['raza'] . "<br>";
                        } elseif ($animal['tipo' ] == 'Gato') {
                            echo 'Color: ' . $animal['color'] . "<br>";
                        } elseif ($animal['tipo' ] == 'Iguana') {
                            echo 'Longitud: ' . $animal['longitud'] . "<br>"; 
                        }
                        echo "Propietario: " . $animal['propietario_nombre'] . "<br>";
                        echo "Edad del propietario: " . $animal['propietario_edad'] . "<br>";
                        echo "Telefono: " . $animal['propietario_telefono'] . "<br>";
                    }
                } else {
                    echo "No hay animales registrados.";
                }
                ?>
            </ul>
    </div>
</body>
</html>