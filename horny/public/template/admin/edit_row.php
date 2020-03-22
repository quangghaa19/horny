
			<?php
					isset( $_POST['id'] ) ? $id = $_POST['id'] : die("No id");
					isset( $_POST['name'] ) ? $name = $_POST['name'] : die("No name");
					isset( $_POST['description'] ) ? $description = $_POST['description'] : die("No description");
					isset( $_POST['price'] ) ? $price = $_POST['price'] : die("No price");
					$price = substr($price, 1);
					isset( $_POST['image'] ) ? $image = $_POST['image'] : die("No image");
					
					if( $image!="" ){
						$arr = explode("/", $image);
						$img_name = $arr[count($arr)-1];
						
					}
					
						echo "<td id=\"id-{$id}\">{$id}</td>";
						echo "<td id=\"name-{$id}\" style = \"border: none\"><input id=\"in-name-{$id}\" type=\"text\" name=\"name\" value=\"$name\" /></td>";
						echo "<td id=\"description-{$id}\"><input id=\"in-description-{$id}\" type=\"text\" name=\"description\" value=\"{$description}\" /></td>";
						echo "<td id=\"price-{$id}\"><input id=\"in-price-{$id}\" type=\"text\" name=\"price\" value=\"{$price}\" /></td>";
						echo "<td id=\"image-{$id}\"><input id=\"in-image-{$id}\" type=\"file\" name=\"image\" /></td>";
						echo "<td style=\"display: flex; border: none;\">";
							echo "<form action=\"detail-product.html\" method=\"post\" class=\"m-r-1em m-l-2em m-b-0em\">
								<input type=\"text\" name=\"id\" value=\"{$id}\" style=\"display:none;\">
								<input type=\"submit\" name =\"id_read\" value=\"Read\" class=\"btn btn-info\"  />
								</form>";

							echo "<form class=\"m-r-1em m-b-0em\">
								<input type=\"button\" name =\"save\" value=\"Save\" class=\"btn btn-primary\" onclick=\"save_ajax({$id}, '{$img_name}')\" />
								</form>";

							echo "<form action=\"just-delete-a-product.html\" method=\"post\" class=\" m-b-0em\">
								<input type=\"text\" name=\"id\" value=\"{$id}\" style=\"display:none;\">
								<input type=\"submit\" name =\"id_delete\" value=\"Delete\" class=\"btn btn-danger\" />
								</form>";
						echo "</td>";
					
				
			?>
