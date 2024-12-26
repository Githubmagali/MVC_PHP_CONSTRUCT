<?php
require_once './controller/StudentController.php';

$controller = new StudentController();

// Controlar la acción de la URL
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'show' && isset($_GET['id'])){
        $controller->show($_GET['id']); //mostrar estudiante por ID
    }elseif ($_GET['action'] === 'edit' && isset($_GET['id'])) {
        $controller->edit($_GET['id']);  // Editar estudiante por ID
    } elseif ($_GET['action'] === 'create') {
        $controller->create(); // Acción para crear un nuevo estudiante
    } elseif ($_GET['action'] === 'store') {
        $controller->store(); // Acción para guardar el nuevo estudiante
    } else {
        $controller->index();  // Acción predeterminada: mostrar la lista de estudiantes
    }
}else {
    $controller->index();  // Acción predeterminada si no hay parámetros

}

