<?php

require_once 'controllers/AutosControllers.php'; 

$controlador = new Controlador($pdo);
$controlador->mostrarDatos();
?>
