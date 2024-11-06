<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Animal</title>
    <link rel="stylesheet" href="../css/actualizar_animal.css">
</head>
<body>
    <div class="container">
        <h2>Actualizar Animal</h2>
        <form action="../Manejadores/actualizar_animal_manejo.php" method="POST">
            <label for="id">ID del Animal:</label>
            <input type="number" name="id" required>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="edad">Edad:</label>
            <input type="number" name="edad" required>

            <label for="numero_vaunas">Numero de Vacunas:</label>
            <input type="number" name="numero_vacunas" required>

            <label for="tipo_animal">Tipo de Animal:</label>
            <select type="name" name="tipo_animal" required>
                <option value="">Seleccione un tipo</option>
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
                <option value="Iguana">Iguana</option>
            </select>

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
            
            <input type="submit" value="Actualizar Animal">
        </form>
    </div>
</body>
</html>