<?php
require '../db.php';
include '../header.php';

$sql = "SELECT * FROM zonas";
$result = $conn->query($sql);
?>

<a href="create.php">Nueva Zona</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php while ($zona = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $zona['id'] ?></td>
            <td><?= $zona['nombre'] ?></td>
            <td>
                <a href="update.php?id=<?= $zona['id'] ?>">Editar</a>
                <a href="delete.php?id=<?= $zona['id'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<?php include '../footer.php'; ?>