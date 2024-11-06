<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Propietario</title>
    <link rel="stylesheet" href="../css/eliminar_propietario.css">
</head>
<body>
    <div class="container">
        <h2>Eliminar Propietario</h2>
        <h4>(También darás de baja a todos sus animales)</h4>
        <form action="../Manejadores/eliminar_propietario_manejo.php" method="POST">
            <label for="propietario_id">ID del Propietario a Eliminar:</label>
            <input type="number" name="propietario_id" required>
            <input type="submit" name="Eliminar Propietario" required>
        </form>
    </div>  
</body>
</html>