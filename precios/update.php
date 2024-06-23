<?php
require '../db.php';
include '../header.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $zona_id = $_POST['zona_id'];
    $categoria_id = $_POST['categoria_id'];
    $precio = $_POST['precio'];

    $sql = "UPDATE precios SET zona_id = ?, categoria_id = ?, precio = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iidi", $zona_id, $categoria_id, $precio, $id);
    $stmt->execute();

    header("Location: index.php");
} else {
    $sql = "SELECT * FROM precios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $precio = $result->fetch_assoc();
}

// Obtener zonas y categorias
$zonas = $conn->query("SELECT id, nombre FROM zonas");
$categorias = $conn->query("SELECT id, nombre FROM categorias");
?>

<main>
    <form method="POST">
        <label for="zona_id">Zona:</label>
        <select name="zona_id" id="zona_id" required>
            <?php while ($zona = $zonas->fetch_assoc()): ?>
                <option value="<?= $zona['id'] ?>" <?= ($zona['id'] == $precio['zona_id']) ? 'selected' : '' ?>><?= $zona['nombre'] ?></option>
            <?php endwhile; ?>
        </select>
        <label for="categoria_id">Categoria:</label>
        <select name="categoria_id" id="categoria_id" required>
            <?php while ($categoria = $categorias->fetch_assoc()): ?>
                <option value="<?= $categoria['id'] ?>" <?= ($categoria['id'] == $precio['categoria_id']) ? 'selected' : '' ?>><?= $categoria['nombre'] ?></option>
            <?php endwhile; ?>
        </select>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" value="<?= $precio['precio'] ?>" required>
        <button type="submit">Actualizar</button>
    </form>
    <a class="btn" href="index.php">Regresar</a>
</main>

<?php include '../footer.php'; ?>
