
<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Create Product</h1>
        </div>
      
    <!-- html form to create product will be here -->
          <form action="admin.php?c=home&a=create" method="post">
              <table class="table table-hover table-responsive table-borderd">
                  <tr>
                      <td>Name</td>
                      <td><input type="text" name="name" class="form-control" /></td>
                  </tr>
                  <tr>
                      <td>Description</td>
                      <td><textarea name="description" class="form-control"></textarea></td>
                  </tr>
                  <tr>
                      <td>Price</td>
                      <td><input type="text" name="price" class="form-control" /></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>
                          <input type="submit" name="form_click" value="Save" class="btn btn-primary" />
                          <a href="admin.php?c=home" class="btn btn-danger">Back to read products</a>
                      </td>
                  </tr>
              </table>
          </form>

            <!-- php code to create a new record into the database -->
          <?php
          //$_SESSION['create'] = false;
          if( isset($_POST['form_click']) ){
            session_start();
            $_SESSION['add'] = true;
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['description'] = $_POST['description'];
            $_SESSION['price'] = $_POST['price'];
          } ?>

    </div> <!-- end .container -->
      

  
</body>
</html>
