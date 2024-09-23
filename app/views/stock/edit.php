<h2>Editar Stock</h2>
<form action="/stock/update/<?php echo htmlspecialchars($data->id); ?>" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre del Producto</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($data->name); ?>" required>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo htmlspecialchars($data->quantity); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="/stock" class="btn btn-secondary">Cancelar</a>
</form>
