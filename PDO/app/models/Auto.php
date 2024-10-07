<?php 
    class Auto {
        private $conn;
        private $table_name = 'autos';

        public $id;
        public $nombre;
        public $descripcion;
        public $valor:

        public function __construct($db) {
            $this->conn = $db;
        }

        public function leerTodos(){
            $query = 'SELECT * FROM ' . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    }
?>