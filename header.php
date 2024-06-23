<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penya Arrabal</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="<?= BASE_URL ?>/index.php">
                    <img src="<?= BASE_URL ?>/img/logo.webp" alt="Logo">
                </a>
            </div>
            <ul>
                <li><a href="<?= BASE_URL ?>/index.php">Inicio</a></li>
                <li><a href="<?= BASE_URL ?>/categorias/index.php">Categorías</a></li>
                <li><a href="<?= BASE_URL ?>/zonas/index.php">Zonas</a></li>
                <li><a href="<?= BASE_URL ?>/precios/index.php">Precios</a></li>
                <!-- Agrega más enlaces según sea necesario -->
            </ul>
        </nav>
    </header>
