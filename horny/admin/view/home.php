<?php if( !defined('PATH_VIEW') ) die('Bad requested!'); 
	// Show add message
	if( isset($_SESSION['add_message']) ){
		// Show warning image message
		if( isset($_SESSION['image_message'])&&$_SESSION['image_message']==false ){
			echo "<div class='alert alert-warning'> Lack of image! </div>";
		}
		if( $_SESSION['add_message'] ) echo "<div class='alert alert-success'> Record was saved </div>";
		else echo "<div class='alert alert-danger'> Can not save!!! </div>";
		session_destroy();
	}

	// Show update message
	if( isset($_SESSION['update_message']) ){
		if( $_SESSION['update_message'] ) echo "<div class='alert alert-success'> Record was changed </div>";
		else echo "<div class ='alert alert-danger'> Can not save changes!!! </div>";
		session_destroy();
	}

	// Show delete message
	if( isset($_SESSION['delete_message']) ){
		if( $_SESSION['delete_message'] ) echo "<div class='alert alert-success'> Record was deleted </div>";
		else echo "<div class ='alert alert-danger'> Deleted failed!!! </div>";
		session_destroy();
	}
	
	include PATH_VIEW . '/template/admin/home.php';
 ?>