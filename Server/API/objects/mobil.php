<?php
/**
 * 
 */
class Mobil 
{
	private $conn;
	private $table_name = "tb_mobil";

	public $id_mobil;
	public $nama_mobil;
	public $merk_mobil;
	public $tahun_mobil;
	public $kapasitas_mobil;
	public $harga_mobil;
	public $warna_mobil;
	public $plat_no_mobil;

	public function __construct($db){
		$this->conn = $db;
	}

	function read(){
		$query = " SELECT * FROM " . $this->table_name;

		$stmt = $this->conn->prepare($query);

		$stmt->execute();
		return $stmt;
	}

	function create()
	{
		$query = "INSERT INTO " . $this -> table_name. " SET id_mobil=:id_mobil, nama_mobil=:nama_mobil, merk_mobil=:merk_mobil,tahun_mobil=:tahun_mobil, kapasitas_mobil=:kapasitas_mobil, harga_mobil=:harga_mobil,warna_mobil=:warna_mobil, plat_no_mobil=:plat_no_mobil";

		$stmt = $this->conn->prepare($query);

		$this->id_mobil=htmlspecialchars(strip_tags($this->id_mobil));
		$this->nama_mobil=htmlspecialchars(strip_tags($this->nama_mobil));
		$this->merk_mobil=htmlspecialchars(strip_tags($this->merk_mobil));
		$this->tahun_mobil=htmlspecialchars(strip_tags($this->tahun_mobil));
		$this->kapasitas_mobil=htmlspecialchars(strip_tags($this->kapasitas_mobil));
		$this->harga_mobil=htmlspecialchars(strip_tags($this->harga_mobil));
		$this->warna_mobil=htmlspecialchars(strip_tags($this->warna_mobil));
		$this->plat_no_mobil=htmlspecialchars(strip_tags($this->plat_no_mobil));

		$stmt->bindParam(":id_mobil",$this->id_mobil);
		$stmt->bindParam(":nama_mobil",$this->nama_mobil);
		$stmt->bindParam(":merk_mobil",$this->merk_mobil);
		$stmt->bindParam(":tahun_mobil",$this->tahun_mobil);
		$stmt->bindParam(":kapasitas_mobil",$this->kapasitas_mobil);
		$stmt->bindParam(":harga_mobil",$this->harga_mobil);
		$stmt->bindParam(":warna_mobil",$this->warna_mobil);
		$stmt->bindParam(":plat_no_mobil",$this->plat_no_mobil);

		if ($stmt->execute()) {
			return true;
		}
		return false;

	}

	function update()
	{
		$query = "UPDATE " . $this -> table_name . " SET id_mobil=:id_mobil, nama_mobil=:nama_mobil, merk_mobil=:merk_mobil,tahun_mobil=:tahun_mobil, kapasitas_mobil=:kapasitas_mobil, harga_mobil=:harga_mobil,warna_mobil=:warna_mobil, plat_no_mobil=:plat_no_mobil WHERE id_mobil=:id_mobil";
		$stmt = $this->conn->prepare($query);

		$this->id_mobil=htmlspecialchars(strip_tags($this->id_mobil));
		$this->nama_mobil=htmlspecialchars(strip_tags($this->nama_mobil));
		$this->merk_mobil=htmlspecialchars(strip_tags($this->merk_mobil));
		$this->tahun_mobil=htmlspecialchars(strip_tags($this->tahun_mobil));
		$this->kapasitas_mobil=htmlspecialchars(strip_tags($this->kapasitas_mobil));
		$this->harga_mobil=htmlspecialchars(strip_tags($this->harga_mobil));
		$this->warna_mobil=htmlspecialchars(strip_tags($this->warna_mobil));
		$this->plat_no_mobil=htmlspecialchars(strip_tags($this->plat_no_mobil));

		$stmt->bindParam(":id_mobil",$this->id_mobil);
		$stmt->bindParam(":nama_mobil",$this->nama_mobil);
		$stmt->bindParam(":merk_mobil",$this->merk_mobil);
		$stmt->bindParam(":tahun_mobil",$this->tahun_mobil);
		$stmt->bindParam(":kapasitas_mobil",$this->kapasitas_mobil);
		$stmt->bindParam(":harga_mobil",$this->harga_mobil);
		$stmt->bindParam(":warna_mobil",$this->warna_mobil);
		$stmt->bindParam(":plat_no_mobil",$this->plat_no_mobil);

		if ($stmt->execute()) {
			return true;
		}
		return false;



	}
	function delete()
	{
		$query = "DELETE FROM " . $this -> table_name . " WHERE id_mobil =?";
		$stmt = $this->conn->prepare($query);

		$this->created=htmlspecialchars(strip_tags($this->id_mobil));

		$stmt->bindParam(1,$this->id_mobil);

		if ($stmt->execute()) {
			return true;
		}
		return false;
	}
}
?>