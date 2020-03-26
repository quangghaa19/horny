
<?php 
	isset( $_POST['id'] ) ? $id = $_POST['id'] : die("No id (edit-in-addform.php)");
	isset( $_POST['name'] ) ? $name = $_POST['name'] : die("No name (edit-in-addform.php)");
	isset( $_POST['description'] ) ? $description = $_POST['description'] : die("No description(edit-in-addform.php)");
	isset( $_POST['price'] ) ? $price = $_POST['price'] : die("No price(edit-in-addform.php)");
  $price = substr($price, 1);
  
  echo "
    <table id=\"tbl-add\" class=\"table table-hover table-responsive table-borderd\">
      <tr style=\"display: none;\">
        <td>ID</td>
        <td><input id=\"in-id\" class=\"form-control\" type=\"text\" name=\"id\" value=\"$id\" /></td>
      </tr>

			<tr>
        <td>Name</td>
        <td><input id=\"in-name\" class=\"form-control\" type=\"text\" name=\"name\" value=\"{$name}\"/></td>
        </tr>

      <tr>
        <td>Description</td>
        <td><textarea id=\"in-description\" name=\"description\" class=\"form-control\">{$description}</textarea></td>
      </tr>

      <tr>
        <td>Price</td>
        <td><input id=\"in-price\" class=\"form-control\" type=\"text\" name=\"price\" value=\"{$price}\" /></td>
      </tr>

        <tr>
          <td>Photo</td>
          <td><input id=\"in-file\" type=\"file\" name=\"image\" /></td>
        </tr>

      <tr>
        <td></td>
        <td>
          <input id=\"btn-save\" type=\"button\" value=\"Save\" class=\"btn btn-primary\" onclick=\"add_ajax()\" />
          <a href=\"all-products.html\" class=\"btn btn-danger\">Back to read products</a>
        </td>
      </tr>
    </table>";
 ?>
