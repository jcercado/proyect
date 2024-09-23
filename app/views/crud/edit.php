<h1>Editar Item</h1>
<form action="/crud/update/<?php echo htmlspecialchars($data->id); ?>" method="POST">
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($data->name); ?>" required>
    </div>
    <div class="form-group mb-4">
        <label for="description">Descripción:</label>
        <textarea class="form-control" name="description" id="description" rows="4" required><?php echo htmlspecialchars($data->description); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="/crud" class="btn btn-secondary">Cancelar</a>
</form>