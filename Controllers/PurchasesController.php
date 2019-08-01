<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Brands;
use \Models\Purchases;

class PurchasesController extends Controller {

	private $user;
	private $arrayInfo;

	public function __construct() {
		$this->user = new Users();

		if(!$this->user->isLogged()) {
			header("Location: ".BASE_URL."login");
			exit;
		}

		if (!$this->user->hasPermission('purchases_view')) {
			header("Location: ".BASE_URL);
			exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'purchases'
		);

	}

	public function index() {
		$purchases = new Purchases();

		$this->arrayInfo['list'] = $purchases->getAll();

		$this->loadTemplate('purchases', $this->arrayInfo);
	}
/*
	public function add() {

		$this->arrayInfo['errorItems'] = array();

		$brand = new Brands();

		$this->arrayInfo['name'] = $brand->getAll();

		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {
			$this->arrayInfo['errorItems'] = $_SESSION['formError'];
			unset($_SESSION['formError']);
		}


		$this->loadTemplate('brands_add', $this->arrayInfo);
	}

	public function add_action() {
		$brand = new Brands();

		if(!empty($_POST['name'])) {
			$name = $_POST['name'];
			$id = $brand->addBrand($name);

			header("Location: ".BASE_URL.'brands');
			exit;
		} else {
			$_SESSION['formError'] = array('name');

			header("Location: ".BASE_URL.'brands/add');
			exit;
		}
	}	

	public function del($id) {
		if(!empty($id)) {

			$brand = new Brands();
			$brand->del($id);
		}

		header("Location: ".BASE_URL.'brands');
		exit;
	}

	public function edit($id) {
		if(!empty($id)){

			$brands = new Brands();

			$this->arrayInfo['info'] = $brands->get($id);
			//$this->arrayInfo['id'] = $id;
			$this->arrayInfo['errorItems'] = array();

			if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {
				$this->arrayInfo['errorItems'] = $_SESSION['formError'];
				unset($_SESSION['formError']);
			}


			$this->loadTemplate('brands_edit', $this->arrayInfo);
		} else {
			header("Location: ".BASE_URL.'brands');
			exit;
		}
	}

	public function edit_action($id) {
		if(!empty($id)) {

			$brands = new Brands();

			if(!empty($_POST['name'])) {
				$name = $_POST['name'];

				$brands->update($name, $id);
				
				header("Location: ".BASE_URL.'brands');
				exit;

			} else {
				$_SESSION['formError'] = array('name');

				header("Location: ".BASE_URL.'brands/edit/'.$id);
				exit;
			}
		}
	}*/
}