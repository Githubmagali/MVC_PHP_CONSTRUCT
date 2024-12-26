<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Estudiantes</title>
</head>
<body>
    <h1>Lista de Estudiantes</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Grado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student->getId(); ?></td>
                    <td><?= $student->getName(); ?></td>
                    <td><?= $student->getAge(); ?></td>
                    <td><?= $student->getGrade(); ?></td>
                    <td><a href="?action=show&id=<?= $student->getId(); ?>">Ver Detalles</a></td>
                  

                </tr>
            <?php endforeach; ?>
            <td><a href="?action=create">Crear Nuevo Estudiante</a></td> 
        </tbody>
    </table>
</body>
</html>
