<?php if( !defined('PATH_VIEW') ) die('Bad requested!'); 
	// Show delete message
	if( isset($_SESSION['delete_message']) ){
		if( $_SESSION['delete_message'] ) echo "<div class='alert alert-success'> Record was deleted </div>";
		else echo "<div class ='alert alert-danger'> Deleted failed!!! </div>";
		session_destroy();
	}
	
	include PATH_VIEW . '/template/admin/home.php';
 ?>