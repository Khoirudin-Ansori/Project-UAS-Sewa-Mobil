<?php
/**
 * 
 */
class Gallery_Mobil 
{
	private $conn;
	private $table_name = "tb_gallery_mobil";

	public $id_gallery;
	public $id_mobil;
	public $image;

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
		$query = "INSERT INTO " . $this -> table_name. " SET id_gallery=:id_gallery, id_mobil=:id_mobil, image=:image";

		$stmt = $this->conn->prepare($query);

		$this->id_gallery=htmlspecialchars(strip_tags($this->id_gallery));
		$this->id_mobil=htmlspecialchars(strip_tags($this->id_mobil));
		$this->image=htmlspecialchars(strip_tags($this->image));

		$stmt->bindParam(":id_gallery",$this->id_gallery);
		$stmt->bindParam(":id_mobil",$this->id_mobil);
		$stmt->bindParam(":image",$this->image);

		if ($stmt->execute()) {
			return true;
		}
		return false;

	}

	function update()
	{
		$query = "UPDATE " . $this -> table_name . " SET id_gallery=:id_gallery, id_mobil=:id_mobil, image=:image WHERE id_gallery=:id_gallery";
		$stmt = $this->conn->prepare($query);

		$this->id_gallery=htmlspecialchars(strip_tags($this->id_gallery));
		$this->id_mobil=htmlspecialchars(strip_tags($this->id_mobil));
		$this->image=htmlspecialchars(strip_tags($this->image));

		$stmt->bindParam(":id_gallery",$this->id_gallery);
		$stmt->bindParam(":id_mobil",$this->id_mobil);
		$stmt->bindParam(":image",$this->image);

		if ($stmt->execute()) {
			return true;
		}
		return false;



	}
	function delete()
	{
		$query = "DELETE FROM " . $this -> table_name . " WHERE id_gallery =?";
		$stmt = $this->conn->prepare($query);

		$this->created=htmlspecialchars(strip_tags($this->id_gallery));

		$stmt->bindParam(1,$this->id_gallery);

		if ($stmt->execute()) {
			return true;
		}
		return false;
	}

}
?>