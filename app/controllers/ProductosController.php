<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/dstecSoap/app/models/Productos.php';
class ProductosController
{
    private $producto;
    public function __construct()
    {
        $this->producto = new Productos();
    }
    // Mostrar formulario de creación
    public function crear()
    {
        $categorias = $this->producto->obtenerCategorias();
        include $_SERVER['DOCUMENT_ROOT'] . '/dstecSoap/public/views/productos/crear.php';
    }
    // Procesar creación de producto
    public function guardar()
    {
        if ($_POST) {
            // Validar que se haya seleccionado una categoría
            if (empty($_POST['id_categoria'])) {
                echo '<script>
                    alert("❌ Error: Debes seleccionar una categoría");
                    window.location.href = "/dstecSoap/public/index.php";
                </script>';
                exit;
            }
            
            $datos = [
                'id_categoria' => $_POST['id_categoria'],
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'] ?? '',
                'imagen' => $this->subirImagen(),
                'precio' => $_POST['precio'],
                'stock' => $_POST['stock'],
                'estado' => 1
            ];
            
            $resultado = $this->producto->crear($datos);
            if ($resultado) {
                echo '<!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <title>Guardando...</title>
                    <script>
                        // Guardar en localStorage qué página cargar
                        localStorage.setItem("autoLoadPage", "views/productos/listar.php");
                        localStorage.setItem("autoLoadTitle", "Lista de Productos");
                        
                        alert("✅ Producto creado exitosamente");
                        window.location.href = "/dstecSoap/public/index.php";
                    </script>
                </head>
                <body>
                    <p>✅ Producto creado exitosamente. Redirigiendo...</p>
                </body>
                </html>';
                exit;
            } else {
                echo '<script>
                    alert("❌ Error al crear el producto. Por favor, intenta nuevamente");
                    window.location.href = "/dstecSoap/public/index.php";
                </script>';
                exit;
            }
        }
    }
    // Listar productos
    public function listar()
    {
        $productos = $this->producto->obtenerTodos();
        include $_SERVER['DOCUMENT_ROOT'] . '/dstecSoap/public/views/productos/listar.php';
    }

    // Función para subir imagen
    private function subirImagen()
    {
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $directorio = $_SERVER['DOCUMENT_ROOT'] . '/dstecSoap/public/uploads/productos/';
            // Crear directorio si no existe
            if (!is_dir($directorio)) {
                mkdir($directorio, 0777, true);
            }
            $nombre_archivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
            $ruta_completa = $directorio . $nombre_archivo;
            // Validar tipo de archivo
            $tipo_permitido = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            $tipo_archivo = $_FILES['imagen']['type'];
            if (in_array($tipo_archivo, $tipo_permitido)) {
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_completa)) {
                    return 'uploads/productos/' . $nombre_archivo;
                }
            }
        }
        return ''; // Retorna string vacío si no hay imagen
    }
}
