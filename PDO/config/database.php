<?php
    $host = "localhost";
    $dbname = "pdo";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexión exitosa";
    } catch (PDOException $e) {
        echo "Conexión fallida: " . $e->getMessage();
    }

    $controlador = new controlador($pdo);
    $controlador->mostrarDatos();
?>
