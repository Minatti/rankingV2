<?php
namespace Models;

use \Core\Model;
use \Models\Permissions;

class Users extends Model {

	private $uid;
	private $permissions;
	private $name;
	//private $isAdmin;

	public function isLogged() {

		if (!empty($_SESSION['token'])) {
			
			$token = $_SESSION['token'];

			$sql = "SELECT id, id_permission, name FROM users WHERE token = :token";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':token', $token);
			$sql->execute();

			if ($sql->rowCount() <> 0) {
				$p = new Permissions();

				$data = $sql->fetch();
				$this->uid = $data['id'];
				$this->name = $data['name'];
				// $this->isAdmin = $data['']
				$this->permissions = $p->getPermission($data['id_permission']);
				//print_r($this->permissions);			
				return true;
			}
		}

		return false;
	}

	public function hasPermission($permission_slug) {
		if(in_array($permission_slug, $this->permissions)) {
			return true;
		} else {
			return false;
		}

	}


	 public function validateLogin($username, $password){

		//echo "usuario".$username;
		//echo "password".$password;
		$sql = "SELECT id FROM users WHERE username = :username AND password = :password
			    AND id_permission = 1";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':username', $username);
		$sql->bindValue(':password', $password); //hash
		$sql->execute();

		//echo "<br/>";
		//var_dump($sql);
		//$qtd = $sql->rowCount();
		//echo $qtd;
		//	
		if ($sql->rowCount() <> 0) {

			 $data = $sql->fetch();
			 $token = md5(time().rand(0,999).time());

			 $sql = "UPDATE users SET token = :token WHERE id = :id";
			 $sql = $this->db->prepare($sql);
			 $sql->bindValue(':token', $token);
			 $sql->bindValue(':id', $data['id']);
			 $sql->execute();

			 $_SESSION['token'] = $token;
			
			 return true;
		}

			return false;
	}

	public function getId(){
		return $this->uid;
	}

	public function getName(){
		return $this->name;
	}

}