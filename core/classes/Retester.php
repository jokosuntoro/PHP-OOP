<?php 
class Retester{
	private $db;
	public function __construct($database)
	{   
		$this->db = $database; 
	}	
	public function retester_exists($namaretester) 
	{	
		$query = $this->db->prepare("SELECT COUNT(`id`) FROM `retester` WHERE `namaretester`= ?");
		$query->bindValue(1, $namaretester);
		try
		{	$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				return true;
			}else{
				return false;
			}
		} 
		catch (PDOException $e){
			die($e->getMessage());
		}
	}

	public function email_exists($email)
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `customers` WHERE `email`= ?");
		$query->bindValue(1, $email);
		try{
			$query->execute();
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
	public function add_retester($namaretester,$alamat,$telp,$email,$pic,$jenispekerjaan)
	{	$time 		= time();
		$ip 		= $_SERVER['REMOTE_ADDR'];
	 	$query 	= $this->db->prepare("INSERT INTO `retester` (`namaretester`, `alamat`, `telp`, `email`, `pic`,`jenispekerjaan`, `time`, `ip`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$query->bindValue(1, $namaretester);
		$query->bindValue(2, $alamat);
		$query->bindValue(3, $telp);
		$query->bindValue(4, $email);
		$query->bindValue(5, $pic);
		$query->bindValue(6, $jenispekerjaan);
		$query->bindValue(7, $time);
		$query->bindValue(8, $ip);
	 	try{
			$query->execute();
	 	}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function update_retester($idretester,$namaretester,$alamat,$telp,$email,$pic,$jenispekerjaan)
	{	
		$time 		= time();
		$ip 		= $_SERVER['REMOTE_ADDR'];
	 	$query 	= $this->db->prepare("UPDATE `retester` SET `namaretester` = ? , `alamat` = ? , `telp` = ? , `email` = ? , `pic` = ? , `jenispekerjaan` = ? , `ip` = ? , `time` = ? WHERE `idretester` = ?");
		$query->bindValue(1, $namaretester);
		$query->bindValue(2, $alamat);
		$query->bindValue(3, $telp);
		$query->bindValue(4, $email);
		$query->bindValue(5, $pic);
		$query->bindValue(6, $jenispekerjaan);
		$query->bindValue(7, $ip);
		$query->bindValue(8, $time);
		$query->bindValue(9, $idretester);
	 	try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function delete($id){
		$sql="DELETE FROM `retester` WHERE `idretester` = ?";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $id);
		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}	
	
	public function activate($email, $email_code)
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `customers` WHERE `email` = ? AND `email_code` = ? AND `confirmed` = ?");
		$query->bindValue(1, $email);
		$query->bindValue(2, $email_code);
		$query->bindValue(3, 0);
		try{
			$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				$query_2 = $this->db->prepare("UPDATE `customers` SET `confirmed` = ? WHERE `email` = ?");
				$query_2->bindValue(1, 1);
				$query_2->bindValue(2, $email);				
				$query_2->execute();
				return true;
			}else{
				return false;
			}
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function email_confirmed($username)
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `customers` WHERE `username`= ? AND `confirmed` = ?");
		$query->bindValue(1, $username);
		$query->bindValue(2, 1);
		try{
			$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				return true;
			}else{
				return false;
			}
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function login_customer($username, $password)
	{	$query = $this->db->prepare("SELECT `email`, `ticket_id` FROM `customers` WHERE `email` = ?");
		$query->bindValue(1, $username);
		try{
			$query->execute();
			$data 				= $query->fetch();
			$stored_password 	= $data[`password`];
			$id   				= $data[`id`];
			if($stored_password === sha1($password)){
				return $id;	
			}else {
				return false;	
			}
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function retester_data($id)
	{	$query = $this->db->prepare("SELECT * FROM `retester` WHERE `idretester`= ?");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function get_retester()
	{	$query = $this->db->prepare("select * from retester ORDER BY namaretester ASC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}	
}
