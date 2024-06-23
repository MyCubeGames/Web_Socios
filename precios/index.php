<?php
require '../db.php';
include '../header.php';

$sql = "SELECT precios.id, zonas.nombre as zona_nombre, categorias.nombre as categoria_nombre, precios.precio 
        FROM precios 
        JOIN zonas ON precios.zona_id = zonas.id 
        JOIN categorias ON precios.categoria_id = categorias.id";
$result = $conn->query($sql);
?>

<a href="create.php">Nuevo Precio</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Zona</th>
        <th>Categoria</th>
        <th>Precio</th>
        <th>Acciones</th>
    </tr>
    <?php while ($precio = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $precio['id'] ?></td>
            <td><?= $precio['zona_nombre'] ?></td>
            <td><?= $precio['categoria_nombre'] ?></td>
            <td><?= $precio['precio'] ?></td>
            <td>
                <a href="update.php?id=<?= $precio['id'] ?>">Editar</a>
                <a href="delete.php?id=<?= $precio['id'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<?php include '../footer.php'; ?>
