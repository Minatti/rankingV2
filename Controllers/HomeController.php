<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;

class HomeController extends Controller {

	private $user;
	private $arrInfo;


	public function __construct(){

		$this->user = new Users();

		if (!$this->user->isLogged()) {	
			header("Location: ".BASE_URL."login");
			exit;
		}		


		$this->arrInfo = array(
			'user' => $this->user,
			'menuActive' => 'home'
		);		

	}

	public function index() {

		$this->loadTemplate('home', $this->arrInfo);

	}

}
