<?php if( !defined('PATH_SYSTEM') ) die ( "Bad requested AAA!" );

//include PATH_APPLICATION .'/model/Crud_Model.php';
include PATH_APPLICATION .'/block/home.php';

class Home_Controller extends Controller {

	private $__block = NULL;

	public function indexAction() {
		// Initiate home block to do with database
		$this->__block = new Home();
		// Load home view and data that's got from database
		$this->view->load('home', $this->__block->get_records_from_db());
		// Show 
		$this->view->show();
	}

	public function createAction(){
		// Initiate empty date 
		$none = array();
		// Load view and data
		$this->view->load('create', $none);
		// Show view and data
		$this->view->show();
		// Initiate home block to do with database
		$this->__block = new Home();
		// Execute function add_a_new_record
		$this->__block->add_a_new_record();
		
	}

	public function readAction(){
		/*
		// Get id 
		$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record not found!(read_one)');
		// Initiate SON class model
		$db = new Crud_Model();
		// Set table name and id key
		$db->set_all('products', 'id');
		// Execute query
		$row = $db->select_by_id('*', $id);
		// Initiate home block
		$this->__block = new Home();
		// Execute view_a_detail_record function
		*/
		//Load view and data
		//$this->view->load('read', $row);
		$this->view->load('read', $this->__block->view_detail_a_record());
		// Show view and data
		$this->view->show();
	}

	public function updateAction(){
		$id = isset($_GET['id_up']) ? $_GET['id_up'] : die('ERROR: Record not found!(update)');
		$db = new Crud_Model();
		$db->set_all('products', 'id');
		$row = $db->select_by_id('*', $id);
		$this->view->load('update', $row);
		$this->view->show();
		if( isset($_SESSION['name'])&&isset($_SESSION['description'])&&isset($_SESSION['price']) ){
			$data = array('name'=>$_SESSION['name'], 'description'=>$_SESSION['description'], 'price'=>$_SESSION['price']);
			//var_dump($data);
			//$db_update = new Crud_Model();
			//$db_update->set_all('products', 'id');
			if( $db->update_by_id($data, $id) ){
				$_SESSION['update'] = true;
			} else $_SESSION['update'] = false;
			
		} 
	}

} ?>