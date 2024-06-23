<?php
require '../db.php';
include '../header.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];

    $sql = "UPDATE categorias SET nombre = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nombre, $id);
    $stmt->execute();

    header("Location: index.php");
} else {
    $sql = "SELECT * FROM categorias WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $categoria = $result->fetch_assoc();
}
?>
<main>
    <form method="POST">
        Nombre: <input type="text" name="nombre" value="<?= $categoria['nombre'] ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
    <a class="btn" href="index.php">Regresar</a>
</main>

<?php include '../footer.php'; ?>
