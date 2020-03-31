<?php
namespace Controllers;

use \Core\Controller;
use \Models\Goals;
use \Models\Users;


class GoalsController extends Controller {

	private $user;
	private $arrInfo;
	public function __construct(){

		$this->user = new Users();

		if (!$this->user->isLogged()) {	
			header("Location: ".BASE_URL."login");
			exit;
		}

		if (!$this->user->hasPermission('pview')) {
			header("Location: ".BASE_URL);
			exit;		
		}

		$this->arrInfo = array(
			'user' => $this->user,
			'menuActive' => 'goals'

		);						


	}

	// Views //
	public function index() {

			//$g = new Goals();

			//$this->arrInfo['list'] = $g->getAll();
			
			$this->loadTemplate('goals', $this->arrInfo);
	}


	
	public function add(){


		$this->loadTemplate('goals_add', $this->arrInfo);
	}	

}