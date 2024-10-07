<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="header-car">
                <p>Autos-Fly</p>
                <input type="search" placeholder="Busca el auto de tus sueños...">
            </div>
        </div>
    </header>
    <div class="container">
        <?php foreach($autos as $auto): ?>  <!-- Itera sobre los autos obtenidos desde la base de datos -->
            <div class="card">
                <img src="/public/img/ferrari-f40.avif" alt="Imagen del auto"> <!-- Cambia la imagen por la ruta correcta -->
                <h3><?php echo htmlspecialchars($auto['nombre']); ?></h3> <!-- Muestra el nombre del auto -->
                <p class="descr"><?php echo htmlspecialchars($auto['descripcion']); ?></p> <!-- Muestra la descripción del auto -->
                <p class="price">$<?php echo htmlspecialchars($auto['precio']); ?></p> <!-- Muestra el precio del auto -->
            </div>
        <?php endforeach; ?>
    </div>
    <footer>
        <p>Copyright 2024 - All rights reserved</p>
    </footer>
</body>
</html>