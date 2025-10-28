<?php
// Cargar el modelo para obtener categorías
require_once $_SERVER['DOCUMENT_ROOT'] . '/dstecSoap/app/models/Productos.php';
$productoModel = new Productos();
$categorias = $productoModel->obtenerCategorias();
?>
<style>
    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-family: inherit;
    }

    textarea {
        resize: vertical;
    }

    .btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .btn-secondary {
        background-color: #6c757d;
    }

    .alert {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
    }

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .required {
        color: red;
    }

    .form-help {
        font-size: 12px;
        color: #6c757d;
        margin-top: 4px;
    }
</style>

<h1>📦 Crear Nuevo Producto</h1>

<?php if (empty($categorias)): ?>
    <div class="alert alert-error">
        <strong>⚠️ No hay categorías disponibles.</strong><br>
        Necesitas crear al menos una categoría antes de agregar productos.
    </div>
    <div style="margin-top: 15px;">
        <button class="btn btn-primary" onclick="loadContent('views/categorias/crear.php', 'Nueva Categoría')">
            ➕ Crear Categoría Ahora
        </button>
        <button class="btn btn-secondary" onclick="window.location.href='/dstecSoap/public/index.php'">
            Volver al Dashboard
        </button>
    </div>
<?php else: ?>
<form action="/dstecSoap/public/productos.php?action=guardar" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="id_categoria">Categoría: <span class="required">*</span></label>
        <select name="id_categoria" id="id_categoria" required>
            <option value="">Seleccione una categoría</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id_categoria']; ?>">
                    <?php echo htmlspecialchars($categoria['nombre']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="nombre">Nombre del Producto: <span class="required">*</span></label>
        <input type="text" name="nombre" id="nombre" required maxlength="100">
    </div>
    
    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="4" maxlength="500"></textarea>
    </div>
    
    <div class="form-group">
        <label for="precio">Precio: <span class="required">*</span></label>
        <input type="number" name="precio" id="precio" step="0.01" min="0" required>
    </div>
    
    <div class="form-group">
        <label for="stock">Stock: <span class="required">*</span></label>
        <input type="number" name="stock" id="stock" min="0" required>
    </div>
    
    <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*">
        <div class="form-help">Formatos permitidos: JPG, PNG, GIF, WEBP</div>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn">💾 Guardar Producto</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='/dstecSoap/public/index.php'">
            ❌ Cancelar
        </button>
    </div>
</form>
<?php endif; ?>

<div style="margin-top: 30px; padding: 15px; background-color: #e7f3ff; border-left: 4px solid #007bff; border-radius: 4px;">
    <strong>💡 Consejo:</strong> Completa todos los campos requeridos. 
    Puedes subir una imagen del producto para que se vea mejor en el catálogo.
</div>
