<?php 
$local = "localhost";
$user = "root";
$password = "";
$dbname = "mrhomero";

$conexion = new mysqli($local, $user, $password, $dbname);

header("Content_Type: appliaction/json");
$metodo = $_SERVER["REQUEST_METHOD"];

$patch = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO']:'/';
$buscarId = explode('/', $patch);
$id = (count($buscarId) > 1)? $buscarId[1]: null;
$campo = end($buscarId);

switch($metodo){
    case 'GET':
        consultar($conexion);
        break;

    case 'POST':
    insertar($conexion);
        break;

    case 'PUT':
        actualizar($conexion, $id);
        break;
    
    case "DELETE":
        eliminar($conexion, $id);
        break;
    
    case "PATCH":
        actualizarCampo ($conexion, $id, $campo);
        break;

    default:
        echo "Metodo no permitido";
}

function consultar($conexion){
    $sql = "SELECT * FROM usuarios";
    $resultado = $conexion->query($sql);

    if($resultado){
        $datos = array();
        while($fila = $resultado->fetch_assoc()){
            $datos[] = $fila;
        }
        echo json_encode($datos);
    }
}

function insertar($conexion){
    $dato = json_decode(file_get_contents('php://input'), true);
    $nombre = $dato['user_nom'];
    $apellido = $dato['user_apels'];
    $email = $dato['user_email'];
    $telefono = $dato['user_tel'];
    $puntos = $dato['user_puntos'];
    $contra = $dato['user_pass'];
    $clave = password_hash($contra, PASSWORD_DEFAULT, [50]);
    
    $sql = "INSERT INTO usuarios(`user_nom`, `user_apels`, `user_email`, `user_tel`, `user_puntos`, `user_pass`) VALUES ('$nombre', '$apellido', '$email', '$telefono', '$puntos', '$clave')";
    $resultado = $conexion->query($sql);


    if($resultado){
        $dato['id_user'] = $conexion->insert_id;
        echo json_encode($dato);
    } else {
        echo json_encode(array('error' => "Error al crear el usuario"));
    }                                                                                   
}

function actualizar($conexion, $id){
    $dato = json_decode(file_get_contents('php://input'), true);
    $nombre = $dato['user_nom'];
    $apellido = $dato['user_apels'];
    $email = $dato['user_email'];
    $telefono = $dato['user_tel'];
    $puntos = $dato['user_puntos'];
    $contra = $dato['user_pass'];
    $clave = password_hash($contra, PASSWORD_DEFAULT, [50]);

    $sql = "UPDATE usuarios SET user_nom = '$nombre', user_apels =  '$apellido', user_email = '$email', user_tel =  '$telefono', user_puntos = '$puntos', user_pass = '$clave'  WHERE id_user = $id";
    $resultado = $conexion->query($sql);

    if($resultado){
        echo json_encode(array('mensaje' => 'Usuario Actualizado'));
    } else {
        echo json_encode(array('error' => "Error al actualizar el usuario"));
    }         

}
function actualizarCampo($conexion, $id, $campo){
    $dato = json_decode(file_get_contents('php://input'), true);
    $valor = $dato['valor'];
    $sql = "UPDATE usuarios SET $campo = '$valor' WHERE id_user = $id";
    $resultado = $conexion->query($sql);

    if($resultado){
        echo json_encode(array('mensaje' => 'Usuario Actualizado'));
    } else {
        echo json_encode(array('error' => "Error al actualizar el usuario"));
    }         

}

function eliminar($conexion, $id){
    $dato = json_decode(file_get_contents('php://input'), true);
    $sql = "DELETE FROM `usuarios` WHERE id_user = '$id'";
    $resultado = $conexion->query($sql);

    if($resultado){
        echo json_encode(array('mensaje' => 'Usuario eliminado'));
    } else {
        echo json_encode(array('error' => "Error al eliminar el usuario"));
    }    
}
?>                                          