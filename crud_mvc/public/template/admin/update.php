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
    <?php 
        
                // Update status message
                if( isset($_POST['update_form']) ){
                    session_start();
                    $_SESSION['update'] = true;
                    $_SESSION['name'] = $_POST['name'];
                    $_SESSION['description'] = $_POST['description'];
                    $_SESSION['price'] = $_POST['price'];
                    
                    /*if( $_SESSION['update']==true ) echo "<div class='alert alert-success'>Record was changed</div> ";
                    else echo "<div class='alert alert-danger'>Record was NOT changed</div>";
                    session_destroy();*/
                } else $_SESSION['update'] = false;

            ?>
    <!-- container -->
    <div class="container"> 
        

        <div class="page-header">
            <h1>Update Products</h1>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] ."?c=home&a=update" . "&id={$id}" ) ?>" method="post">
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
                <td><input type="text" name="price" value="<?php echo htmlspecialchars($price, ENT_QUOTES); ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name ="update_form" value="Save changes" class="btn btn-primary" />
                    <a href="admin.php?c=home" class="btn btn-danger">Back to read products</a>
                </td>
            </tr>
        </form>

        

    </div> <!-- end .container -->
    

     

 
</body>
</html>