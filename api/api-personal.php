<?php

error_reporting(-1);
ini_set('display_errors', 0);

ini_set("allow_url_fopen", true);

header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

header("Access-Control-Allow-Methods: PUT, GET, POST, FILES"); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents('php://input'), TRUE);

include_once(realpath(dirname(__FILE__)).'/clases/personal.php');

$response = array();

$personal = new Personal();


if ( isset($data['action']) && $data['action'] == 'getPersonalTypes') {

	$response = $personal->getPersonalTypes();
    
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