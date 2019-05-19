<?php 
class Users{
	private $db;
	public function __construct($database)
	{   $this->db = $database; }	
	public function user_exists($username) 
	{	$query = $this->db->prepare("SELECT COUNT(id) FROM users WHERE username= ?");
		$query->bindValue(1, $username);
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

	public function tambahUser($username,$password,$level,$nama,$locked) {	
		$time 		= time();
		$ip 		= $_SERVER['REMOTE_ADDR'];
		$password   = sha1($password);
	 	$query 	= $this->db->prepare("INSERT INTO users (username, password, level,  namalengkap, time, confirmed, ip) VALUES (?, ?, ?, ?, ?, ?, ?)");
	 	$query->bindValue(1, $username);
		$query->bindValue(2, $password);
		$query->bindValue(3, $level);
		$query->bindValue(4, $nama);
		$query->bindValue(5, $time);
		$query->bindValue(6, 1);
		$query->bindValue(7, $ip);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function detailUser($id) {
		$query = $this->db->prepare("SELECT * FROM users WHERE id = ?");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	} 

	public function ubahUser($id,$password,$level,$nama,$locked)
	{	$time 		= time();
		$ip 		= $_SERVER['REMOTE_ADDR'];
		$password   = sha1($password);
	 	$query 	= $this->db->prepare("UPDATE users SET password = ?, level = ?, namalengkap = ?, time = ?, confirmed = ? , ip = ?  WHERE id = ?");
		$query->bindValue(1, $password);
		$query->bindValue(2, $level);
		$query->bindValue(3, $nama);
		$query->bindValue(4, $time);
		$query->bindValue(5, $locked);
		$query->bindValue(6, $ip);	
		$query->bindValue(7, $id);
	 	try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function changepwd($id,$password) {
		$password   = sha1($password);
	 	$query 	= $this->db->prepare("UPDATE users SET password = ? WHERE id = ?");
		$query->bindValue(1, $password);
		$query->bindValue(2, $id);
	 	try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function delete($id){
		$sql="DELETE FROM users WHERE id = ?";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $id);
		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}	
	
	public function login($username, $password)
	{	$query = $this->db->prepare("SELECT `password`, `id` FROM `users` WHERE `username` = ?");
		$query->bindValue(1, $username);
		try{
			$query->execute();
			$data 				= $query->fetch();
			$stored_password 	= $data['password'];
			$id   				= $data['id'];
			if($stored_password === sha1($password)){
				return $id;	
			}else{
				return false;	
			}
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	 
	public function get_user_by_level($level)
	{	$query = $this->db->prepare("SELECT * FROM `users` WHERE `level`= ?");
		$query->bindValue(1, $level);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_users()
	{	$query = $this->db->prepare("SELECT * FROM `users` ORDER BY `time` DESC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function log_users($iduser,$log)
	{	$time 		= time();
		$ip 		= $_SERVER['REMOTE_ADDR'];
		$browser	= $_SERVER['HTTP_USER_AGENT'];
	 	$query 	= $this->db->prepare("INSERT INTO `log_users` (`iduser`,`time`,`ip`,`browser`,`log`) VALUES (?, ?, ?, ?, ?)");
	 	$query->bindValue(1, $iduser);
		$query->bindValue(2, $time);
		$query->bindValue(3, $ip);
		$query->bindValue(4, $browser);
		$query->bindValue(5, $log);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function get_users_log()
	{	$query = $this->db->prepare("SELECT * FROM log_users ORDER BY time desc");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}

	public function userdata($id)
	{	$query = $this->db->prepare("SELECT * FROM users WHERE id = ?");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
	
}
