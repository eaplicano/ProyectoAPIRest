<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once("../../config/conexion.php");
    require_once("../../Socios/models/Sociosnegocio.php");
    
    $socios = new Sociosnegocio();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"])
    {
        case "GetSocios":
            $datos=$socios->get_sociosnegocio();
            echo json_encode($datos);
        break;

        case "GetUno":
            $datos=$socios->get_socionegocio($body["id"]);
            echo json_encode($datos);
        break;

        case "InsertSocios":
            $datos=$socios->insert_sociosnegocio($body["nombre"],$body["razonsocial"],$body["direccion"],$body["tipo"],$body["contacto"],$body["email"],$body["telefono"]);
            echo json_encode("Socio Agregado");
        break;

        case "UpdateSocio":
            $datos=$socios->update_socionegocio($body["id"],$body["nombre"],$body["razonsocial"],$body["direccion"],$body["tipo"],$body["contacto"],$body["email"],$body["telefono"],$body["estado"]);
            echo json_encode("Socio Actualizado");
        break;

        case "DeleteSocio":
            $datos=$socios->delete_socionegocio($body["id"]);
            echo json_encode("Socio Borrado");
        break;
    }
?>