<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Wallets;

class WalletsController extends Controller {

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
			'menuActive' => 'wallets'

		);						


	}

	// Views //
	public function index() {
			$w = new Wallets();
			$this->arrInfo['list'] = $w->getAll();
			
			$this->loadTemplate('wallets', $this->arrInfo);
	}


	public function add(){

		$this->loadTemplate('wallets_add', $this->arrInfo);
	}

	public function add_action(){			
			$w = new Wallets();

		if(!empty($_POST['name'])){
			$name = $_POST['name'];

			$w->insertWallet($name);
		    

		  //$_SESSION['success'] = "Adicionado com sucesso!"; 
		  //exit;
		   header("Location: ".BASE_URL.'wallets');

		} else {

			return false;
		}	

	}


	public function edit($id){
		if(!empty($id)) {
			
			$w = new Wallets();

			$this->arrInfo['wallet_name'] = $w->getName($id);
			$this->arrInfo['wallet_id'] = $id;


		if (isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {

			$this->arrInfo['errorItems'] = $_SESSION['formError'];
			//print_r($array['errorItems']);
			//exit;
			unset($_SESSION['formError']);
		}

			$this->loadTemplate('wallets_edit', $this->arrInfo);
			

		} else {
			header("Location: ".BASE_URL."wallets");
			exit;
		}			
	}


	public function edit_action($id){
		if(!empty($id)) {
			$w = new Wallets();
		if(!empty($_POST['name'])){
			$name = $_POST['name'];
		
			$w->alterNamebyId($name, $id);
			

			header("Location: ".BASE_URL.'wallets');
			exit;

		} else {
			$_SESSION['formError'] = array('name');

			header("Location: ".BASE_URL.'wallets/edit/'.$id);
			exit;
		}
			
		} else {
			header("Location: ".BASE_URL.'wallets');
			exit;
		}		
	  }		


	  public function del($id){

	  		$w = new Wallets();

	  		$w->deleteWalletEmptyProduct($id);

	  		header("Location: ".BASE_URL.'wallets');
	  }
}