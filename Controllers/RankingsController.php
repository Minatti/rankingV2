<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Rankings;

class RankingsController extends Controller {

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
			'menuActive' => 'rankings'

		);						


	}

	// Views //
	public function index() {
			$r = new Rankings();
			$this->arrInfo['data'] = $p->getAll();
			
			$this->loadTemplate('rankings', $this->arrInfo);
	}


}