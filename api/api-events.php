<?php

error_reporting(-1);
ini_set('display_errors', 0);

ini_set("allow_url_fopen", true);

header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

header("Access-Control-Allow-Methods: PUT, GET, POST, FILES"); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents('php://input'), TRUE);

include_once(realpath(dirname(__FILE__)).'/clases/events.php');

$response = array();

$events = new Events();


if ( isset($data['action']) && $data['action'] == 'getEventsTypes') {

	$response = $events->getEventsTypes();
    
}else if(isset($data['action']) && $data['action'] == 'getEventsOrderByDate'){

	$response = $events->getEventsOrderByDate();

}else if(isset($data['action']) && $data['action'] == 'getUbicaciones'){

	$response = $events->getUbicaciones();

}else if(isset($data['action']) && $data['action'] == 'registerEvent'){

	$response = $events->insertEvent($data);

}else if(isset($data['action']) && $data['action'] == 'getTypeEventById'){

	$response = $events->getTypeEventById($data['id']);

}elseif(isset($data['action']) && $data['action'] == 'getDireccionById'){

	$response = $events->getDireccionById($data['id']);

}elseif(isset($data['action']) && $data['action'] == 'updateEvent'){

	$response = $events->updateEvent($data);

}else if(isset($data['action']) && $data['action'] == 'eraseEvent'){

	$id = $data['id'];

	$response = $events->deleteEvent($id);

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