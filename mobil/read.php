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
			"ID_MOBIL"=> $ID_MOBIL,
			"NAMA_MOBIL"=> $NAMA_MOBIL,
			"MERK_MOBIL"=> $MERK_MOBIL,
			"TAHUN_MOBIL"=> $TAHUN_MOBIL,
			"KAPASITAS_MOBIL" => $KAPASITAS_MOBIL,
			"HARGA_MOBIL" =>$HARGA_MOBIL,
			"WARNA_MOBIL" =>$WARNA_MOBIL,
			"PLAT_MOBIL" =>$PLAT_MOBIL
		);
		array_push($mobil_arr["records"], $mobil_item);
	}

	http_response_code(200);
	echo json_encode($mobil_arr);
}else{
	http_response_code(404);
	echo json_encode(
		array("message" => "Product Tidak Di Temukan")
	);

}
?>

<?php
header("Access-Control-Allow-origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$stmt = $product->read();
$num = $stmt->rowCount();

if ($num>0) {
	$products_arr = array();
	$products_arr["records"] = array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$product_item = array(
			"id"=>$id,
			"name"=> $name,
			"description"=> html_entity_decode($description),
			"price"=>$price,
			"category_id"=>$category_id
		);
		array_push($products_arr["records"], $product_item);
	}

	http_response_code(200);
	echo json_encode($products_arr);
}else{
	http_response_code(404);
	echo json_encode(
		array("message" => "Product Tidak Di Temukan")
	);

}
?>