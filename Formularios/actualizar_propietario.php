<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Propietario</title>
    <link rel="stylesheet" href="../css/actualizar_propietario.css">
</head>
<body>
    <div class="container">
        <h2>Actualizar Propietario</h2>
        <form action="../Manejadores/actualizar_propietario_manejo.php" method="POST">
            <label for="id">ID del propietario:</label>
            <input type="text" name="id"><br>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required><br>

            <label for="edad">Edad:</label>
            <input type="text" name="edad" required><br>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required><br>

            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>