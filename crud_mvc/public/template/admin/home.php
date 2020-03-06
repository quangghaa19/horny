<!DOCTYPE HTML>
<html>
<head>
	<title>PDO - Read records - PHP CRUD Tutorial</title>

	<!-- Latest compiled and minified Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

	<!-- Custom css -->
	<style type="text/css">
		.m-r-1em{ margin-right: 1em; }
		.m-b-1em{ margin-bottom: 1em; }
		.m-l-1em{ margin-left: 1em; }
		.mt0{ margin-top: 0; }
	</style>
</head>
<body>
	
	<!-- container -->
	<div class="container">
		<?php 
		
		// Update status message
		if( isset($_SESSION['update']) ){
			if( $_SESSION['update']==true ) echo "<div class='alert alert-success'>Record was changed</div> ";
			else echo "<div class='alert alert-danger'>Record was NOT changed</div>";
			session_destroy();
		}

		?>
		<div class="page-header">
			<h1>Read Products</h1>
		</div>
		<a href='admin.php?c=home&a=create' class='btn btn-primary m-b-1em'>Create A New Product</a>
		<table class='table table-hover table-responsive table-bordered'>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Action</th>
			</tr>
			<?php
			
			foreach( $data as $row ){
				
					// Extract row
					// This will make $row['firstname'] to just $firstname only
					extract($row);

					// Creating new table row per record
					echo "<tr>";
						echo "<td>{$id}</td>";
						echo "<td>{$name}</td>";
						echo "<td>{$description}</td>";
						echo "<td>&#36;{$price}</td>";
						echo "<td>";
							// Read one record
							echo "<a href='admin.php?c=home&a=read&id={$id}' class='btn btn-info m-r-1em'>Read</a>";

							// We will use this links on next part of this post
							echo "<a href='admin.php?c=home&a=update&id_up={$id}' class='btn btn-primary m-r-1em'>Edit</a>";

							// We will use this links on next part of this post
							echo "<a href='#' onclick='delete_user({$id});' class='btn btn-danger'>Delete</a>";
						echo "</td>";
					echo "</tr>";
				
			}
			?>

			<!-- Update form -->
			<?php
	        if( isset($_POST['update_form']) ) {
	        	session_start();
	        	//$_SESSION['update'] = false;
	            $_SESSION['name'] = $_POST['name'];
	            $_SESSION['description'] = $_POST['description'];
	            $_SESSION['price'] = $_POST['price'];
	        }
	        ?>

		</table>
		
	</div>

	<!-- JQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<!-- Latest compiled and minified Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Confirm delete record will be here -->
	<script type="text/javascript">
		// Confirm record deletion
		function delete_user(id){
			var answer = confirm('Are you sure?');
			if( answer ) {
				// If user clicked OK
				// Pass the id to delete.php and execute the delete query
				window.location = 'delete.php?id=' + id;
			}
		}
	</script>
</body>
</html>