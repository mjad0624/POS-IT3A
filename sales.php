<?php 
include 'header.php';
?>
<html>
	<head>
		<link href="components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
		<link href="components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	</head>


	<body style="padding-top: 120px;">
	
	<div class = "container-fluid bg-2 text-center">
		<div class ="col-sm-8">
			<form class = "form-horizontal" action="transaction.php" method="POST" id="formInvoice">
				<table class = "table table-bordered">
					<caption> Add Products </caption>
					<tr>
						<th>Product Code</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Amount</th>
						<th>option</th>
					</tr>
					<tr>
						<td><input type = "text" class = "form-control" id ="procode" name= "procode" placeholder = "Product Code" required/></td>
						<td><input type = "text" class = "form-control" id ="pname" name= "pname" placeholder = "Product Name" required/></td>
						<td><input type = "number" class = "form-control" id ="price" name= "price" placeholder = "Price" required/></td>
						<td><input type = "number" class = "form-control" id ="qty" name= "qty" placeholder = "Quantity" required/></td>
						<td><input type = "text" class = "form-control" id ="total" name= "total" placeholder = "Total" required/></td>
						<td><button type = "button" class = "btn btn-primary" id ="add" name= "add" onclick="addProduct();"> Add </button></td>
						
					</tr>
					</table>
				</form>
			
			<table class = "table table-bordered" id="product_list">
				<caption>Products</caption>
				<thead>
					<tr>
						<th style = "width: 40px">Remove</th>				
						<th>Product Code</th>				
						<th>Product Name</th>				
						<th>Price</th>				
						<th>Quantity</th>				
						<th>Amount</th>				
					</tr>
				</thead>
				<tbody>
				
				</tbody>
			</table>

		</div>
		<div class = "col-sm-4" align="right">
			<div class="form-group" align="left">
				<label>Total</label>
				<input type="text" class="form-control" id="finaltotal" name = "finaltotal" placeholder="Total" required/>
			</div>
			<div class="form-group" align="left">
				<label>Pay Amount</label>
				<input type="text" class="form-control" id="pay" name = "pay" placeholder="Pay" required/>
			</div>
			<div class="form-group" align="left">
				<label>Balance</label>
				<input type="text" class="form-control" id="bal" name = "bal" placeholder="Balance" required/>
			</div>
			<div class="form-group" align="left">
				<a href="sales.php"><input type="submit" class="form-control" id="submit" name = "submit" value="Submit" style="background: #000; color: #fff" required/></a>
			</div>
		</div>
	</div>




	<script src = "components/jquery/dist/jquery.js"></script>
	<script src = "components/jquery/dist/jquery.min.js"></script>
	<script src = "components/jquery.validate.min.js"></script>
	


	<script>
	
	$(document).ready(function(){
		$('#submit').click(function(){
			$('.form-control').val('');
		});
	});
		
		
getProductName();

	function getProductName(){
			$("#pname").empty();
			$("#pname").keyup(function (e){
				$.ajax({
					type: "POST",
					url: "./includes/get_name.php",
					dataType: "JSON",
					data: {pname: $("#pname").val()},
					
					success: function(data){
						$("#procode").val(data[0].product_code);
						$("#price").val(data[0].price);
						$("#qty").focus();
					}
				});
			});
		}

getProductCode();

		function getProductCode(){
			$("#procode").empty();
			$("#procode").keyup(function (e){
				//var q = $("#procode").val();
				$.ajax({
					type: "POST",
					url: "./includes/get_product.php",
					dataType: "JSON",
					data: {procode: $("#procode").val()},
					
					success: function(data){
						$("#pname").val(data[0].productname);
						$("#price").val(data[0].price);
						$("#qty").focus();
					}
				});
			});
		}
		//total calculation
		$(function(){
			$("#price,#qty").on("keydown keyup click",qty);
			function qty(){
				var sum = (
					Number($("#price").val())*Number($("#qty").val())
				);
				$('#total').val(sum);
			}
		});
		//cash amount calculation
		$(function(){
			$("#pay,#finaltotal").on("keydown keyup click",finaltot);
			function finaltot(){
				var sum = (
					Number($("#pay").val())-Number($("#finaltotal").val())
				);
				$('#bal').val(sum);
			}
		});
		

		function addProduct()
		{
				var varcode = $("#procode").val();
				var varname = $("#pname").val();
				var varprice = $("#price").val();
				var varqty = $("#qty").val();
				var vartotal = $("#total").val();

			$.ajax({
				type: "POST",
				url: "transaction.php",
				dataType: "JSON",
				data: {code:varcode, name:varname, price:varprice, qty:varqty, total:vartotal}
			})

			var products = {

				procode : $("#procode").val(),
				pname : $("#pname").val(),
				price : $("#price").val(),
				qty : $("#qty").val(),
				total : $("#total").val(),
				
			};

			button : '<button type="button" class="button" class="btn btn-warning">delete</button>'	

			addRow(products);
			$('#formInvoice')[0].reset();
		}

		var total = 0;

		function addRow(products)
		{
			
			var $table = $('#product_list tbody');
			var $row = 
				$("<tr>" + 
					"<td> <button type='button' name='record' class='btn btn-warning btn-xs' name='record' onclick='deleterow(this)'>Delete</td></td>"+
							"<td>" + products.procode + "</td>"+
						"<td>" + products.pname + "</td>"+
						"<td>" + products.price + "</td>"+
						"<td>" + products.qty + "</td>"+
						"<td>" + products.total + "</td>"+
						"</tr>"
				);
		$row.data("procode",products.procode);
		$row.data("pname",products.pname);
		$row.data("price",products.price);
		$row.data("qty",products.qty);
		$row.data("total",products.total);

		total +=Number(products.total);

		$('#finaltotal').val(total);

		$table.append($row);

		//removing products
		$row.find('deleterow').click(function(event){
			deleteRow($(event.currentTarget).parent('tr'));
			});

		}
		
		function deleterow(e){
			var product_total_cost=parseInt($(e).parent().parent().find('td:last').text(),10);
			var product_code=parseInt($(e).parent().parent().find('td:nth-child(2)').text(),10);
			var product_price=parseInt($(e).parent().parent().find('td:nth-child(4)').text(),10);
			var product_quantity=parseInt($(e).parent().parent().find('td:nth-child(5)').text(),10);
			total-=product_total_cost;


			$.ajax({
				type: "POST",
				url: "deletesales.php",
				dataType: "JSON",
				data: {code:product_code, price:product_price,qty:product_quantity}
			})

			alert(product_quantity);
			$('#finaltotal').val(total);
			$(e).parent().parent().remove();

		}

		
	</script>
	
	</body>

</html>

<?php include 'footer.php';?>

