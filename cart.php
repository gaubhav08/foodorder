
<html>
<head>
	<style>
	#home{
color: #ffffff;
height: 50px;
position: relative;
background:linear-gradient(to right,rgb(0 0 0 / 0.5),rgb(0 0 0 /0)),url('home2.jpg') repeat fixed 100%;
background-size: cover;
color: aliceblue;
}
.text-end{
	font-weight:bold;
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

if(isset($_POST["add"])){
	if(isset($_SESSION["cart"])){
		$item_array_id = array_column($_SESSION["cart"], "food_id");
		if(!in_array($_GET["id"], $item_array_id)){
			$count = count($_SESSION["cart"]);
			$item_array = array(
				'food_id' => $_GET["id"],
				'item_name' => $_POST["item_name"],
				'item_price' => $_POST["item_price"],
				'item_id' => $_POST["item_id"],
				'item_quantity' => $_POST["quantity"]
			);
			$_SESSION["cart"][$count] = $item_array;
			echo '<script>window.location="index.php"</script>';
		} else {					
			echo '<script>window.location="index.php"</script>';
		}
	} else {
		$item_array = array(
			'food_id' => $_GET["id"],
			'item_name' => $_POST["item_name"],
			'item_price' => $_POST["item_price"],
			'item_id' => $_POST["item_id"],
			'item_quantity' => $_POST["quantity"]
		);
		$_SESSION["cart"][0] = $item_array;
	}
}

if(isset($_GET["action"])){
	if($_GET["action"] == "delete"){
		foreach($_SESSION["cart"] as $keys => $values){
			if($values["food_id"] == $_GET["id"]){
				unset($_SESSION["cart"][$keys]);						
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}

if(isset($_GET["action"])){
	if($_GET["action"] == "empty"){
		foreach($_SESSION["cart"] as $keys => $values){
			unset($_SESSION["cart"]);					
			echo '<script>window.location="cart.php"</script>';
		}
	}
}
		
include('inc/header.php');
?>
<?php include('top_menu.php'); ?> 
<section class="content-banner">
<div class="main" id="home" style="height:200px;">
</div>
</section>
<section>
<div class="content">
	<div class="container-fluid">		
		<div class='row'>		
		
		</div>
		<div class='row'>		
		<?php
		if(!empty($_SESSION["cart"])){
		?>      
			<h3 style="color:orange;font-weight:bold;font-family:Serif;padding-top:20px;margin-left:30px;">Your Cart</h3>    
			<table class="table table-striped table-bordered" style="padding:10px;border:2px solid black;width:95%;margin-left:30px;">
			 <thead class="thead-dark">
			<tr>
			<th width="30%" style="text-align:center;">Food Name</th>
			<th width="10%" style="text-align:center;">Quantity</th>
			<th width="20%" style="text-align:center;">Price Details</th>
			<th width="15%" style="text-align:center;">Order Total</th>
			<th width="5%" style="text-align:center;">Action</th>
			</tr>
			</thead>
			<?php
			$total = 0;
			foreach($_SESSION["cart"] as $keys => $values){
			?>
				<tr>
				<td><?php echo $values["item_name"]; ?></td>
				<td class="text-center"><?php echo $values["item_quantity"] ?></td>
				<td class="text-end">₹<?php echo $values["item_price"]; ?></td>
				<td class="text-end">₹ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>" onclick="if(confirm('Are you sure to remove this item from cart list?') === false) { event.preventDefault() }"><span class="text-danger text-decoration-none"><img src="delete-item.png" style="width:20px;height:20px;"alt=""></span></a></td>
				</tr>
				<?php 
				$total = $total + ($values["item_quantity"] * $values["item_price"]);
			}
			?>
			
		</table>
		<table  class="table" style="margin-top:30px;border:2px solid black;margin-left:30px;width:95%;height:30px;">
		<thead class="thead-dark">
		<tr>
			<td colspan="3" class="text-end" style="text-align:center;border:2px solid black;width:50%;padding-right:300px;">Total</td>
			<td class="text-end">₹ <?php echo number_format($total, 2); ?></td>
			<td></td>
			</tr>
			</table>
			<div class="text-end">
				<a href="cart.php?action=empty"><button class="rounded-0 btn btn-danger"><span class="fa fa-trash"></span> Empty Cart</button></a>
				<a href="index.php"><button class="rounded-0 btn btn-warning">Add more items</button></a>
				<a href="checkout.php"><button class="rounded-0 btn btn-success pull-right"><span class="fa fa-share-alt"></span> Check Out</button></a>
			</div>
		<?php
		} elseif(empty($_SESSION["cart"])){
		?>
			<div class="container">
				<div class="jumbotron py-5 my-5">
				<h3 class='text-center'>Your cart is empty. Explore  <a href="./index.php" class="text-decoration-none fw-bolder">Menu</a>.</h3>        
				</div>      
			</div>    
		<?php
		}
		?>		
		</div>		   
	</div> 	
</div>
	</section>
	</body>
	</html>
