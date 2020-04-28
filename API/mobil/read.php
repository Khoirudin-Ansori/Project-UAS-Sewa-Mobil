<?php
header("Access-Control-Allow-origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/mobil.php';

$database = new Database();
$db = $database->getConnection();

$mobil = new Mobil($db);

$stmt = $mobil->read();
$num = $stmt->rowCount();

if ($num>0) {
	$mobil_arr = array();
	$mobil_arr["records"] = array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$mobil_item = array(
			"id_mobil"=> $id_mobil,
			"nama_mobil"=> $nama_mobil,
			"merk_mobil"=> $merk_mobil,
			"tahun_mobil"=> $tahun_mobil,
			"kapasitas_mobil" => $kapasitas_mobil,
			"harga_mobil" =>$harga_mobil,
			"warna_mobil" =>$warna_mobil,
			"plat_no_mobil" =>$plat_no_mobil
		);
		array_push($mobil_arr["records"], $mobil_item);
	}

	http_response_code(200);
	echo json_encode($mobil_arr);
}else{
	http_response_code(404);
	echo json_encode(
		array("message" => "Mobil Tidak Di Temukan")
	);

}
?>