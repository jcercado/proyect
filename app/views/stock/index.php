<h1>Lista de Stock</h1>
<a href="/stock/create" class="btn btn-success mb-3">Agregar Nuevo</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $index = 1;
        foreach ($data as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($index); ?></td>
                <td><?php echo htmlspecialchars($item->name); ?></td>
                <td><?php echo htmlspecialchars($item->quantity); ?></td>
                <td>
                    <a href="/stock/edit/<?php echo $item->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/stock/delete/<?php echo $item->id; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php 
            $index++;
        endforeach; ?>
    </tbody>
</table>
