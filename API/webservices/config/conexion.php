<?php 
   
   class Conectar{
        protected $dbh;

        protected function conexion(){
            try{
                $conectar = $this -> dbh = new PDO("mysql:host=localhost;dbname=webservices", "root", "");
                
                return $conectar;
            } catch(Exception $e) {
                echo "Error en la base de datos: " . $e ->getMessage() . "<br>";
                die();
            }
        }

        public function set_names(){
            return $this -> dbh -> query("SET NAMES 'utf8'");
        }

        public function iniciar_conexion(){
            return $this -> conexion() ;
        }
    }

    $db = new Conectar();
    $db -> iniciar_conexion();
    $db -> set_names()
?>