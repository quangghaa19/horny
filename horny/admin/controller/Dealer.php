<?php if( !defined('PATH_SYSTEM') ) die ( "Bad requested AAA!" );

include PATH_APPLICATION .'/model/Crud_Model.php';

class Dealer {

	private $__data = array();

	public function set_data($__data){
		$this->__data = $__data;
	}

	public function get_all(){
		// Initiate class Model
		$db = new Model();
		// Execute query
		$data = $db->get_list('SELECT * FROM products');
		// Disconnect
		$db->dis_connect();
		return $data;
		
	}

	public function save(){
		$db = new Crud_Model();
		$image = $this->__data['image'];
		session_start();
		if( $image ) {
			$target_directory = PATH_VIEW . "/upload/";
	        $target_file = $target_directory . $image;
	        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
	        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
	        $_SESSION['image_message'] = true;
		} else $_SESSION['image_message'] = false;

		if( !array_key_exists('id', $this->__data) ){
	        		$db->set_table_name('products');
	        		if( $db->add_new($this->__data) ){
	        			$_SESSION['add_message'] = true;
	        			return true;
	        		} else {
	        			$_SESSION['add_message'] = false;
	        			return false;
	        		}
	        			
	        	} else {
	        		$db->set_all('products', 'id');
	        		if( $db->update_by_id($this->__data, $this->__data['id']) ){
	        			$_SESSION['update_message'] = true;
	        			return true;
	        		} else {
	        			$_SESSION['update_message'] = false;
	        			return false;
	        		}
	        	}
	}

	public function detail(){
		// Get id 
		if( isset($_POST['id_read'])||isset($_POST['id_edit']) )
		$id = isset($_POST['id']) ? $_POST['id'] : die('ERROR: Record not found!(read_one)');
		// Initiate SON class model
		$db = new Crud_Model();
		// Set table name and id key
		$db->set_all('products', 'id');
		// Execute query
		$row = $db->select_by_id('*', $id);
		// Return data 
		return $row;
	}

	public function delete(){
		$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record not found!(DELETE)');
		$db = new Crud_Model();
		$db->set_all('products', 'id');
		session_start();
		if( $db->delete_by_id($id) ) $_SESSION['delete_message'] = true;
		else $_SESSION['delete_message'] = false;
	}

} ?>