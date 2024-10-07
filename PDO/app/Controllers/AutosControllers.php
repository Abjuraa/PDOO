<?php
    require_once './app/models/Auto.php';
    require_once 'config/database.php';

    class AutosController {
        public function index() {
            // Obtener autos desde el modelo
            $autosModel = new Auto();
            $autos = $autosModel->getAllAutos(); // Asumiendo que tienes un método para obtener todos los autos
            
            // Pasar los datos a la vista
            require_once '../app/views/autos/index.php';
        }
    }
?>  