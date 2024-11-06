<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Propietario y Animal</title>
    <link rel="stylesheet" href="../css/insert_propietario_animal.css">
</head>
<body>
    <div class="container">
        <h2>Registrar Propietario y Animal</h2>
        
        <form action="../Manejadores/insert_propietario_animal_manejo.php" method="POST">
            <h3>Datos del Propietario</h3>
            <label for = "nombre_propietario">Nombre del Propietario:</label>
            <input type="text" name="nombre_propietario" required><br>

            <label for = "edad_propietario">Edad del Propietario:</label>
            <input type="number" name="edad_propietario" required><br>

            <label for = "telefono">Teléfono del Propietario:</label>
            <input type="number" name="telefono" required><br>

            <h3>Datos del Animal</h3>
            <label for = "nombre_animal">Nombre del Animal:</label>
            <input type="text" name="nombre_animal" required><br>

            <label for = "edad_animal">Edad del Animal:</label>
            <input type="number" name="edad_animal" required><br>

            <label for = "numero_vacunas">Número de Vacunas: </label>
            <input type="number" name="numero_vacunas" required><br>

            <!-- Selección del tipo del Animal -->
            <label for="tipo_animal">Tipo Animal:</label>
            <select name="tipo_animal" required>
                <option value="">Seleccione un tipo</option>
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
                <option value="Iguana">Iguana</option>
            </select><br>

            <h3>Detalles especificos del Animal</h3>
            <div id="campos_adicionales">
                <p>"Solo para Perros"</p>
                <label for="raza">Raza del Perro:</label>
                <input type="text" name="raza"><br>

                <p>"Solo para Gatos"</p>
                <label for="color">Color del gato:</label>
                <input type="text" name="color"><br>

                <p>"Solo para Iguanas"</p>
                <label for="longitud">Longitud de la iguana</label>
                <input type="number" step="0,01" name="longitud"><br>
            </div>

            <input type="submit" value="Registrar Propietario y Animal">
        </form>
    </div>
</body>
</html>