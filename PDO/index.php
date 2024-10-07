<?php
// Inicializa la conexión PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=pdo', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}

// Incluye el controlador
require_once 'app/controllers/Controlador.php'; // Asegúrate de que esta ruta es correcta

// Crea el controlador y muestra los datos
$controlador = new Controlador($pdo);
$controlador->mostrarDatos();
?>
