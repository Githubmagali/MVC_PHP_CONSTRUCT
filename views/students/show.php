<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $student = Student::findById($id);
}else {
    echo 'ID no encontrado';
    exit;
}

if($student === null){
    echo 'Estudiante no encontrado.';
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Estudiante</title>
</head>
<body>
    <h1>Detalles del Estudiante</h1>
    <p><strong>ID:</strong> <?= $student->getId(); ?></p>
    <p><strong>Nombre:</strong> <?= $student->getName(); ?></p>
    <p><strong>Edad:</strong> <?= $student->getAge(); ?></p>
    <p><strong>Grado:</strong> <?= $student->getGrade(); ?></p>

    <td><a href="?action=edit&id=<?= $student->getId(); ?>">Editar</a></td>

    <a href="index.php">Volver a la lista</a>
</body>
</html>
