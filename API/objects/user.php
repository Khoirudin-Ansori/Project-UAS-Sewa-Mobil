<?php
/**
 * 
 */
class User 
{
	private $conn;
	private $table_name = "tb_users";

	public $id_user;
	public $username;
	public $name;
	public $nik;
	public $email;
	public $no_telp;
	public $jenis_kelamin;
	public $alamat;
	public $password;

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
		$query = "INSERT INTO " . $this -> table_name. " SET id_user=:id_user, username=:username, name=:name,nik=:nik, email=:email,no_telp=:no_telp,jenis_kelamin=:jenis_kelamin, alamat=:alamat, password=:password WHERE id_user=:id_user";

		$stmt = $this->conn->prepare($query);

		$this->id_user=htmlspecialchars(strip_tags($this->id_user));
		$this->username=htmlspecialchars(strip_tags($this->username));
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->nik=htmlspecialchars(strip_tags($this->nik));
		$this->email=htmlspecialchars(strip_tags($this->email));
		$this->no_telp=htmlspecialchars(strip_tags($this->no_telp));
		$this->jenis_kelamin=htmlspecialchars(strip_tags($this->jenis_kelamin));
		$this->alamat=htmlspecialchars(strip_tags($this->alamat));
		$this->password=htmlspecialchars(strip_tags($this->password));

		$stmt->bindParam(":id_user",$this->id_user);
		$stmt->bindParam(":username",$this->username);
		$stmt->bindParam(":name",$this->name);
		$stmt->bindParam(":nik",$this->nik);
		$stmt->bindParam(":email",$this->email);
		$stmt->bindParam(":no_telp",$this->no_telp);
		$stmt->bindParam(":jenis_kelamin",$this->jenis_kelamin);
		$stmt->bindParam(":alamat",$this->alamat);
		$stmt->bindParam(":password",$this->password);

		if ($stmt->execute()) {
			return true;
		}
		return false;

	}

	function update()
	{
		$query = "UPDATE " . $this -> table_name . " SET id_user=:id_user, username=:username, name=:name,nik=:nik, email=:email,no_telp=:no_telp,jenis_kelamin=:jenis_kelamin, alamat=:alamat, password=:password";
		$stmt = $this->conn->prepare($query);

			$this->id_user=htmlspecialchars(strip_tags($this->id_user));
		$this->username=htmlspecialchars(strip_tags($this->username));
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->nik=htmlspecialchars(strip_tags($this->nik));
		$this->email=htmlspecialchars(strip_tags($this->email));
		$this->no_telp=htmlspecialchars(strip_tags($this->no_telp));
		$this->jenis_kelamin=htmlspecialchars(strip_tags($this->jenis_kelamin));
		$this->alamat=htmlspecialchars(strip_tags($this->alamat));
		$this->password=htmlspecialchars(strip_tags($this->password));

		$stmt->bindParam(":id_user",$this->id_user);
		$stmt->bindParam(":username",$this->username);
		$stmt->bindParam(":name",$this->name);
		$stmt->bindParam(":nik",$this->nik);
		$stmt->bindParam(":email",$this->email);
		$stmt->bindParam(":no_telp",$this->no_telp);
		$stmt->bindParam(":jenis_kelamin",$this->jenis_kelamin);
		$stmt->bindParam(":alamat",$this->alamat);
		$stmt->bindParam(":password",$this->password);


		if ($stmt->execute()) {
			return true;
		}
		return false;



	}
	function delete()
	{
		$query = "DELETE FROM " . $this -> table_name . " WHERE id_user =?";
		$stmt = $this->conn->prepare($query);

		$this->password=htmlspecialchars(strip_tags($this->id_user));

		$stmt->bindParam(1,$this->id_user);

		if ($stmt->execute()) {
			return true;
		}
		return false;
	}

}	
?>