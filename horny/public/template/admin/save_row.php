
			<?php
			// Define links

			// Get system config
			require '../../../system/config/config.php';

			include "../../../system/core/Model.php";

					isset( $_POST['id'] ) ? $id = $_POST['id'] : die("No id(save)");
					isset( $_POST['name'] ) ? $name = $_POST['name'] : die("No name (save)");
					isset( $_POST['description'] ) ? $description = $_POST['description'] : die("No description(save)");
					isset( $_POST['price'] ) ? $price = $_POST['price'] : die("No price(save)");
					isset( $_POST['image']) ? $image = $_POST['image'] : die("No image(save)");
					
					$db = new Model();
					$data = array('id'=>$_POST['id'], 'name'=>$_POST['name'], 'description'=>$_POST['description'], 'price'=>$_POST['price'], 'image'=>$_POST['image']);
					
					if( $db->update('products', $data, 'id'.'='.$id) ) {

						echo "<td id=\"id-{$id}\">{$id}</td>";
						echo "<td id=\"name-{$id}\" style = \"border: none\">{$name}</td>";
						echo "<td id=\"description-{$id}\">{$description}</td>";
						echo "<td id=\"price-{$id}\">&#36;{$price}</td>";
						if($image) echo "<td id=\"image-{$id}\"><img id=\"h-img-{$id}\" src='./public/upload/{$image}' style='width:30px;' /></td>";
						else echo "<td id=\"image-{$id}\"><img id=\"h-img-{$id}\" />No image found.</td>";
						
						echo "<td style=\"display: flex; border: none;\">";
							echo "<form action=\"detail-product.html\" method=\"post\" class=\"m-r-1em m-l-2em m-b-0em\">
								<input type=\"text\" name=\"id\" value=\"{$id}\" style=\"display:none;\">
								<input type=\"submit\" name =\"id_read\" value=\"Read\" class=\"btn btn-info\" />
								</form>";

							echo "<form class=\"m-r-1em\">
								<input type=\"button\" name =\"btn_edit\" value=\"Edit\" class=\"btn btn-primary\" onclick=\"edit_ajax({$id})\" />
								</form>";

							echo "<form action=\"just-delete-a-product.html\" method=\"post\" class=\" m-b-0em\">
								<input type=\"text\" name=\"id\" value=\"{$id}\" style=\"display:none;\">
								<input type=\"submit\" name =\"id_delete\" value=\"Delete\" class=\"btn btn-danger\" />
								</form>";
						echo "</td>";
					
					}
				
			?>
