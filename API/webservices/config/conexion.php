<?php 
    class conectar{
        protected $dbh;

        protected function conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=webservices", "root", "");
                return $conectar
            } catch(Exception $e) {
                print "Error en la base de datos: " . $e ->getMessage() . "<br>"
                die();
            }
        }

        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf-8'")
        }
    }
?>