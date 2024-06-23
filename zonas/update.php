<?php
require '../db.php';
include '../header.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];

    $sql = "UPDATE zonas SET nombre = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nombre, $id);
    $stmt->execute();

    header("Location: index.php");
} else {
    $sql = "SELECT * FROM zonas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $zona = $result->fetch_assoc();
}
?>
<main>
    <form method="POST">
        Nombre: <input type="text" name="nombre" value="<?=$zona['nombre'] ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
    <a class="btn" href="index.php">Regresar</a>
</main>

<?php include '../footer.php'; ?>
