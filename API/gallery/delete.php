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

$gallery_mobil = new Gallery_Mobil($db);

$data =
json_decode (file_get_contents("php://input"));
{
	$gallery_mobil->id_gallery = $data->id_gallery;

	if ($user -> delete()) {
		http_response_code(201);
		echo json_encode(array("Message" => "Gallery_Mobil was Deleted" ));
	}
	else{
		http_response_code(503);
		echo json_encode(array("Message" => "Unable to delete Gallery_Mobil" ));
	}
}

?>