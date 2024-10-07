<?php
class Auto {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerDatos() {
        $stmt = $this->pdo->query("SELECT nombre, descripcion, valor FROM autos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>