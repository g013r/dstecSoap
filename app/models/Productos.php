<?php

class Productos
{
    private $id_producto;
    private $id_categoria;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $precio;
    private $stock;
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
        return $this->id_producto;
    }
    public function getCategoriaId()
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
    public function getImagen()
    {
        return $this->imagen;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getStock()
    {
        return $this->stock;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    // Setters
    public function setCategoriaId($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    // CREATE - Crear nuevo producto
    public function crear($datos)
    {
        try {
            $sql = "INSERT INTO productos (id_categoria, nombre, descripcion, imagen, precio, stock, estado) VALUES (:id_categoria, :nombre, :descripcion, :imagen, :precio, :stock, :estado)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':id_categoria' => $datos['id_categoria'],
                ':nombre' => $datos['nombre'],
                ':descripcion' => $datos['descripcion'],
                ':imagen' => $datos['imagen'],
                ':precio' => $datos['precio'],
                ':stock' => $datos['stock'],
                ':estado' => $datos['estado']
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error al crear producto: " . $e->getMessage());
            return false;
        }
    }
    // READ - Obtener todos los productos
    public function obtenerTodos()
    {
        try {
            $sql = "SELECT p.*, c.nombre as categoria_nombre FROM productos p LEFT JOIN categorias c ON p.id_categoria = c.id_categoria WHERE p.estado = 1 ORDER BY p.id_producto DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener productos: " . $e->getMessage());
            return [];
        }
    }
    // READ - Obtener producto por ID
    public function obtenerPorId($id)
    {
        try {
            $sql = "SELECT p.*, c.nombre as categoria_nombre FROM productos p LEFT JOIN categorias c ON p.id_categoria = c.id_categoria WHERE p.id_producto = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener producto: " . $e->getMessage());
            return false;
        }
    }
    // UPDATE - Actualizar producto
    public function actualizar($id, $datos)
    {
        try {
            $sql = "UPDATE productos SET id_categoria = :id_categoria, nombre = :nombre, descripcion = :descripcion, imagen = :imagen, precio = :precio, stock = :stock, estado = :estado WHERE id_producto = :id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                ':id_categoria' => $datos['id_categoria'],
                ':nombre' => $datos['nombre'],
                ':descripcion' => $datos['descripcion'],
                ':imagen' => $datos['imagen'],
                ':precio' => $datos['precio'],
                ':stock' => $datos['stock'],
                ':estado' => $datos['estado'],
                ':id' => $id
            ]);
        } catch (PDOException $e) {
            error_log("Error al actualizar producto: " . $e->getMessage());
            return false;
        }
    }
    // DELETE - Eliminar producto (cambiar estado)
    public function eliminar($id)
    {
        try {
            $sql = "UPDATE productos SET estado = 0 WHERE id_producto = :id";

            $stmt = $this->db->prepare($sql);
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log("Error al eliminar producto: " . $e->getMessage());
            return false;
        }
    }
    // Obtener categorías para el formulario
    public function obtenerCategorias()
    {
        try {
            $sql = "SELECT * FROM categorias WHERE estado = 1 ORDER BY nombre";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener categorías: " . $e->getMessage());
            return [];
        }
    }
}
