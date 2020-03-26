<?php if( !defined('PATH_SYSTEM') ) die ( "Bad requested AAA!" );

include PATH_APPLICATION .'/controller/Dealer.php';

class Home_Controller extends Controller {

	private $__block = NULL;
	private $__dealer = NULL;
	private $__data = array();

	public function viewAction(){
		// Show all products
		$this->__dealer = new Dealer();
		$this->view->load('home', $this->__dealer->get_all());
		$this->view->show();
	}

	public function addAction(){
		// Only show create page
		$this->view->load('create', $this->__data);
		$this->view->show();
	}

	/*public function editAction(){
		// Only show edit page
		$this->__dealer = new Dealer();
		$this->view->load('update', $this->__dealer->detail());
		$this->view->show();
	}

	public function saveAction(){
		// Save changes into the database
		if( isset($_POST['add_form'])||isset($_POST['update_form']) ){
			// new 'image' field
			// sha1_file($_FILES['image']['tmp_name']) . "-" . 
            $image = !empty($_FILES["image"]["name"])
            ? basename($_FILES["image"]["name"])
            : "";
            $image = htmlspecialchars(strip_tags($image));
            var_dump($image);
            $_POST['image'] = $image;

            // data
            if( isset($_POST['id']) ){
            	// Update data
            	$this->__data = array('id'=>$_POST['id'], 'name'=>$_POST['name'], 'description'=>$_POST['description'], 'price'=>$_POST['price'], 'image'=>$_POST['image']);
            } else {
            	// Add data
            	$this->__data = array('name'=>$_POST['name'], 'description'=>$_POST['description'], 'price'=>$_POST['price'], 'image'=>$_POST['image']);
            }
			//var_dump($this->__data);
			// Push in Dealer();
			$this->__dealer = new Dealer();
			$this->__dealer->set_data($this->__data);

			$this->__dealer->save();

			// Call home page
			$this->view->load('home', $this->__dealer->get_all());
			$this->view->show();

		}
	}*/

	public function readAction(){
		// Show detail one product
		$this->__dealer = new Dealer();
		$this->view->load('read', $this->__dealer->detail());
		$this->view->show();
	}

	public function deleteAction(){
		// Delete a product
		$this->__dealer = new Dealer();
		$this->__dealer->delete();
		$this->view->load('home', $this->__dealer->get_all());
		$this->view->show();
	}

	public function edit_rowAction(){
		isset( $_POST['id'] ) ? $id = $_POST['id'] : die("No id");
		isset( $_POST['name'] ) ? $name = $_POST['name'] : die("No name");
		isset( $_POST['description'] ) ? $description = $_POST['description'] : die("No description");
		isset( $_POST['price'] ) ? $price = $_POST['price'] : die("No price");
		$price = substr($price, 1);
		isset( $_POST['image'] ) ? $image = $_POST['image'] : die("No image");
		if( $image!="" ){
			$arr = explode("/", $image);
			$image = $arr[count($arr)-1];
		}
		$this->__data = array('id'=>$id, 'name'=>$name, 'description'=>$description, 'price'=>$price, 'image'=>$image);

		$this->view->load('edit_row', $this->__data);
		$this->view->show();
	}

	public function save_rowAction(){
		$this->view->load('save_row', $this->__data);
		$this->view->show();
	}

	public function errorAction(){
		$this->view->load('error', $this->__data);
		$this->view->show();
	}

	// Add ajax asd
	public function save_add_ajaxAction(){
		$this->view->load('save_add_ajax', $this->__data);
		$this->view->show();
	}

	//public function edit ajax in add form
	public function edit_ajaxAction(){
		$this->view->load('edit_ajax_inaddform', $this->__data);
		$this->view->show();
	}
} ?>