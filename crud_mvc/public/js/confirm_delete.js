// Confirm record deletion
		function delete_user(id){
			var answer = confirm('Are you sure?');
			if( answer ) {
				// If user clicked OK
				// Pass the id to delete.php and execute the delete query
				window.location = 'admin.php?c=home&a=delete&id=' + id;
			}
		}