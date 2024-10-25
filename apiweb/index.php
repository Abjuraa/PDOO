<?php 
    $host = "localhost";
    $usuario = "root";
    $password = "";
    $dbname = "apiweb";

    $conexion = new mysqli($host, $usuario, $password, $dbname);

    if($conexion -> connect_error){
        die("Error en la conexion" . $conexion -> connect_error);
    }

    header("Content_Type: application/json");
    $metodo = $_SERVER["REQUEST_METHOD"];
    print_r($metodo);

    $bucadorId = explode("/", $patch);
    $id = ($patch !== "/" ) ? end


    switch ($metodo){

        case "GET":
            echo "Consulta los registros";
            consulta($conexion);
            break;

        case "POST":
            echo "Insertar regsitro";
            break;

        case "PUT":
            echo "Edicion de registros";
            break;

        case "DELETE":
            echo "ELiminar registros";
            break;
        default :
            echo "Metodo no permitido";
            break;
    }

    function consulta($conexion){
        $sql = "SELECT * FROM `usuario`";
        $resultado = $conexion->query($sql);

        if($resultado){
            $datos = array();
            while($fila = $resultado->fetch_assoc()){
                $datos[] = $fila;
            }

            echo json_encode($datos);
        }
    };
?>