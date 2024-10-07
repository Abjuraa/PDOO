<?php
require_once '../models/Auto.php'; // Asegúrate de que esta ruta es correcta

class Controlador {
    private $modelo;

    public function __construct($pdo) {
        $this->modelo = new Auto($pdo);
    }

    public function mostrarDatos() {
        $datos = $this->modelo->obtenerDatos(); 

        if ($datos === false || !is_array($datos)) {
            $datos = []; // Asegúrate de que 'datos' siempre esté definido
        }

        include '../views/autos/index.php'; // Asegúrate de que la ruta es correcta
    }
}
?>
