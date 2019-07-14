<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Options;

class OptionsController extends Controller {

	private $user;
	private $arrayInfo;

	public function __construct() {
		$this->user = new Users();

		if(!$this->user->isLogged()) {
			header("Location: ".BASE_URL."login");
			exit;
		}

		if (!$this->user->hasPermission('products_view')) {
			header("Location: ".BASE_URL);
			exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'products'
		);

	}

	public function index() {
		$options = new Options();

		$this->arrayInfo['list'] = $options->getAll(true);

		$this->loadTemplate('options', $this->arrayInfo);
	}

	public function add() {

		$this->arrayInfo['errorItems'] = array();

		$options = new Options();

		$this->arrayInfo['name'] = $options->getAll();

		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {
			$this->arrayInfo['errorItems'] = $_SESSION['formError'];
			unset($_SESSION['formError']);
		}


		$this->loadTemplate('options_add', $this->arrayInfo);
	}

	public function add_action() {
		$options = new Options();

		if(!empty($_POST['name'])) {
			$name = $_POST['name'];
			$id = $options->add($name);

			header("Location: ".BASE_URL.'options');
			exit;
		} else {
			$_SESSION['formError'] = array('name');

			header("Location: ".BASE_URL.'options/add');
			exit;
		}
	}	

	public function del($id) {
		if(!empty($id)) {

			$options = new Options();
			$options->del($id);
		}

		header("Location: ".BASE_URL.'options');
		exit;
	}

	public function edit($id) {
		if(!empty($id)){

			$options = new Options();

			$this->arrayInfo['info'] = $options->get($id);
			//$this->arrayInfo['id'] = $id;
			$this->arrayInfo['errorItems'] = array();

			if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0) {
				$this->arrayInfo['errorItems'] = $_SESSION['formError'];
				unset($_SESSION['formError']);
			}


			$this->loadTemplate('options_edit', $this->arrayInfo);
		} else {
			header("Location: ".BASE_URL.'options');
			exit;
		}
	}

	public function edit_action($id) {
		if(!empty($id)) {

			$options = new Options();

			if(!empty($_POST['name'])) {
				$name = $_POST['name'];

				$options->update($name, $id);
				
				header("Location: ".BASE_URL.'options');
				exit;

			} else {
				$_SESSION['formError'] = array('name');

				header("Location: ".BASE_URL.'options/edit/'.$id);
				exit;
			}
		}
	}
}