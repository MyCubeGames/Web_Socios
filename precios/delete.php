<?php
require '../config.php';
require '../db.php';

$id = $_GET['id'];

$sql = "DELETE FROM precios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
?>