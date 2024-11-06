<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Animal</title>
    <link rel="stylesheet" href="../css/eliminar_animal.css">
</head>
<body>
    <div class="container">
        <h2>Eliminar Animal</h2>
        <form action="../Manejadores/eliminar_animal_manejo.php" method="POST">
            <label for="id">ID del animal a eliminar:</label>
            <input type="number" name="id" required><br>
            <input type="submit" value="Eliminar Animal"><br>
        </form>
    </div>
</body>
</html>