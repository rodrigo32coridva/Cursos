<?php
require_once 'C:/xampp/htdocs/tienda-app/Curso.app/config/Database.php';

class Curso {
    public $idcurso;
    public $idcategoria;
    public $nombre;
    public $descripcion;
    public $precio;
    public $duracion;
    public $estado;

    public function __construct($idcurso = null, $idcategoria = null, $nombre = null, $descripcion = null, $precio = null, $duracion = null, $estado = null) {
        $this->idcurso = $idcurso;
        $this->idcategoria = $idcategoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->duracion = $duracion;
        $this->estado = $estado;
    }

    public function findAll() {
        $db = Database::getConexion();
        $query = "SELECT * FROM cursos";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($idcurso) {
        $db = Database::getConexion();
        $query = "SELECT * FROM cursos WHERE idcurso = :idcurso";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':idcurso', $idcurso);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save() {
        $db = Database::getConexion();
        $query = "INSERT INTO cursos (idcategoria, nombre, descripcion, precio, duracion, estado) VALUES (:idcategoria, :nombre, :descripcion, :precio, :duracion, :estado)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':idcategoria', $this->idcategoria);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':duracion', $this->duracion);
        $stmt->bindParam(':estado', $this->estado);
        return $stmt->execute();
    }

    public function update() {
        $db = Database::getConexion();
        $query = "UPDATE cursos SET idcategoria = :idcategoria, nombre = :nombre, descripcion = :descripcion, precio = :precio, duracion = :duracion, estado = :estado WHERE idcurso = :idcurso";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':idcurso', $this->idcurso);
        $stmt->bindParam(':idcategoria', $this->idcategoria);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':duracion', $this->duracion);
        $stmt->bindParam(':estado', $this->estado);
        return $stmt->execute();
    }

    public function delete($idcurso) {
        $db = Database::getConexion();
        $query = "DELETE FROM cursos WHERE idcurso = :idcurso";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':idcurso', $idcurso);
        return $stmt->execute();
    }
}
?>
