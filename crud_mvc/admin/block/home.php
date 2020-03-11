<?php if( !defined( 'PATH_SYSTEM' ) ) die ('Bad request! ( /block/home.php )');

require PATH_APPLICATION .'/model/Crud_Model.php';

class Home{

	private $__result = array();

	public function get_records_from_db(){
		// Initiate class Model
		$db = new Model();
		// Execute query
		$data = $db->get_list('SELECT * FROM products');
		// Disconnect
		$db->dis_connect();
		if( !empty($data) ) return $data;
		else die('ERROR get_records_from_db'); 
	}

	public function add_a_new_record(){
		// Get form and proceed
		if( isset($_SESSION['add'])&&$_SESSION['add']==true ){
			if( isset($_SESSION['name'])&&isset($_SESSION['description'])&&isset($_SESSION['price']) ){
				$data = array('name'=>$_SESSION['name'], 'description'=>$_SESSION['description'], 'price'=>$_SESSION['price']);
				//var_dump($data);
				$db = new Crud_Model();
				$db->set_table_name('products');
				if($db->add_new($data)){
					echo "<div class='alert alert-success'> Record was saved. </div>";
					return true;
				} else echo "<div class='alert alert-danger'> Can not save. </div>";
				session_destroy();
			}
			
		}
		return false;
	}

	public function view_detail_a_record(){
		// Get id 
		$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record not found!(read_one)');
		// Initiate SON class model
		$db = new Crud_Model();
		// Set table name and id key
		$db->set_all('products', 'id');
		// Execute query
		$row = $db->select_by_id('*', $id);
		// Return data 
		return $row;
	}

	public function update_a_record(){
		$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record not found!(read_one)');
		$db = new Crud_Model();
		// Set table name and id key
		$db->set_all('products', 'id');
		if( isset($_SESSION['update'])&&$_SESSION['update']==true ){
			$data = array('name'=>$_SESSION['name'], 'description'=>$_SESSION['description'], 'price'=>$_SESSION['price']);

			if( $db->update_by_id($data, $id) ){
				header('location: admin.php?c=home');
			} 
			
			session_destroy();
		}
	}
	
	public function delete_a_record(){
		$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record not found!(DELETE)');
		$db = new Crud_Model();
		$db->set_all('products', 'id');
		if( $db->delete_by_id($id) ) header('location: admin.php?c=home');
		else die('Unable to delete record');
	}

}

