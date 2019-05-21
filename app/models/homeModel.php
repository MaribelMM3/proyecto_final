<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class user extends Model 
{
	public function login_mod($username, $password)
	{
		
		$ID = null;
		$connect = Model::getInstanceDB();
		$sql = 	"SELECT * from users WHERE user = :user and psw = :psw;";
		$stmt = $connect->prepare($sql);
		$stmt->bindParam(':user', $username);
		$stmt->bindParam(':psw', $password);

		$stmt->execute();
		if ($stmt->rowCount() == 1)
		{
			$_SESSION['username'] = $username;
			return true;
		} else {
			return false;
		}
	}
}

