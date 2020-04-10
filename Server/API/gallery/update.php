<?php
header("Access-Control-Allow-origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/gallery_mobil.php';

$database = new Database();
$db = $database->getConnection();

$gallery_mobil = new GaLLery_Mobil($db);

$data =
json_decode (file_get_contents("php://input"));
{
  
	$gallery_mobil->id_gallery = $data->id_gallery;
	$gallery_mobil->id_mobil = $data->id_mobil;
	$gallery_mobil->image = $data->image;

	if ($gallery_mobil -> update()) {
		http_response_code(201);
		echo json_encode(array("Message" => "user was Updated" ));
	}
	else{
		http_response_code(503);
		echo json_encode(array("Message" => "Unable to update user" ));
	}
}

?>