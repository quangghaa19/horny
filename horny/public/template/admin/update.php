<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Update a Record - PHP CRUD Tutorial</title>
     
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
            <h1>Update Products</h1>
        </div>

        <form action="just-edit-a-product.html" method="post" enctype="multipart/form-data">
            <table class="table table-hover table-responsive table-borderd">
                <tr style="display: none;">
                    <td>ID</td>
                    <td><input type="text" name="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES); ?>"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>" class=form-control /></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name='description' class="form-control"><?php echo htmlspecialchars($description, ENT_QUOTES); ?></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input class="form-control" type="text" name="price" value="<?php echo htmlspecialchars($price, ENT_QUOTES); ?>"></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>
                    <?php echo $image ? "<img src='./public/upload/{$image}' style='width:150px;' />" : "No image found.";  ?>
                    </td>
                    
                </tr>
                <tr>
                    <td></td>
                    <td><input type="file" name="image" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name ="update_form" value="Save changes" class="btn btn-primary" />
                        <a href="all-products.html" class="btn btn-danger">Back to read products</a>
                    </td>
                </tr>
            </table>
        </form>

        

    </div> <!-- end .container -->
    

     

 
</body>
</html>