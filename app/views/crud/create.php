<h2>Crear Nuevo Elemento</h2>
<form action="/crud/store" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="/crud" class="btn btn-secondary">Cancelar</a>
</form>