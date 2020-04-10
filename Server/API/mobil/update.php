 <?php
header("Access-Control-Allow-origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/mobil.php';

$database = new Database();
$db = $database->getConnection();

$mobil = new Mobil($db);

$data =
json_decode (file_get_contents("php://input"));
{
	$mobil->id_mobil = $data->id_mobil;
  
	$mobil->nama_mobil = $data->nama_mobil;
	$mobil->merk_mobil = $data->merk_mobil;
	$mobil->tahun_mobil = $data->tahun_mobil;
	$mobil->kapasitas_mobil = $data->kapasitas_mobil;
	$mobil->harga_mobil = $data->harga_mobil;
	$mobil->warna_mobil = $data->warna_mobil;
	$mobil->plat_no_mobil = $data->plat_no_mobil;

	if ($mobil -> update()) {
		http_response_code(201);
		echo json_encode(array("Message" => "mobil was Updated" ));
	}
	else{
		http_response_code(503);
		echo json_encode(array("Message" => "Unable to update mobil" ));
	}
}

?>