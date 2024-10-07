<?php
require './models/Auto.php';
require_once './config/database.php';

class Controlador {
    private $modelo;

    public function __construct($pdo) {
        $this->modelo = new Auto($pdo);
    }

    public function mostrarDatos() {
        $datos = $this->modelo->obtenerDatos(); 

        if ($datos === false || !is_array($datos)) {
            $datos = []; 
        }

        include './views/index.php'; 
    }
}
?>
