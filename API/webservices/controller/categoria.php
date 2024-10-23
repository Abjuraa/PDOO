<?php 
require_once("../config/conexion.php");
require_once("../models/categoria.php");

$categoria = new categoria();

switch($_GET["est"]){
    case "GetAll":
        $datos = $categoria -> get_Categoria();
        echo json_encode($datos);
        break;
} 
?>  