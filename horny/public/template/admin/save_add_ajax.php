<?php 
    isset( $_POST['id'] ) ? $id = $_POST['id'] : die("No id (save_add_ajax)");
	isset( $_POST['name'] ) ? $name = $_POST['name'] : die("No name (save_add_ajax)");
	isset( $_POST['description'] ) ? $description = $_POST['description'] : die("No description(save_add_ajax)");
	isset( $_POST['price'] ) ? $price = $_POST['price'] : die("No price(save_add_ajax)");
    $image = "";
	if( isset($_POST) && !empty($_FILES['file']) ) $image = $_FILES['file']['name'];
	
    //$mark = 0; // identify     add or update
    if( $id=="0" ){
        // Add function
        $data = array('name'=>$name, 'description'=>$description, 'price'=>$price, 'image'=>$image);
        $dealer = new Dealer();
        $dealer->set_data($data);
        if( $dealer->save() ){
            if(isset($_SESSION['insert_id'])){
                $id = $_SESSION['insert_id'];
                session_destroy();
            }
        }
    } else {
        // Update function
        //$mark = 1;
        if($image==""){
            $data = array('id'=>$id, 'name'=>$name, 'description'=>$description, 'price'=>$price);
            //$saved_image = 
            $arr = explode("/", $image);
            $img_name = $arr[count($arr)-1];
        }
        else $data = array('id'=>$id, 'name'=>$name, 'description'=>$description, 'price'=>$price, 'image'=>$image);
        $dealer = new Dealer();
        $dealer->set_data($data);
        if($dealer->save()){
            
        } else{}
    }
	

	echo"
			<table class=\"table table-hover table-responsive table-borderd\">
                <tr style=\"display: none;\">
                    <td>id</td>
                    <td class=\"p-l-r-0em\"><div id=\"id\" class=\"form-control\">{$id}</div></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td class=\"p-l-r-0em\"><div id=\"name\" class=\"form-control\">{$name}</div></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td class=\"p-l-r-0em\"><div id=\"description\" style=\"line-height: 2em;\" class=\"form-control\">{$description}</div></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td class=\"p-l-r-0em\"><div id=\"price\" class=\"form-control\">&#36;{$price}</div></td>
                </tr>
                <tr>
                    <td>Image</td>";
                    if( $image ) 
                        echo "<td class=\"p-l-r-0em\">
                            <div><img id=\"saved-image\" src=\"./public/upload/{$image}\" style=\"width:150px;\" /></div>
                            </td>";
                    else  echo "<td class=\"p-l-r-0em\"><div class=\"form-control\"><img id=\"saved-image\" src=\"\" />No image found.</div></td>";
                echo" 
                      
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input id=\"btn-edit\" type=\"button\" name =\"update_form\" value=\"Edit\" class=\"btn btn-primary\" onclick=\"edit_ajax_inaddform()\"/>
                        <a href=\"all-products.html\" class=\"btn btn-danger\">Back to read products</a>
                    </td>
                </tr>
			</table>
	";
 ?>