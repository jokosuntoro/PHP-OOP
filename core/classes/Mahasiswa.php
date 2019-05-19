<?php
class Mahasiswa {
    private $db;
	public function __construct($database) {
        $this->db = $database; 
    }

	public function mahasiswa_exists($nim) {	
		$query = $this->db->prepare("SELECT COUNT(idMhs) FROM mahasiswa WHERE nim = ?");
		$query->bindValue(1, $nim);
		try
		{	$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e){
			die($e->getMessage());
		}
	}

	public function tampilMahasiswa() {
        $query = $this->db->prepare("SELECT * FROM mahasiswa ORDER BY nim DESC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	
	public function getMahasiswaJurusan($id) {
		$query = $this->db->prepare("SELECT * FROM mahasiswa WHERE idMhs = ? ORDER BY idMhs DESC LIMIT 1");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function tambahMahasiswa($nim, $namaMhs, $idJur) {
		$query 	= $this->db->prepare("INSERT INTO mahasiswa (nim, namaMhs, idJur) VALUES (?, ?, ?)");
	 	$query->bindValue(1, $nim);
		$query->bindValue(2, $namaMhs);
		$query->bindValue(3, $idJur);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function ubahMahasiswa($idMhs,$nim,$namaMhs, $idJur) {
		$query 	= $this->db->prepare("UPDATE mahasiswa SET nim = ?, namaMhs = ?, idJur = ? WHERE idMhs = ?");
		$query->bindValue(1, $nim);
		$query->bindValue(2, $namaMhs);
		$query->bindValue(3, $idJur);
		$query->bindValue(4, $idMhs);

		try {
			$query->execute();
		}
		catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	public function mahasiswaData($id) {
		$query = $this->db->prepare("SELECT * FROM mahasiswa WHERE idMhs = ?");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
}
?>