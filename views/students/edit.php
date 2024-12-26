<?php
require_once './model/Student.php';

//verificamos si el parametro 'id esta en la URL
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $student = Student::findById($id);

}else {
    echo 'ID no proporcionado';
    exit;
}

// Si el estudiante no existe, mostramos un mensaje
if ($student === null) {
    echo "Estudiante no encontrado.";
    exit;
}
// Procesamos el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student->setName($_POST['name']);
    $student->setAge($_POST['age']);
    $student->setGrade($_POST['grade']);

    // Guardamos los cambios
    $student->save();

    // Redirigimos al listado o a otra página
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
</head>
<body>

    <h1>Editar Estudiante</h1>
    <form method="POST">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="<?= $student->getName(); ?>" required>
        <br>

        <label for="age">Edad:</label>
        <input type="number" id="age" name="age" value="<?= $student->getAge(); ?>" required>
        <br>

        <label for="grade">Grado:</label>
        <input type="text" id="grade" name="grade" value="<?= $student->getGrade(); ?>" required>
        <br>

        <button type="submit">Guardar Cambios</button>
    </form>

    <!-- Enlace para volver -->
    <a href="?action=show&id=<?= $student->getId(); ?>">Cancelar</a>

</body>
</html>