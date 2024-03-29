<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Wallets;
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


	public function add(){

		 $p = new Products();
		 $w = new Wallets();

		 $this->arrInfo['list'] = $w->getAll();
		 //$this->arrInfo['data'] = $p->getAll();
		if (isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {

			$this->arrInfo['errorItems'] = $_SESSION['formError'];
			//print_r($array['errorItems']);
			//exit;
			unset($_SESSION['formError']);
		}


		 $this->loadTemplate('products_add', $this->arrInfo);
	}


	public function add_action()
	{			

			$p = new Products();
			$w = new Wallets();	
			
		if (!empty($_POST['name'])) {

			$name = $_POST['name'];
			$id = $_POST['wallet'];

			$p->insertProduct($name, $id);


			 header("Location: ".BASE_URL.'products');

		} else {

			return false;
			
		}



					
	}
	
}