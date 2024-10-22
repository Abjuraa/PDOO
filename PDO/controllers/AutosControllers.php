<?php
require_once './models/Auto.php';
require_once './config/database.php';

class Controlador {
    private $db;
    private $productModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();

        $this->productModel = new Auto($this->db);
    }

    public function mostrarDatos() {
        $datos = $this->productModel->obtenerDatos();
        
        require_once './views/index.php';
    }
}
?>
