<?php
require '../db.php';

$id = $_GET['id'];

$sql = "DELETE FROM zonas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
?>
