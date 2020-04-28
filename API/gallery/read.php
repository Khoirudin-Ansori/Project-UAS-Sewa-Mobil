<?php
header("Access-Control-Allow-origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/gallery_mobil.php';

$database = new Database();
$db = $database->getConnection();

$gallery_mobil = new Gallery_Mobil($db);

$stmt = $gallery_mobil->read();
$num = $stmt->rowCount();

if ($num>0) {
	$gallery_mobil_arr = array();
	$gallery_mobil_arr["records"] = array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$gallery_mobil_item = array(
			"id_gallery"=> $id_gallery,
			"id_mobil"=> $id_gallery,
			"image"=> $image
		);
		array_push($gallery_mobil_arr["records"], $gallery_mobil_item);
	}

	http_response_code(200);
	echo json_encode($gallery_mobil_arr);
}else{
	http_response_code(404);
	echo json_encode(
		array("message" => "Transaksi Tidak Di Temukan")
	);

}
?>