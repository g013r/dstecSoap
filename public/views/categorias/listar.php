<?php
// Cargar el modelo y obtener los datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/dstecSoap/app/models/Categorias.php';
$categoriaModel = new Categorias();
$categorias = $categoriaModel->obtenerTodos();

// Obtener el conteo de productos por categoría
foreach ($categorias as &$cat) {
    $cat['total_productos'] = $categoriaModel->contarProductos($cat['id_categoria']);
}
?>
<style>
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .table tr:hover {
        background-color: #f5f5f5;
    }

    .btn {
        padding: 6px 12px;
        text-decoration: none;
        border-radius: 4px;
        margin: 2px;
        display: inline-block;
        cursor: pointer;
        border: none;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .alert {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .badge {
        background-color: #007bff;
        color: white;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
    }

    .empty-state {
        text-align: center;
        padding: 40px;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 48px;
        margin-bottom: 16px;
    }
</style>

<div class="header-actions">
    <h1>📁 Lista de Categorías</h1>
    <button class="btn btn-primary" onclick="loadContent('views/categorias/crear.php', 'Nueva Categoría')">
        ➕ Nueva Categoría
    </button>
</div>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        ✅ Categoría creada exitosamente.
    </div>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-error">
        ❌ Error al procesar la solicitud.
    </div>
<?php endif; ?>

<?php if (empty($categorias)): ?>
    <div class="empty-state">
        <div style="font-size: 48px;">📁</div>
        <h3>No hay categorías registradas</h3>
        <p>Crea tu primera categoría para comenzar a organizar tus productos.</p>
        <button class="btn btn-primary" onclick="loadContent('views/categorias/crear.php', 'Nueva Categoría')">
            Crear Primera Categoría
        </button>
    </div>
<?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Productos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?php echo $categoria['id_categoria']; ?></td>
                    <td><strong><?php echo htmlspecialchars($categoria['nombre']); ?></strong></td>
                    <td><?php echo htmlspecialchars($categoria['descripcion'] ?: 'Sin descripción'); ?></td>
                    <td>
                        <span class="badge"><?php echo $categoria['total_productos']; ?> productos</span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<div style="margin-top: 20px;">
    <button class="btn btn-primary" onclick="loadContent('views/productos/listar.php', 'Lista de Productos')">
        📦 Ver Productos
    </button>
</div>
