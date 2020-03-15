<?php if( !defined('PATH_SYSTEM') ) die ( "Bad requested AAA!" );

//include PATH_APPLICATION .'/model/Crud_Model.php';
include PATH_APPLICATION .'/block/home.php';

class Home_Controller extends Controller {

	private $__block = NULL;
	
	public function save_data_formAction(){
		if( isset($_POST['name'] ) ) echo $_POST['name'];
		else echo "not found data";
	}

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
		// Initiate 
		$this->__block = new Home();
		// Call function
		$this->view->load('read', $this->__block->view_detail_a_record());
		// Show view and data
		$this->view->show();
	}

	public function updateAction(){
		$this->__block = new Home();
		$this->view->load('update', $this->__block->view_detail_a_record());
		$this->view->show();
		if( isset($_POST['update_form']) ){
			$this->__block->update_a_record();
			//header('location: admin.php?c=home');
		} 

	}

	public function deleteAction(){
		$this->__block = new Home();
		$this->__block->delete_a_record();
	}

} ?>