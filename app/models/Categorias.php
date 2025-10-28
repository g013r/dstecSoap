<?php

class Categorias
{
    private $id_categoria;
    private $nombre;
    private $descripcion;
    private $estado;
    // Database connection
    private $db;
    
    public function __construct()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/dstecSoap/app/config/Database.php';
        $database = \app\config\Database::getInstance();
        $this->db = $database->getConnection();
    }
    
    // Getters
    public function getId()
    {
        return $this->id_categoria;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    public function getEstado()
    {
        return $this->estado;
    }
    
    // Setters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    
    // CREATE - Crear nueva categoría
    public function crear($datos)
    {
        try {
            $sql = "INSERT INTO categorias (nombre, descripcion, estado) VALUES (:nombre, :descripcion, :estado)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':nombre' => $datos['nombre'],
                ':descripcion' => $datos['descripcion'],
                ':estado' => $datos['estado']
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error al crear categoría: " . $e->getMessage());
            return false;
        }
    }
    
    // READ - Obtener todas las categorías
    public function obtenerTodos()
    {
        try {
            $sql = "SELECT * FROM categorias WHERE estado = 1 ORDER BY id_categoria DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener categorías: " . $e->getMessage());
            return [];
        }
    }
    
    // READ - Obtener categoría por ID
    public function obtenerPorId($id)
    {
        try {
            $sql = "SELECT * FROM categorias WHERE id_categoria = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener categoría: " . $e->getMessage());
            return false;
        }
    }
    
    // Contar productos por categoría
    public function contarProductos($id_categoria)
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM productos WHERE id_categoria = :id_categoria AND estado = 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':id_categoria' => $id_categoria]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'];
        } catch (PDOException $e) {
            error_log("Error al contar productos: " . $e->getMessage());
            return 0;
        }
    }
}
