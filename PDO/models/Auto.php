<?php
class Auto {
    private $conn;
    private $table = 'autos';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerDatos() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
