<?php
header("Access-Control-Allow-origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data =
json_decode (file_get_contents("php://input"));

if(
	!empty($data->id_user) &&
	!empty($data->username) &&
	!empty($data->name) &&
	!empty($data->nik) &&
	!empty($data->email) &&
	!empty($data->no_telp) &&
	!empty($data->jenis_kelamin) &&
	!empty($data->alamat) &&
	!empty($data->password) &&
){
	
	$user->id_user = $data->id_user;
	$user->username = $data->username;
	$user->name = $data->name;
	$user->nik = $data->nik;
	$user->email = $data->email;
	$user->no_telp = $data->no_telp;
	$user->jenis_kelamin = $data->jenis_kelamin;
	$user->alamat = $data->alamat;
	$user->password = $data->password;

	if ($user -> create()) {
		http_response_code(201);
		echo json_encode(array("Message" => "user was created" ));
	}
	else{
		http_response_code(503);
		echo json_encode(array("Message" => "Unable to create User" ));
	}
}
else{
	http_response_code(400);
	echo json_encode(array("Message" => "Unable to create user. Data is incomplete"));
}

?>
