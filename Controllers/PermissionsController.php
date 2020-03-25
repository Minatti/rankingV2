<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Permissions;

class PermissionsController extends Controller {

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
			'menuActive' => 'permissions'
		);						

	}

	public function index() {
			$p = new Permissions();
			$this->arrInfo['list'] = $p->getAllGroups();
			
			$this->loadTemplate('permissions', $this->arrInfo);
	}

	public function items(){
			$p = new Permissions();
			$this->arrInfo['items'] = $p->getAllItems();

			//print_r($arrInfo);
			//exit;
			
			$this->loadTemplate('permissions_items', $this->arrInfo);		

  }

  	public function items_add(){
			$p = new Permissions();

			$this->arrInfo['permission_items'] = $p->getAllItems();

		if (isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {

			$this->arrInfo['errorItems'] = $_SESSION['formError'];
			//print_r($array['errorItems']);
			//exit;
			unset($_SESSION['formError']);
		}

			$this->loadTemplate('permissions_items_add', $this->arrInfo);
	}


	public function items_del($id){

			$p = new Permissions();

			$p->deletePermissionItemByAdmin($id);
			
			header("Location: ".BASE_URL.'permissions_items');

	}

	public function items_add_action(){
			
			$p = new Permissions();

		if(!empty($_POST['name']) && !empty($_POST['name_slug'])){
			$name = $_POST['name'];
			$slug = $_POST['name_slug'];

			$p->addItem($name, $slug);

			//print_r($p);
			//exit;


			header("Location: ".BASE_URL.'permissions/items');

		} else {
			$_SESSION['formError'] = array('name');

			header("Location: ".BASE_URL.'permissions/item_add');
			exit;
		}		

	}

	public function add(){
			$p = new Permissions();
			$this->arrInfo['permission_items'] = $p->getAllItems();

		if (isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {

			$this->arrInfo['errorItems'] = $_SESSION['formError'];
			//print_r($array['errorItems']);
			//exit;
			unset($_SESSION['formError']);
		}

			$this->loadTemplate('permissions_add', $this->arrInfo);
	}

	public function add_action(){
				//Instanciando novo objeto;
			$p = new Permissions();
		if(!empty($_POST['name'])){
			$name = $_POST['name'];
			$id = $p->addGroup($name);

		if (isset($_POST['items']) && count($_POST['items']) > 0) {
					
			$items = $_POST['items'];

		foreach($items as $item){

			$p->linkGroupToItem($id, $item);	
			}
					
		}

			header("Location: ".BASE_URL.'permissions');

		} else {
			$_SESSION['formError'] = array('name');

			header("Location: ".BASE_URL.'permissions/add');
			exit;
		}
			
	}

	public function del($id_group){

			$p = new Permissions();

			$p->deleteGroup($id_group);
			

			header("Location: ".BASE_URL.'permissions');

	}

	public function edit($id){
		if(!empty($id)) {
			$this->arrInfo['errorItems'];

			$p = new Permissions();

			$this->arrInfo['permission_items'] = $p->getAllItems();

			$this->arrInfo['permission_id'] = $id;

			$this->arrInfo['permission_group_name'] = $p->getPermissionGroupName($id);

			$this->arrInfo['permission_group_slugs'] = $p->getPermission($id);



		if (isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {

			$this->arrInfo['errorItems'] = $_SESSION['formError'];
			//print_r($array['errorItems']);
			//exit;
			unset($_SESSION['formError']);
		}

			$this->loadTemplate('permissions_edit', $this->arrInfo);
	

		} else {
			header("Location: ".BASE_URL."permissions");
			exit;
		}			
	}

	public function edit_action($id){
		if(!empty($id)) {
			$p = new Permissions();
		if(!empty($_POST['name'])){
			$name = $_POST['name'];
		
			$p->alterNamebyId($name, $id);
			$p->clearLinks($id);

		if (isset($_POST['items']) && count($_POST['items']) > 0) {
					
			$items = $_POST['items'];

		foreach($items as $item){

			$p->linkGroupToItem($id, $item);	
		}
					
	}

			header("Location: ".BASE_URL.'permissions');
			exit;

		} else {
			$_SESSION['formError'] = array('name');

			header("Location: ".BASE_URL.'permissions/edit/'.$id);
			exit;
		}
			
	} else {
		header("Location: ".BASE_URL.'permissions');
		exit;
	}		
  }

  

}//classe