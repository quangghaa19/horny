<!DOCTYPE HTML>
<html>
<head>
	<title>PDO - Read records - PHP CRUD Tutorial</title>

	<!-- Latest compiled and minified Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

	<!-- Custom css -->
	<link href="./public/css/small.css" rel="stylesheet" />
	
	<!-- JQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<!-- Latest compiled and minified Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Confirm delete record will be here -->
	<script src="./public/js/confirm_delete.js"></script>
	

</head>
<body>
	<!-- Update message -->
	
	<!-- Delete message -->
	<?php 
	// Delete message prompt will be here
		$action = isset($_GET['a']) ? $_GET['a'] : "";
		// If it was redirected from delete.php
		if( $action=='delete' ){
			echo "<div class='alert alert-success'>Record was deleted.</div>";
	} ?>
	
	<!-- container -->
	<div class="container">

		<div class="page-header">
			<h1>Read Products</h1>
		</div>
		<a href='add_a_product.html' class='btn btn-primary m-b-1em'>Create A New Product</a>
		<table class='table table-hover table-responsive table-bordered'>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Photo</th>
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
						if($image) echo "<td><img src='./public/upload/{$image}' style='width:30px;' /></td>";
						else echo "<td>No image found.</td>";
						
						echo "<td>";
							// Read one record
							// href='admin.php?c=home&a=read&id={$id}
							echo "<a href='product_number_{$id}.html' class='btn btn-info m-r-1em'>Read</a>";

							// We will use this links on next part of this post
							// href='admin.php?c=home&a=update&id={$id}
							echo "<a href='edit_product_number_{$id}.html' class='btn btn-primary m-r-1em'>Edit</a>";

							// We will use this links on next part of this post
							echo "<a href='#' onclick='delete_user({$id});' class='btn btn-danger'>Delete</a>";
						echo "</td>";
					echo "</tr>";
				
			}
			?>

			<!-- Update form -->
			

		</table>
		
	</div>

</body>
</html>