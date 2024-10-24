<?php 
require_once("../config/conexion.php");

class Categoria extends Conectar{
    public function get_Categoria(){
        $conectar = parent::iniciar_conexion();
        parent::set_names();
        $sql = "SELECT * FROM `categoria` WHERE est = 1";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();

        return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_by_id(){
        $conectar = parent::iniciar_conexion();
        parent::set_names();
        $sql = "SELECT * FROM `categoria` WHERE est = 1 AND cat_id = 2";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();  

        return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }
}                
?>