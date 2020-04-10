<?php
header("Access-Control-Allow-origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/transaksi.php';

$database = new Database();
$db = $database->getConnection();

$transaksi = new Transaksi($db);

$data =
json_decode (file_get_contents("php://input"));

if(
	!empty($data->id_user) &&
	!empty($data->tgl_order) &&
	!empty($data->total_pembayaran) &&
	!empty($data->tgl_pembayaran) &&
	!empty($data->bukti_pembayaran) &&
	!empty($data->status_pembayaran) &&
	!empty($data->status_transaksi)
){
	$transaksi->id_user = $data->id_user;
	$transaksi->tgl_order = $data->tgl_order;
	$transaksi->total_pembayaran = $data->total_pembayaran;
	$transaksi->tgl_pembayaran = $data->tgl_pembayaran;
	$transaksi->bukti_pembayaran = $data->bukti_pembayaran;
	$transaksi->status_pembayaran = $data->status_pembayaran;
	$transaksi->status_transaksi = $data->status_transaksi;

	if ($transaksi -> create()) {
		http_response_code(201);
		echo json_encode(array("Message" => "transaksi was created" ));
	}
	else{
		http_response_code(503);
		echo json_encode(array("Message" => "Unable to create transaksi" ));
	}
}
else{
	http_response_code(400);
	echo json_encode(array("Message" => "Unable to create transaksi. Data is incomplete"));
}

?>
