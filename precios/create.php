<?php
require '../db.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $zona_id = $_POST['zona_id'];
    $categoria_id = $_POST['categoria_id'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO precios (zona_id, categoria_id, precio) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iid", $zona_id, $categoria_id, $precio);
    $stmt->execute();

    header("Location: index.php");
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
                <option value="<?= $zona['id'] ?>"><?= $zona['nombre'] ?></option>
            <?php endwhile; ?>
        </select>
        <label for="categoria_id">Categoria:</label>
        <select name="categoria_id" id="categoria_id" required>
            <?php while ($categoria = $categorias->fetch_assoc()): ?>
                <option value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
            <?php endwhile; ?>
        </select>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" required>
        <button type="submit">Guardar</button>
    </form>
    <a class="btn" href="index.php">Regresar</a>
</main>

<?php include '../footer.php'; ?>
