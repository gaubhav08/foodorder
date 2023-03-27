<html>
	<head>
		<style>
			.content{
				margin-top:200px;
			}
			body{
				color: #ffffff;
				height: 50px;
				position: relative;
				background:linear-gradient(to right,rgb(0 0 0 / 0.5),rgb(0 0 0 /0)),url('home2.jpg') repeat fixed 100%;
				background-size: cover;
				color: aliceblue;
}
.container-fluid{
	width:95%;
}
.back{
	margin-left:-400px;
	margin-top:	10px;
	color:black;
	border:2px solid orange;
	background-color:orange;
	color:black;
	width:100px;
	height:40px;
}

.card-footer{
	display:flex;
}
			</style>
</head>
<body>
	<?php 
include_once 'config/Database.php';
include_once 'class/Customer.php';

$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);

if(!$customer->loggedIn()) {	
	header("Location: login.php");	
}
include('inc/header.php');
?>
<title> Food Ordering System</title>
  <link rel="stylesheet" type = "text/css" href ="">
<div class="content">
	<div class="container-fluid">		
	
		
		<div class="my-3">
			<div class="card rounded-0 shadow">
				<div class="card-body">
					<div class="container-fluid">
						<?php
						$orderTotal = 0;
						foreach($_SESSION["cart"] as $keys => $values){
							$total = ($values["item_quantity"] * $values["item_price"]);
							$orderTotal = $orderTotal + $total;
						}
						?>
						<div class='row'>
							<div class="col-md-6 lh-1">
								<h3>Delivery Address</h3>
								<hr style="width:200px;border:2px solid black;"></hr>
								<?php 
								$addressResult = $customer->getAddress();
								$count=0;
								while ($address = $addressResult->fetch_assoc()) { 
								?>
								<p class="mb-1"><strong>Address</strong>:<?php echo $address["address"]; ?></p>
								<p class="mb-1"><strong>Phone</strong>:<?php echo $address["phone"]; ?></p>
								<p class="mb-1"><strong>Email</strong>:<?php echo $address["email"]; ?></p>
								<?php
								}
								?>				
							</div>
							<?php 
							$randNumber1 = rand(100000,999999); 
							$randNumber2 = rand(100000,999999); 
							$randNumber3 = rand(100000,999999);
							$orderNumber = $randNumber1.$randNumber2.$randNumber3;
							?>
							<div class="col-md-6 lh-1">
								<h3>Order Summery</h3>
								<hr style="width:200px;border:2px solid black;"></hr>
								<p class="mb-1"><strong>Items</strong>: ₹<?php echo $orderTotal; ?></p>
								<p class="mb-1"><strong>Delivery</strong>: ₹0</p>
								<p class="mb-1"><strong>Total</strong>: ₹<?php echo $orderTotal; ?></p>
								<p class="mb-1"><strong>Order Total</strong>: ₹<?php echo $orderTotal; ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer py-1">
				<table class="table " style="width:95%;margin-left:30px;">
			 <thead class="thead">
			<tr>
			<th width="30%" style="text-align:center;"><a href="cart.php"><button class="back" ><img src="left-arrow (1).png" alt="" style="width:20px;height:15px;padding-right:5px;padding-bottom:5px;">Back</button></a></th>
			<th width="10%" style="text-align:center;"><a href="process_order.php?order=<?php echo $orderNumber;?>"  class="btn btn-warning rounded-0">Place Order</a></th>
							</tr>
							</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		   
    </div>        
		
