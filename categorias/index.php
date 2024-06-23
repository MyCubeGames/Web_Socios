<?php
require '../db.php';
include '../header.php';

$sql = "SELECT * FROM categorias";
$result = $conn->query($sql);
?>

<a href="create.php">Nueva Categoría</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php while ($categoria = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $categoria['id'] ?></td>
            <td><?= $categoria['nombre'] ?></td>
            <td>
                <a href="update.php?id=<?= $categoria['id'] ?>">Editar</a>
                <a href="delete.php?id=<?= $categoria['id'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<?php include '../footer.php'; ?>
