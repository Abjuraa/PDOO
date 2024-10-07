<?php
// Incluye el controlador
require_once './controllers/AutosControllers.php'; // Asegúrate de que esta ruta es correcta

// Crea el controlador y muestra los datos
$controlador = new Controlador();
$controlador->mostrarDatos();
?>
