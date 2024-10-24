<?php 

header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/categoria.php");

$categoria = new categoria();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){
    case "GetAll":
        $datos = $categoria -> get_Categoria();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos = $categoria->get_by_id($body);
            echo json_encode($datos);
            break;                                                                                     
} 
?>      