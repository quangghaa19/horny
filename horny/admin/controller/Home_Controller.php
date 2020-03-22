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

	public function editAction(){
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
	}

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

	public function errorAction(){
		$this->view->load('error', $this->__data);
		$this->view->show();
	}

	
} ?>