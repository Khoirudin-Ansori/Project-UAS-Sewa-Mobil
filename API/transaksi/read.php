<?php
header("Access-Control-Allow-origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/transaksi.php';

$database = new Database();
$db = $database->getConnection();

$transaksi = new Transaksi($db);

$stmt = $transaksi->read();
$num = $stmt->rowCount();

if ($num>0) {
	$transaksi_arr = array();
	$transaksi_arr["records"] = array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$transaksi_item = array(
			"kode_transaksi"=> $kode_transaksi,
			"id_user"=> $id_user,
			"tgl_order"=> $tgl_order,
			"total_pembayaran"=> $total_pembayaran,
			"tgl_pembayaran" => $tgl_pembayaran,
			"bukti_pembayaran" =>$bukti_pembayaran,
			"status_pembayaran" =>$status_pembayaran,
			"status_transaksi" =>$status_transaksi
		);
		array_push($transaksi_arr["records"], $transaksi_item);
	}

	http_response_code(200);
	echo json_encode($transaksi_arr);
}else{
	http_response_code(404);
	echo json_encode(
		array("message" => "Transaksi Tidak Di Temukan")
	);

}
?>