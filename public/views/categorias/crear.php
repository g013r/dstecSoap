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

<h1>📁 Crear Nueva Categoría</h1>

<form action="/dstecSoap/public/categorias.php?action=guardar" enctype="multipart/form-data" method="POST" id="formCategoria" target="_self">
    <div class="form-group">
        <label for="nombre">
            Nombre de la Categoría: <span class="required">*</span>
        </label>
        <input type="text" name="nombre" id="nombre" required maxlength="100" placeholder="Ej: Jabones Artesanales">
        <div class="form-help">Nombre descriptivo para la categoría</div>
    </div>
    
    <div class="form-group">
        <label for="descripcion">
            Descripción:
        </label>
        <textarea name="descripcion" id="descripcion" rows="4" maxlength="500" placeholder="Descripción opcional de la categoría"></textarea>
        <div class="form-help">Añade una descripción para identificar mejor esta categoría (opcional)</div>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn">💾 Guardar Categoría</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='/dstecSoap/public/index.php'">
            ❌ Cancelar
        </button>   
    </div>
</form>

<div style="margin-top: 30px; padding: 15px; background-color: #e7f3ff; border-left: 4px solid #007bff; border-radius: 4px;">
    <strong>💡 Consejo:</strong> Las categorías te ayudan a organizar tus productos. 
    Después de crear categorías, podrás asignarlas a tus productos.
</div>
