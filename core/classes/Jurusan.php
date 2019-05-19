<?php
class Jurusan {
    private $db;
	public function __construct($database) {
        $this->db = $database; 
    }

	public function jurusan_exists($kodeJur, $namaJur) {
        $query = $this->db->prepare("SELECT COUNT(id) FROM jurusan WHERE kodeJur = ? or namaJur = ?");
        $query->bindValue(1, $kodeJur);
        $query->bindValue(2, $namaJur);
		try
		{	$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
    }
    
    public function tampilJurusan() {
        $query = $this->db->prepare("SELECT * FROM jurusan ORDER BY namaJur DESC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
    }
    
    public function detailJurusan($id) {
		$query = $this->db->prepare("SELECT * FROM jurusan WHERE id = ?");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	public function tambahJurusan($kodeJur,$namaJur) {	
		$query 	= $this->db->prepare("INSERT INTO jurusan (kodeJur, namaJur) VALUES (?, ?)");
	 	$query->bindValue(1, $kodeJur);
		$query->bindValue(2, $namaJur);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function ubahJurusan($id,$kodeJur,$namaJur) {
		$query 	= $this->db->prepare("UPDATE jurusan SET kodeJur = ?, namaJur = ? WHERE id = ?");
		$query->bindValue(1, $kodeJur);
		$query->bindValue(2, $namaJur);
		$query->bindValue(3, $id);

		try {
			$query->execute();
		}
		catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	public function deleteJurusan($id){
		$sql="DELETE FROM jurusan WHERE id = ?";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $id);
		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function relasiJurusan(){
		$query = $this->db->prepare("select * from jurusan ORDER BY namaJur ASC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}

	public function jurusanData($id)
	{	$query = $this->db->prepare("SELECT * FROM jurusan WHERE id = ?");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function get_jurusan() {
		$query = $this->db->prepare("select * from jurusan ORDER BY namaJur ASC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}	

}
?>