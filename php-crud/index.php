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
		<div class="page-header">
			<h1>Read Products</h1>
		</div>

		<!-- PHP code to read records will be here -->
		<?php 
		// Include database connection
		include 'config/database.php';

		// Pagination variables
		// Page is the current page, if there's nothing set. default is page 1
		//$page = isset($_GET['page']) ? $_GET['page'] : 1;
		// Set records or rows of data per page
		//$records_per_page = 5;
		// Calculate for the query LIMIT clause
		//$from_record_num = ($records_per_page * $page) - $records_per_page;

		// Delete message prompt will be here
		$action = isset($_GET['action']) ? $_GET['action'] : "";
		// If it was redirected from delete.php
		if( $action=='deleted' ){
			echo "<div class='alert alert-success'>Record was deleted.</div>";
		}

		// Select all data
		$query = "SELECT id, name, description, price FROM products ORDER BY id DESC";
		$stmt = $con->prepare($query);
		$stmt->execute();
		// Select data for current page
		/*
		$query = "SELECT if, name, description, price FROM products ORDER BY id DESC LIMIT :from_record_num, :records_per_page";
		$stmt = $con->prepare($query);
		$stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INIT);
		$stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INIT);
		$stmt->execute();*/

		// This is how to get number of rows returned
		$num = $stmt->rowCount();

		// Link to create record form
		echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create A New Product</a>";

		// Check if more than 0 record found
		if( $num>0 ) {

			// Data from database will be here
			echo "<table class='table table-hover table-responsive table-bordered'>";
			// Creating our table heading
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "<th>Description</th>";
				echo "<th>Price</th>";
				echo "<th>Action</th>";
			echo "</tr>";

			// Table body will be here
			// Retrieve our table contents
			// Fetch() is faster than fetchAll()
			// https://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
						echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";

						// We will use this links on next part of this post
						echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";

						// We will use this links on next part of this post
						echo "<a href='#' onclick='delete_user({$id});' class='btn btn-danger'>Delete</a>";
					echo "</td>";
				echo "</tr>";


			}
			echo "</table>";
			// Pagination
			// Count total number of rows
			/*$query = "SELECT COUNT(*) as total_rows FROM products";
			$stmt = $con->prepare($query);
			// Execute query
			$stmt->execute();
			// Get total rows
			$rows = $stmt->fetch(PDO::FETCH_ASSOC);
			$total_rows = $row['total_rows'];*/

		} else {
			echo "<div class='alert alert-danger'>No records found.</div>";
		}

		// Paginate records
		/*$page_url = "index.php?";
		include_once "paging.php";*/

		 ?>

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