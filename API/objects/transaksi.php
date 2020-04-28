<?php
/**
 * 
 */
class Transaksi
{
	private $conn;
	private $table_name = "tb_transaksi";

	public $kode_transaksi;
	public $id_user;
	public $tgl_order;
	public $total_pembayaran;
	public $tgl_pembayaran;
	public $bukti_pembayaran;
	public $status_pembayaran;
	public $status_transaksi;

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
		$query = "INSERT INTO " . $this -> table_name. " SET kode_transaksi=:kode_transaksi, id_user=:id_user, tgl_order=:tgl_order,total_pembayaran=:total_pembayaran, tgl_pembayaran=:tgl_pembayaran, bukti_pembayaran=:bukti_pembayaran,status_pembayaran=:status_pembayaran, status_transaksi=:status_transaksi WHERE kode_transaksi=:kode_transaksi";

		$stmt = $this->conn->prepare($query);

		$this->kode_transaksi=htmlspecialchars(strip_tags($this->kode_transaksi));
		$this->id_user=htmlspecialchars(strip_tags($this->id_user));
		$this->tgl_order=htmlspecialchars(strip_tags($this->tgl_order));
		$this->total_pembayaran=htmlspecialchars(strip_tags($this->total_pembayaran));
		$this->tgl_pembayaran=htmlspecialchars(strip_tags($this->tgl_pembayaran));
		$this->bukti_pembayaran=htmlspecialchars(strip_tags($this->bukti_pembayaran));
		$this->status_pembayaran=htmlspecialchars(strip_tags($this->status_pembayaran));
		$this->status_transaksi=htmlspecialchars(strip_tags($this->status_transaksi));

		$stmt->bindParam(":kode_transaksi",$this->kode_transaksi);
		$stmt->bindParam(":id_user",$this->id_user);
		$stmt->bindParam(":tgl_order",$this->tgl_order);
		$stmt->bindParam(":total_pembayaran",$this->total_pembayaran);
		$stmt->bindParam(":tgl_pembayaran",$this->tgl_pembayaran);
		$stmt->bindParam(":bukti_pembayaran",$this->bukti_pembayaran);
		$stmt->bindParam(":status_pembayaran",$this->status_pembayaran);
		$stmt->bindParam(":status_transaksi",$this->status_transaksi);


		if ($stmt->execute()) {
			return true;
		}
		return false;

	}

	function update()
	{
		$query = "UPDATE " . $this -> table_name . " SET kode_transaksi=:kode_transaksi, id_user=:id_user, tgl_order=:tgl_order,total_pembayaran=:total_pembayaran, tgl_pembayaran=:tgl_pembayaran, bukti_pembayaran=:bukti_pembayaran,status_pembayaran=:status_pembayaran, status_transaksi=:status_transaksi";
		$stmt = $this->conn->prepare($query);

		$this->kode_transaksi=htmlspecialchars(strip_tags($this->kode_transaksi));
		$this->id_user=htmlspecialchars(strip_tags($this->id_user));
		$this->tgl_order=htmlspecialchars(strip_tags($this->tgl_order));
		$this->total_pembayaran=htmlspecialchars(strip_tags($this->total_pembayaran));
		$this->tgl_pembayaran=htmlspecialchars(strip_tags($this->tgl_pembayaran));
		$this->bukti_pembayaran=htmlspecialchars(strip_tags($this->bukti_pembayaran));
		$this->status_pembayaran=htmlspecialchars(strip_tags($this->status_pembayaran));
		$this->status_transaksi=htmlspecialchars(strip_tags($this->status_transaksi));

			$stmt->bindParam(":kode_transaksi",$this->kode_transaksi);
		$stmt->bindParam(":id_user",$this->id_user);
		$stmt->bindParam(":tgl_order",$this->tgl_order);
		$stmt->bindParam(":total_pembayaran",$this->total_pembayaran);
		$stmt->bindParam(":tgl_pembayaran",$this->tgl_pembayaran);
		$stmt->bindParam(":bukti_pembayaran",$this->bukti_pembayaran);
		$stmt->bindParam(":status_pembayaran",$this->status_pembayaran);
		$stmt->bindParam(":status_transaksi",$this->status_transaksi);
		if ($stmt->execute()) {
			return true;
		}
		return false;



	}
	function delete()
	{
		$query = "DELETE FROM " . $this -> table_name . " WHERE kode_transaksi =?";
		$stmt = $this->conn->prepare($query);

		$this->created=htmlspecialchars(strip_tags($this->kode_transaksi));

		$stmt->bindParam(1,$this->kode_transaksi);

		if ($stmt->execute()) {
			return true;
		}
		return false;
	}

}	
?>