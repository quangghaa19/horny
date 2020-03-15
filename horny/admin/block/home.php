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
		return $data;
		
	}

	public function add_a_new_record(){
		// Get form and proceed
		if( isset($_SESSION['add'])&&$_SESSION['add']==true ){
			if( isset($_SESSION['name'])&&isset($_SESSION['description'])&&isset($_SESSION['price']) ){
				$data = array('name'=>$_SESSION['name'], 'description'=>$_SESSION['description'], 'price'=>$_SESSION['price'], 'image'=>$_SESSION['image']);
				//var_dump($data);
				$db = new Crud_Model();
				$db->set_table_name('products');
				if($db->add_new($data)){
					//echo "<div class='alert alert-success'> Record was saved. </div>";
					$image = isset($_SESSION['image']) ? $_SESSION['image'] : die('ERROR SESSION image in function ad_a_new_record');
					if($image){

	                    // sha1_file() function is used to make a unique file name
	                    $target_directory = PATH_VIEW . "/upload/";
	                    $target_file = $target_directory . $image;
	                    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
	                    // error message is empty
	                    $file_upload_error_messages="";

	                    // make sure that file is a real image
	                    $check = getimagesize($_FILES["image"]["tmp_name"]);
	                    if($check!==false){
	                        // submitted file is an image
	                    } else {
	                        $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
	                    }

	                    // make sure certain file types are allowed
	                    $allowed_file_types=array("jpg", "jpeg", "png", "gif");
	                    if(!in_array($file_type, $allowed_file_types)){
	                        $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
	                    }

	                    // make sure file does not exist
	                    if(file_exists($target_file)){
	                        $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
	                    }

	                    // make sure submitted file is not too large, can't be larger than 1 MB
	                    if($_FILES['image']['size'] > (1024000)){
	                        $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
	                    }

	                    // make sure the 'uploads' folder exists
	                    // if not, create it
	                    if(!is_dir($target_directory)){
	                        mkdir($target_directory, 0777, true);
	                    }

	                    // if $file_upload_error_messages is still empty
	                    if(empty($file_upload_error_messages)){

	                        // it means there are no errors, so try to upload the file
	                        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
	                            // it means photo was uploaded
	                          echo "<div class='alert alert-success'> Record was saved. </div>";
	                        }else{
	                            echo "<div class='alert alert-danger'>";
	                                echo "<div>Unable to upload photo.</div>";
	                                echo "<div>Update the record to upload photo.</div>";
	                            echo "</div>";
	                        }
	                    }
	                     
	                    // if $file_upload_error_messages is NOT empty
	                    else{
	                        // it means there are some errors, so show them to user
	                        echo "<div class='alert alert-danger'>";
	                            echo "<div>{$file_upload_error_messages}</div>";
	                            echo "<div>Update the record to upload photo.</div>";
	                        echo "</div>";
	                    }

	                  }
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
		$id = isset($_GET['id']) ? $_GET['id'] : die('Not found id (update_a_record)');
		$db = new Crud_Model();
		// Set table name and id key
		$db->set_all('products', 'id');
		if( isset($_SESSION['update'])&&$_SESSION['update']==true ){
			$data = array('name'=>$_SESSION['name'], 'description'=>$_SESSION['description'], 'price'=>$_SESSION['price']);

			if( $db->update_by_id($data, $id) ){
				header('location: all_products.html');
			} else {
				die('Can not update');
			}
			
			session_destroy();
		}
	}
	
	public function delete_a_record(){
		$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record not found!(DELETE)');
		$db = new Crud_Model();
		$db->set_all('products', 'id');
		if( $db->delete_by_id($id) ) header('location: all_products.html');
		else die('Unable to delete record');
	}

}

