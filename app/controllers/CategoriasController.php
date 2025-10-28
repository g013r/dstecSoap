<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/dstecSoap/app/models/Categorias.php';

class CategoriasController
{
    private $categoria;
    
    public function __construct()
    {
        $this->categoria = new Categorias();
    }
    
    // Mostrar formulario de creación
    public function crear()
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/dstecSoap/public/views/categorias/crear.php';
    }
    
    // Procesar creación de categoría
    public function guardar()
    {
        if ($_POST) {
            // Validar que el nombre no esté vacío
            if (empty($_POST['nombre'])) {
                echo '<script>
                    alert("❌ Error: El nombre de la categoría es requerido");
                    window.location.href = "/dstecSoap/public/index.php";
                </script>';
                exit;
            }
            
            $datos = [
                'nombre' => trim($_POST['nombre']),
                'descripcion' => trim($_POST['descripcion'] ?? ''),
                'estado' => 1
            ];
            
            $resultado = $this->categoria->crear($datos);
            if ($resultado) {
                echo '<!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <title>Guardando...</title>
                    <script>
                        // Guardar en localStorage qué página cargar
                        localStorage.setItem("autoLoadPage", "views/categorias/listar.php");
                        localStorage.setItem("autoLoadTitle", "Lista de Categorías");
                        
                        alert("✅ Categoría creada exitosamente");
                        window.location.href = "/dstecSoap/public/index.php";
                    </script>
                </head>
                <body>
                    <p>✅ Categoría creada exitosamente. Redirigiendo...</p>
                </body>
                </html>';
                exit;
            } else {
                echo '<script>
                    alert("❌ Error al crear la categoría. Por favor, intenta nuevamente");
                    window.location.href = "/dstecSoap/public/index.php";
                </script>';
                exit;
            }
        }
    }
    
    // Listar categorías
    public function listar()
    {
        $categorias = $this->categoria->obtenerTodos();
        // Obtener el conteo de productos por categoría
        foreach ($categorias as &$cat) {
            $cat['total_productos'] = $this->categoria->contarProductos($cat['id_categoria']);
        }
        include $_SERVER['DOCUMENT_ROOT'] . '/dstecSoap/public/views/categorias/listar.php';
    }
}

