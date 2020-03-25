<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;

class LoginController extends Controller {

	private $user;

	public function index() {
		$array = array('error' => '');
		if (!empty($_SESSION['errorMsg'])) {
			$array['error'] = $_SESSION['errorMsg'];
			$_SESSION['errorMsg'] = '';
		}
		$this->LoadView('login', $array);
	}



	public function verifyLogin(){

		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$username=$_POST['username'];
			$password=$_POST['password'];

			//echo $username."</br>";
			//echo $password."</br>";

			$this->user = new Users($username, $password);

			if($this->user->validateLogin($username, $password) == true){
				header("Location: ".BASE_URL);
				exit;						


		} else {

			$_SESSION['errorMsg'] = 'Usuário e/ou senha errados!';
		}

	} else {
		   $_SESSION['errorMsg'] = 'Preencha os campos abaixo.';
	}

			header("Location: ".BASE_URL."login");
			exit;	
	}


	public function logout(){

		unset($_SESSION['token']);
		header("Location: ".BASE_URL);
		exit;
	}

}



