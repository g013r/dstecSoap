<?php
// Cargar el modelo y obtener los datos
require_once $_SERVER['DOCUMENT_ROOT'] . '/dstecSoap/app/models/Productos.php';
$productoModel = new Productos();
$productos = $productoModel->obtenerTodos();
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
        color: white;
    }

    .btn-primary {
        background-color: #007bff;
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

    .empty-state {
        text-align: center;
        padding: 40px;
        color: #6c757d;
    }
</style>

<div class="header-actions">
    <h1>📦 Lista de Productos</h1>
    <div>
        <button class="btn" style="background-color: #6c757d; margin-right: 8px;" onclick="loadContent('views/categorias/listar.php', 'Lista de Categorías')">
            📁 Gestionar Categorías
        </button>
        <button class="btn btn-primary" onclick="loadContent('views/productos/crear.php', 'Nuevo Producto')">
            ➕ Nuevo Producto
        </button>
    </div>
</div>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        ✅ Producto creado exitosamente.
    </div>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-error">
        ❌ Error al procesar la solicitud.
    </div>
<?php endif; ?>

<?php if (empty($productos)): ?>
    <div class="empty-state">
        <div style="font-size: 48px;">📦</div>
        <h3>No hay productos registrados</h3>
        <p>Crea tu primer producto para comenzar.</p>
        <button class="btn btn-primary" onclick="loadContent('views/productos/crear.php', 'Nuevo Producto')">
            Crear Primer Producto
        </button>
    </div>
<?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo $producto['id_producto']; ?></td>
                    <td>
                        <?php if (!empty($producto['imagen'])): ?>
                            <img src="../../<?php echo $producto['imagen']; ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                        <?php else: ?>
                            <span>Sin imagen</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($producto['categoria_nombre'] ?? 'Sin categoría'); ?></td>
                    <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                    <td><?php echo $producto['stock']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
