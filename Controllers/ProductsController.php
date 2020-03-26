<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Products;

class ProductsController extends Controller {

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
			'menuActive' => 'products'

		);						


	}

	// Views //
	public function index() {
			$p = new Products();
			$this->arrInfo['data'] = $p->getRelationship();
			
			$this->loadTemplate('products', $this->arrInfo);
	}


}