<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Wallets;
use \Models\Products;
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

			$this->arrInfo['list'] = $r->getAll();
			
			$this->loadTemplate('rankings', $this->arrInfo);
	}


		public function add() {

			$w = new Wallets();

			$this->arrInfo['wallets'] = $w->getList();

			$this->loadTemplate('rankings_add', $this->arrInfo);

    }
	

   	 public function get_products(){


   	 		if (isset($_POST['wallet'])) {

   	 			$id_wallet = $_POST['wallet'];

   	 			$p = new Products();

   	 			$products = $p->getListProducts($id_wallet);


   	 			echo json_encode($products);

   	 			
   	 		}
   	 		

   	 }


   	 public function add_action(){


   	 	if (!empty($_POST['wallet']) && !empty($_POST['product'])) {

   	 		$id_wallet = $_POST['wallet'];
			$id_product = $_POST['product'];
			$files = (!empty($_FILES['files']))?$_FILES['files']:array();			
			$position = $_POST['postion'];
			$quartil = $_POST['quartil'];
			$month = $_POST['month'];
			$year = $_POST['year'];

			$r = new Rankings();

			$r->add($id_wallet, $id_product, $files, $position, $quartil, $month, $year);


			header("Location: ".BASE_URL.'rankings');
			

   	 	} else {

   	 		return false;
   	 	}



   	 }


}