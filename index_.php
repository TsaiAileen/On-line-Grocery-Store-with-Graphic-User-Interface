<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-3" style="height:700px;overflow-y:scroll;border-right:1px solid;">
				<input type="hidden" id="hid_cat_id" value="">
				<input type="hidden" id="hid_cat_sub_id" value="">
				<input type="hidden" id="hid_product_id" value="">

				
				<?php
					$servername = "localhost";
					$username = "ec";
					$password = "internet";
					$db = "assignment1";

					$conn = new mysqli($servername, $username, $password, $db);

					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					  }
					else{
						
					  $sql = "select * from products order by product_id;";
					  $prod = $conn->query($sql);
					  
					  $prod_array = array();
					  
					  if ($prod->num_rows > 0) {
						 while ($row = $prod->fetch_assoc()) {
						 		$row_array =array($row['product_id'],$row['product_name'],$row['unit_price'],$row['unit_quantity'],$row['in_stock']);
						 		//echo $row_array[0];
						 		//echo $row_array[1];

                                $prod_array[$row['product_id']] = $row_array;
								/*echo $prod_array[$row['product_id']][0];
								echo $prod_array[$row['product_id']][1];
								echo $prod_array[$row['product_id']][2];
								echo $prod_array[$row['product_id']][3];
								echo $prod_array[$row['product_id']][4];*/
						}		
					  } else {
						echo "No Products!!";
					  }
					  
					  $GLOBALS["prod_arr"] = $prod_array;
					  echo $prod_arr[$row['product_id']][0];
					  
					  $conn->close();
					}
				?>
				
				<?php
					error_reporting(0);

					if(count($_POST)>0) {
						$pid=$_POST[product_id];
					}

					$cat_id=0;
					$cat_sub_id=0;
					$product_id="";

					$servername = "localhost";
					$username = "ec";
					$password = "internet";
					$db = "assignment1";

					$conn = new mysqli($servername, $username, $password, $db);

					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					  }
					else{
						
					  $sql = "select cp.cat_id,c.cat_name,cp.cat_sub_id,cs.cat_sub_name,p.product_id,p.product_name
								from category_products cp
								inner join products p
								on cp.product_id = p.product_id
								left join category c
								on c.cat_id = cp.cat_id
								left join category_sub cs
								on cs.cat_sub_id = cp.cat_sub_id;";
					  $cat = $conn->query($sql);
					  
					  echo "Category Store<br>";
					  
					  if ($cat->num_rows > 0) {
						$cat_id_temp=0;
						$cat_sub_id_temp=0;
						while($row = $cat->fetch_assoc()) {
							if ($row["cat_id"] != $cat_id_temp || $row["cat_sub_id"] != $cat_sub_id_temp){
								echo $row["cat_name"] .">" . $row["cat_sub_name"] . "<br>";
							}
							//echo "<a href='localhost/mainForm.php?cat_id=" . $row["cat_id"] . "?cat_sub_id=" . $row["cat_sub_id"] . "?product_id=" . $row["product_id"] . "'>" . $row["product_name"] . "</a>". "<br>";
							echo "<input type=\"button\" value=\"" . $row["product_name"] . "\" onclick=\"setValue(" . $row["cat_id"] . "," . $row["cat_sub_id"] . ",'" . $row["product_id"] . "')\" style=\"padding-left:20px;\"><br>";
							$cat_id_temp = $row["cat_id"];
							$cat_sub_id_temp = $row["cat_sub_id"];
						}		
					  } else {
						echo "No Category Products!!";
					  }
					  $conn->close();
					}
				?>
				
			</div>
			<div class="col-9">
				<!--product detail-->
				<form>
				  <div class="form-group">
				    <label for="prod_id">Product ID:</label>
				    <input type="input" class="form-control" id="prod_id" aria-describedby="prod_idHelp" placeholder="Enter Product ID">
				    <small id="prod_idHelp" class="form-text text-muted">ex: 10000.</small>
				    
				    <label for="prod_name">Product Name:</label>
				    <input type="input" class="form-control" id="prod_name" aria-describedby="prod_nameHelp" placeholder="Enter Product Name">
				    <small id="prod_nameHelp" class="form-text text-muted">ex: Fish Finger.</small>
				    
				    <label for="unit_price">Unit Price:</label>
				    <input type="input" class="form-control" id="unit_price" aria-describedby="unit_priceHelp" placeholder="Enter Unit Price">
				    <small id="unit_priceHelp" class="form-text text-muted">ex: 2.5.</small>
				    
				    <label for="unit_quantity">Unit Quantity:</label>
				    <input type="input" class="form-control" id="unit_quantity" aria-describedby="unit_quantityHelp" placeholder="Enter Unit Quantity">
				    <small id="unit_quantityHelp" class="form-text text-muted">ex: 500 gram.</small>
				    
				    <label for="in_stock">In Stock:</label>
				    <input type="input" class="form-control" id="in_stock" aria-describedby="in_stockHelp" placeholder="Enter In Stock">
				    <small id="in_stockHelp" class="form-text text-muted">ex: 100.</small>
				    
				    <button type="button" id="btnAdd" class="btn btn-secondary">Add</button>
				  </div>
				</form>
				<hr>
				<!--shopping cart-->
				<form>
				  <div class="form-group">
				    <!--<label for="prod_id">Product ID:</label>
				    <input type="input" class="form-control" id="prod_id" aria-describedby="prod_idHelp" placeholder="Product ID">
				    <small id="prod_idHelp" class="form-text text-muted">ex: 10000.</small>
				    
				    <label for="prod_name">Product Name:</label>
				    <input type="input" class="form-control" id="prod_name" aria-describedby="prod_nameHelp" placeholder="Product Name">
				    <small id="prod_nameHelp" class="form-text text-muted">ex: Fish Finger.</small>

				    <label for="unit_quantity">Unit Quantity:</label>
				    <input type="input" class="form-control" id="unit_quantity" aria-describedby="unit_quantityHelp" placeholder="Unit Quantity">
				    <small id="unit_quantityHelp" class="form-text text-muted">ex: 500 gram.</small>
				    
				    <label for="total_price">Total Price:</label>
				    <input type="input" class="form-control" id="total_price" aria-describedby="total_priceHelp" placeholder="Total Price">
				    <small id="total_priceHelp" class="form-text text-muted">ex: 1000.</small>-->
				    
				    <div id="shoppingCart">
				    	
				    </div>
				    <hr>
				    <label for="total_price">Total Price:</label>
				    <input type="input" class="form-control" id="total_price" aria-describedby="total_priceHelp" placeholder="Total Price" value="0">
				    <small id="total_priceHelp" class="form-text text-muted">ex: 1000.</small>

				    <button type="button" id="btnClear" class="btn btn-secondary">Clear</button>
				    <button type="button" id="btnCheckout" class="btn btn-secondary">Check Out</button>
				  </div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
	<script type="text/javascript">
		function setValue(cat_id,cat_sub_id,product_id){
			$('#hid_cat_id').val(cat_id);
			$('#hid_cat_sub_id').val(cat_sub_id);
			$('#hid_product_id').val(product_id);
			
			var arr_prod = <?php echo json_encode($prod_arr);?>;
			
			$("#prod_id").val(arr_prod[product_id][0]);
			$("#prod_name").val(arr_prod[product_id][1]);
			$("#unit_price").val(arr_prod[product_id][2]);
			$("#unit_quantity").val(arr_prod[product_id][3]);
			$("#in_stock").val(arr_prod[product_id][4]);
		}
		
		$(function(){
		   //alert('ready!');
		   obj_shopping={}; //object
		   
		   $( "#btnAdd" ).click(function() {
			    //alert( "Handler for .click() called." );
			    product_d = []; //array
			    var prod_id = parseInt($("#prod_id").val());
			    var prod_name = $("#prod_name").val();
			    var unit_price = parseFloat($("#unit_price").val());
			    
			    var total_price = 0;
			     
			    if(obj_shopping[prod_id] != undefined){
			    	 product_d = obj_shopping[prod_id] ; //get exists item
				     product_d[3] += 1; //qty ++
				     product_d[4] += parseFloat(unit_price); //add unit_price to total_price
			    } else{
			    	product_d = [prod_id,prod_name,unit_price,1,unit_price];  //not exists
			    }
			    
			    obj_shopping[prod_id] = product_d;
				     
				total_price += parseFloat(unit_price);
			    
			    
			    console.log(obj_shopping);
			    
			    //cleare first
			    $('#shoppingCart').empty();
			    
			    var _html='';
			    
		    	//show shopping cart
		    	_html = '<table class="table table-striped">';
  _html += '<thead><tr><th scope="col">Product ID</th><th scope="col">Product Name</th>';
  _html += '<th scope="col">Unit Price</th><th scope="col">Quantity</th><th scope="col">Price</th></tr></thead>';
  _html += '<tbody>';
  
				for (var obj in obj_shopping){
					//console.log(obj);
					//console.log(obj_shopping[obj][0]);
					_html += "<tr>";
					_html += "<td>" + obj_shopping[obj][0] + "</td>"; //product_id
					_html += "<td>" + obj_shopping[obj][1] + "</td>"; //product_name
					_html += "<td>" + obj_shopping[obj][2] + "</td>"; //unit_price
					_html += "<td>" + obj_shopping[obj][3] + "</td>"; //quantity
					_html += "<td>" + obj_shopping[obj][4] + "</td>"; //price
					_html += "</tr>";
				}
  
				_html+='</tbody></table>';
  
				$('#shoppingCart').html(_html);
				
				$('#total_price').val(parseFloat(parseFloat($('#total_price').val())+ total_price).toFixed(2) );
		   });
   
			//Clear
			$( "#btnClear" ).click(function() {
				$('#shoppingCart').empty();
				$('#total_price').val('0');
			});
			
			$( "#btnCheckout" ).click(function() {
				window.location.href="purchase_order.php";
			});
   
	});
	</script>