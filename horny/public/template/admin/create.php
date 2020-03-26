
<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    
    <link href="./public/css/small.css" rel="stylesheet" />

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Link file add_ajax.js -->
    <script src="./public/js/add_ajax.js"></script>
    
    <!-- Link file edit_ajax_inaddform.js -->
    <script src="./public/js/edit_ajax_inaddform.js"></script>
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Create Product</h1>
        </div>
        
    <!-- html form to create product will be here -->
          <form id="add-form" action="" method="POST" role="form">
              <table class="table table-hover table-responsive table-borderd">
                  <tr style="display: none;">
                    <td>ID</td>
                    <td><input id="in-id" type="text" name="id" class="form-control" value="0" /></td>
                  </tr>
                  <tr>
                      <td>Name</td>
                      <td><input id="in-name" type="text" name="name" class="form-control" /></td>
                  </tr>
                  <tr>
                      <td>Description</td>
                      <td><textarea id="in-description" name="description" class="form-control"></textarea></td>
                  </tr>
                  <tr>
                      <td>Price</td>
                      <td><input id="in-price" type="text" name="price" class="form-control" /></td>
                  </tr>
                  <tr>
                      <td>Photo</td>
                      <td><input id="in-file" type="file" name="image" /></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>
                          <input id="btn-save" type="button" name="" value="Save" class="btn btn-primary" onclick="add_ajax()" />
                          
                          <a href="all-products.html" class="btn btn-danger">Back to read products</a>
                      </td>
                  </tr>

                </tbody>
              </table>
          </form>


    </div> <!-- end .container -->
      

  
</body>
</html>
