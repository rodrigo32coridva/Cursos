<?php
require_once '../../app/models/Curso.php';

class CursoController {

    private $curso;

    public function __construct() {
        $this->curso = new Curso();  
    }
    public function getById() {
      if (isset($_GET['idcurso']) && !empty($_GET['idcurso']) && is_numeric($_GET['idcurso'])) {
          $idcurso = $_GET['idcurso'];
          $curso = $this->curso->findById($idcurso);  
  
          if ($curso) {
              echo json_encode(["success" => true, "curso" => $curso]);
          } else {
              echo json_encode(["success" => false, "message" => "Curso no encontrado."]);
          }
      } else {
          echo json_encode(["success" => false, "message" => "ID de curso no proporcionado o inválido."]);
      }
  }

  public function update() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idcurso'])) {
        $idcurso = $_POST['idcurso'];
        
        $cursoExistente = $this->curso->findById($idcurso);
        if (!$cursoExistente) {
            echo json_encode(["success" => false, "message" => "El curso no existe."]);
            return;
        }

        $categoria_id = $_POST['categorias'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $duracion = $_POST['duracion'];
        $estado = $_POST['estado'] == 'S' ? 'activo' : 'inactivo';

        $curso = new Curso($idcurso, $categoria_id, $nombre, $descripcion, $precio, $duracion, $estado);
        if ($curso->update()) {
            echo json_encode(["success" => true, "message" => "Curso actualizado correctamente."]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al actualizar el curso."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Datos no válidos."]);
    }
}

}
?>
