        <h1>Lista de Items</h1>
        <a href="/crud/create" class="btn btn-success mb-3">Crear Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1; // Inicializamos el contador
                foreach ($data as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($index); ?></td> 
                        <td><?php echo htmlspecialchars($item->name); ?></td>
                        <td><?php echo htmlspecialchars($item->description); ?></td>
                        <td>
                            <a href="/crud/edit/<?php echo $item->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="/crud/delete/<?php echo $item->id; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php
                    $index++; // Incrementamos el contador
                endforeach;
                ?>
            </tbody>
        </table>