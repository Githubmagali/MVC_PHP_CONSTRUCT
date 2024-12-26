<?php 
class Student
{
    private $id;
    private $name;
    private $age;
    private $grade;

      // Simulación de una base de datos como propiedad estática
      private static $students = [
        ['id' => 1, 'name' => 'Juan', 'age' => 20, 'grade' => 'A'],
        ['id' => 2, 'name' => 'Ana', 'age' => 22, 'grade' => 'B'],
        ['id' => 3, 'name' => 'Carlos', 'age' => 21, 'grade' => 'C'],
    ];

    // Constructor para inicializar los datos
    public function __construct($id, $name, $age, $grade)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }

    

    // Método para obtener todos los estudiantes
    public static function getAll()
    {
        // Simulando una base de datos de estudiantes
        return [
            new Student(1, 'Juan', 20, 'A'),
            new Student(2, 'Ana', 22, 'B'),
            new Student(3, 'Carlos', 21, 'C'),
        ];
    }

    // Método para obtener un estudiante por su ID
    public static function findById($id)
    {
        $students = self::getAll();  // Obtener todos los estudiantes
        foreach ($students as $student) {
            if ($student->id == $id) {
                return $student;  // Retornar el estudiante encontrado
            }
        }
        return null;  // Si no se encuentra el estudiante
    }

    public function save()
    {
        // Aquí se actualizaría el registro en la base de datos
        foreach (self::$students as &$s) {
            if ($s['id'] === $this->id) {
                $s['name'] = $this->name;
                $s['age'] = $this->age;
                $s['grade'] = $this->grade;
                return true;
            }
        }
        return false;
    }
    


    // Métodos getter para obtener los atributos del estudiante
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getAge() { return $this->age; }
    public function getGrade() { return $this->grade; }


    // Métodos setter
    public function setName($name) { $this->name = $name; }
    public function setAge($age) { $this->age = $age; }
    public function setGrade($grade) { $this->grade = $grade; }
}
?>
