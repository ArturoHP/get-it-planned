<?php

error_reporting(-1);
ini_set('display_errors', 0);

ini_set("allow_url_fopen", true);

header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

header("Access-Control-Allow-Methods: PUT, GET, POST, FILES"); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents('php://input'), TRUE);

include_once(realpath(dirname(__FILE__)).'/clases/invitados.php');

$response = array();

$invitados = new Invitados();


if ( isset($data['action']) && $data['action'] == 'getInvitadosByEvento') {

	$id = $data['id'];

	$response = $invitados->getInvitadosByEvento($id);
    
}else if( isset($data['action']) && $data['action'] == 'registrarInvitado' ){

	$response = $invitados->registerInvitado($data);

}else if(isset($_GET['action']) && $_GET['action'] == 'registrarInvitadoC' ){

	$nombre = $_GET['nombre'];
	$idevento = $_GET['idevento'];

	$response = $invitados->registerInvitadoC($nombre,$idevento);

}else if( isset($data['action']) && $data['action'] == "updateInvitado"){

	$response = $invitados->updateInvitado($data);

}else if( isset($data['action']) && $data['action'] == "deleteInvitado"){

	$response = $invitados->deleteInvitado($data);

}else{
	
    $response['data'] = $data;
    $response['GET'] = $_GET;
    $response['REQUEST'] = $_REQUEST;
    $response['POST'] = $_POST;
    $response['error'] = true;
    $response['message'] = 'Error!';

}

echo json_encode($response);

?>