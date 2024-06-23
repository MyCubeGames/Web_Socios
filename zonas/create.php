<?php
require '../db.php';
include '../header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO zonas (nombre) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombre);
    $stmt->execute();

   header("Location: index.php");
}
?>
<main>
    <form method="POST">
        Nombre: <input type="text" name="nombre" required><br>
        <button type="submit">Guardar</button>
    </form>
    <a class="btn" href="index.php">Regresar</a>
</main>

<?php include '../footer.php'; ?>