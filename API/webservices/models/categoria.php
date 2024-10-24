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
        $sql = "SELECT * FROM `categoria` WHERE est = 1 AND cat_id";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();  

        return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_categoria($cat_nom, $cat_obs){
        $conectar = parent::iniciar_conexion();
        parent::set_names();
        $sql = "INSERT INTO `categoria`(cat_nombre, cat_obs, est) VALUES (?,?,'1');";
        $sql = $conectar -> prepare($sql);
        $sql -> bindValue(1, $cat_nom);
        $sql -> bindValue(2, $cat_obs);
        $sql -> execute();  

        return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_categoria($cat_id,$cat_nom, $cat_obs){
        $conectar = parent::iniciar_conexion();
        parent::set_names();
        $sql = "UPDATE `categoria` SET cat_nombre = ?, cat_obs = ?  WHERE cat_id = ?;";
        $sql = $conectar -> prepare($sql);
        $sql -> bindValue(1, $cat_nom);
        $sql -> bindValue(2, $cat_obs);
        $sql -> bindValue(3, $cat_id);
        $sql -> execute();  
    }

    public function delete_categoria($cat_id){
        $conectar = parent::iniciar_conexion();
        parent::set_names();
        $sql = "DELETE FROM `categoria` WHERE cat_id = ?";
        $sql = $conectar -> prepare($sql);
        $sql -> bindValue(1, $cat_id);
        $sql -> execute();
    }
}                
?>