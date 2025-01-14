<?php 
require_once './model/Student.php';

class StudentController
{

    private $studentModel;

    public function __construct()
    {
        $this->studentModel = new Student(null, null, null, null);
    }

    public function index()
    {
        $students = Student::getAll();
        include './views/students/index.php';
    }

    public function show($id)
    {
        $student = Student::findById($id);
        if($student === null){
            echo 'No se encontro ningun dato.';
            exit;
        }
        include './views/students/show.php';
    }

    public function edit($id)
    {
        require_once './model/Student.php';
        $student = Student::findById($id);
        if ($student === null) {
            echo "Estudiante no encontrado.";
            exit;
        }

         // Procesamos el formulario si se envía por POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $student->setName($_POST['name']);
        $student->setAge($_POST['age']);
        $student->setGrade($_POST['grade']);

        // Guardamos los cambios
        $student->save();

        // Redirigimos al índice después de guardar
        header('Location: index.php');
        exit;
    }
        // Cargamos la vista de edición
        require './views/students/edit.php';

    }

    public function create()
{
    // Cargar la vista para crear un nuevo estudiante
    require './views/students/create.php';
}

public function store()
{
    // Validar los datos enviados por el formulario
    $name = $_POST['name'] ?? null;
    $age = $_POST['age'] ?? null;
    $grade = $_POST['grade'] ?? null;

    if ($name && $age && $grade) {
        // Crear un nuevo estudiante
        $newStudent = new Student(null, $name, $age, $grade);

        // Añadir el estudiante al modelo simulado
        Student::add($newStudent);

        // Redirigir al índice
        header('Location: index.php');
        exit;
    } else {
        echo "Por favor, completa todos los campos.";
    }
}

}

?>