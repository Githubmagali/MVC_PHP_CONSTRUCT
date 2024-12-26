<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Estudiante</title>
</head>
<body>
    <h1>Crear Nuevo Estudiante</h1>
    <form action="?action=store" method="POST">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="age">Edad:</label>
        <input type="number" id="age" name="age" required>
        <br>
        <label for="grade">Grado:</label>
        <input type="text" id="grade" name="grade" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">Volver al Listado</a>
</body>
</html>
