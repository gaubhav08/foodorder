<?php 
include_once 'config/Database.php';
include_once 'class/Customer.php';
include_once 'class/Food.php';

$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);
$food = new Food($db);

if(!$customer->loggedIn()) {	
	header("Location: login.php");	
}
include('inc/header.php');
?>
<style>
	 html{
        scroll-behavior: smooth;
      }
    body{font-family: 'Montserrat' sans-serif;
}

	.food-img-holder{
		width:100%;
		height:25;
	}
	.food-img-holder>img{
		width:100%;
		height:100%;
		object-fit:cover;
		object-position:center center;
	}
	#image{
  display:block;
  float:right;
  margin-right:100px;
  margin-top:-500px;
  width: 100%;
  max-width: 500px;
  height: auto;
  animation: up-down 1.4s infinite ease-in-out alternate;
}

@keyframes up-down{
  from{
    transform: translatey(0px);
  }
  to{
    transform: translatey(-20px);
  }
}


.text{
	float:left;
	margin-left:100px;
	margin-top:250px;
}
.p-t{
	color:white;
	font-size:20px;
	font-weight:bold;
}
.h-t{
	color:white;
	font-size:60px;
	font-weight:bold;
	font-family:Rockwell Extra Bold;
}
.text button {
 padding: 15px 25px;
 border: unset;
 border-radius: 15px;
 color: #212121;
 z-index: 1;
 background: #e8e8e8;
 position: relative;
 font-weight: 1000;
 font-size: 17px;
 width:200px;
 -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
 box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
 transition: all 250ms;
 overflow: hidden;
 cursor:pointer;
}

.text button::before {
 content: "";
 position: absolute;
 top: 0;
 left: 0;
 height: 100%;
 width: 0;
 border-radius: 15px;
 background-color: #FF4301;
 z-index: -1;
 -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
 box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
 transition: all 250ms
}

.text button:hover {
 color: white;
}

.text button:hover::before {
 width: 100%;
}


.flex-container{
   display: flex;
 flex-direction: row;
 margin-left:80px;
}
.image {
width: 100%;
height: 100%;
border-radius: 20px;
transition: all 0.3s ease-in-out;
z-index: 20;
box-shadow: 10px 10px 53px 0px rgba(0, 0, 0, 0.49);
}
.card-wrapper {
 margin-left:10px;
position: relative;
width: 400px;
height: 500px;
margin-top:60px;
border-radius: 20px;
overflow: hidden;
transition: all 0.3s ease-in-out;
box-shadow: 10px 10px 53px 0px rgba(0, 0, 0, 0.49);
transform: skewY(3deg);
}
.card-wrapper:hover .image {
filter: blur(1.4px);
transform: scale(1.5);
overflow: hidden;
transition: all 0.3s linear;
box-shadow: inset -6px -1px 32px 0px rgba(0, 0, 0, 0.75);
}
.card-wrapper:hover .card-bottom {
transform: translate(0%, -50%);
transition: all 0.8s ease;
background-color: rgba(110, 122, 92, 0.7);
}
.card-top {
position: relative;
width: 100%;
height: 100%;
z-index: 1;
}
.card-bottom {
width: 100%;
position: absolute;
z-index: 20;
display: nonee;
top: 50%;
background-color: rgba(110, 122, 92, 0);
padding: 100px 20px;
color: #fff;
transform: translate(100%, -50%);
}
.top-text {
font-size: 25px;
line-height: 40px;
font-weight: bold;
letter-spacing: 1px;
}
.bottom-text {
font-size: 15px;
}
.button {
position: relative;
display: block;
outline: none;
cursor: pointer;
margin-top: 25px;
border: none;
border-radius: 3px;
background-color: #f8961e;
color: #fff;
padding: 5px 20px;
}
#home{
color: #ffffff;
height: 900px;
position: relative;
background:linear-gradient(to right,rgb(0 0 0 / 0.5),rgb(0 0 0 /0)),url('home2.jpg') repeat fixed 100%;
background-size: cover;
color: aliceblue;
}
#contact{
color: #ffffff;
height: 800px;
position: relative;
background:linear-gradient(to right,rgb(0 0 0 / 0.5),rgb(0 0 0 /0)),url('home2.jpg') repeat fixed 100%;
background-size: cover;
color: aliceblue;
}
#menu{
color: #ffffff;
height: 800px;
background-color:#FF4301;
position: relative;
background-position: center center;
background-size: cover;
margin-top:-150px;
border-top:2px;
transform: skewY(-3deg);
}

.card {
 cursor:pointer;
 margin-top:100px;
 margin-left:20px;
 width: 230px;
 height: 300px;
 border-radius: 6px;
 background:white;
 position: relative;
 top:-30px;
 -webkit-box-shadow: 16px 13px 30px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 16px 13px 30px 0px rgba(0,0,0,0.75);
box-shadow: 16px 13px 30px 0px rgba(0,0,0,0.75);
}
.card:hover{
	transform: scale(0.98);
	
}
.card-image {
    width: 230px;
	height: 300px;
	border-radius: 6px;
	border-bottom-left-radius:0;
	border-bottom-right-radius:0;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.card-image:hover{
filter: blur(1px);
}
.card-title{
  text-transform: uppercase;
  font-size:20px;
  font-weight: bold;
  color: rgb(63, 121, 230);
  margin-left:5px;
  margin-top:10px;
}

.card-title:hover {
  cursor: pointer;
}
.card-price {
  font-weight: 400;
  color: black;
  margin-left:5px;
  margin-top:-10px;
  font-size:14px;
}

.card-price:hover {
  cursor: pointer;
}
.card-add{
	width: 230px;
	height:40px;
	psition:absolute;
	top:0;
	bottom:0;
}
.qty{
	width:40px;
	border:2px solid black; 
}
.btn{
	background-color:black;
	height:50px;
	width:229px;
}
.btn:hover{
	background-color:orange;
	color:black;
}
.footer{
background:#000;
padding:30px 0px;
font-family: 'Play', sans-serif;
text-align:center;
}

.footer .row{
width:100%;
margin:1% 0%;
padding:0.6% 0%;
color:gray;
font-size:0.8em;
}

.footer .row a{
text-decoration:none;
color:gray;
transition:0.5s;
}

.footer .row a:hover{
color:#fff;
}

.footer .row ul{
width:100%;
}

.footer .row ul li{
display:inline-block;
margin:0px 30px;
}

.footer .row a i{
font-size:2em;
margin:0% 1%;
}

@media (max-width:720px){
.footer{
text-align:left;
padding:5%;
}
.footer .row ul li{
display:block;
margin:10px 0px;
text-align:left;
}
.footer .row a i{
margin:0% 3%;
}
}
.img-top{
	width:230px;
	height:180px;
}
.content{
	margin-top:76px;
}
</style>
</head>
<body>
<link rel="stylesheet" type = "text/css" href ="css/foods.css">
<?php include('top_menu.php'); ?>

<section class="content-banner">
<div class="main" id="home">
<div class="text">
<h1 class="h-t">Order Healthy And  <br>Fresh Food Any Time</h1>
<p class="p-t">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse<br> varius enim in eros elementum tristique. Duis cursus, mi quis viverra <br>ornare, ernterdum nulla,modo diam</p>
<br>
<a href="#contact"><button> Order Now
</button></a>
</div>
<div><img  id="image" src="4532764.png" class="img-responsive" alt=""></div>
</div>
</section>

<div class="main-content">
  <section>
  <div class="main-content" id="menu">
   <h4 style="text-align:center;color:white;font-size:20px;font-weight:bold;transform: skewY(3deg);width:100%;padding-top:100px;font-family:Rockwell Extra Bold;"> EXPLORE FOOD</h2>
   <h1 style="text-align:center;color:black;font-size:50px;font-weight:bold;transform: skewY(3deg);width:100%;font-family:Rockwell Extra Bold;"> Popular Dishes</h1>
   <p  style="text-align:center;color:white;font-size:15px;font-weight:bold;transform: skewY(3deg);width:100%;font-family:Rockwell Extra Bold;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros <br>elementum tristique. Duis cursus, mi quis viverra ornare</p>
  <div class="flex-container">
<div class="card-wrapper">
<div class="card-top">
<img class="image" src="Malai-Chicken-Curry-2-1.jpg">
</div>
<div class="card-bottom">
<span class="top-text"> Murg Malaiwala</span><br>
<span class="bottom-text">Chicken drumsticks laced with delicate flavors of cream, milk, saffron, rose petals and mild spices.<br> This recipe is not made with oil or ghee; but it will definitely make a great start to your festive cheer.<br> Make sure you garnish the dish with raw almonds that only enhance the dish's flavour. </span>
<br>
<a href="products.php"><button class="button">View Now</button></a>
</div>
</div>
<div class="card-wrapper" style="margin-top:80px;">
<div class="card-top">
<img class="image" src="chicken_biryan.jpg">
</div>
<div class="card-bottom">
<span class="top-text"> Chicken Biryani</span><br>
<span class="bottom-text">Chicken Biryani is a highly-aromatic, mouthwatering staple dish that needs no introduction. Because of its endless nuanced flavors, it is perhaps the most comforting meal of Indian cuisine.</span>
<br>
<button class="button">View Now</button>
</div>
</div>
<div class="card-wrapper" style="margin-top:100px;">
<div class="card-top">
<img class="image" src="roasted-chicken_620x330_81513247969.jpg">
</div>
<div class="card-bottom">
<span class="top-text"> Roasted Chicken Masala</span><br>
<span class="bottom-text">With the flavour of red chilli, ginger-garlic, tandoori and peppercorn masala along with chaat maslaa and a tang of lime, this chicken recipe is sure to be the star at your snack table. </span>
<br>
<button class="button">View Now</button>
</div>
</div>
</div>
 </div>
 </div>
  </section>
  <section>
  <div class="main-content" id="contact" style="margin-top:-400px;height:1000px;">
	<div class="container-fluid " >	
		<div class="row">
		<p style="text-align:center;font-size:20px;font-weight:bold;margin-top:50px;font-family:Serif;color:#FF4301;">Today's Special  </p>
			<h1 style="text-align:center;font-size:40px;font-weight:bold;margin-top:-20px;font-family:Serif;">-- Our Menu --</h1>
			<h1 style="color: #FF4301;width:20px;margin-left:650px;margin-top:-40px;">_____</h1>
</div>	
			<div class='row my-3' style="margin-top:100px;">
			<?php 
			$result = $food->itemsList();
			$count=0;
			while ($item = $result->fetch_assoc()) { 
			if ($count == 0) {
				echo "<div class='row'>";
			}
			?>	
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 food-item">
					<form method="post" action="cart.php?action=add&id=<?php echo $item["id"]; ?>">
						<input type="hidden" name="item_name" value="<?php echo $item["name"]; ?>">
						<input type="hidden" name="item_price" value="<?php echo $item["price"]; ?>">
						<input type="hidden" name="item_id" value="<?php echo $item["id"]; ?>">
						<div class="card ">
							<div class="card-image" style="height:100px;width:100px;">
							<img src="<?php echo $item["images"]; ?>" class="img-top">
							</div>
							<div class="content">
								<div class="lh-1">
									<div class="card-title fw-bold h5 mb-0" style="text-align:left;"><?php echo $item["name"]; ?></div>
									<div style="text-align:left;"><small class="card-price text-success h6 mb-0" >Rs.. <?php echo $item["price"]; ?>/-</small></div>
									<div style="text-align:right;margin-top:-20px;margin-right:10px;"><input type="number" class="qty" id="quantity" name="quantity" style="text-align:right;" value="1" required="required"></div>
									</div>
									<input type="submit" name="add" style="margin-top:15px;" class="btn btn-primary btn-sm rounded-0" value="Add to Cart">
									</div>
		</div>
					</form>    
				</div>

			<?php 
			$count++;
			if($count==4)
			{
			  echo "</div>";
			  $count=0;
			}
			} 
			?>
			</div>
		   
    </div> 
		</div>       
		</section>	
		<footer>
<div class="footer">
<div class="row" style="margin-left:600px;">
<a href="#" style="width:40px;"><img src="facebook-svgrepo-com.svg" alt="" style="width:30px;height:30px;"/></a>
<a href="#"  style="width:40px;"><img src="instagram-1-svgrepo-com.svg" alt="" style="width:30px;height:30px;"/></a>
<a href="#"  style="width:40px;"><img src="youtube-svgrepo-com.svg" alt="" style="width:30px;height:30px;"/></a>
<a href="#"  style="width:40px;"><img src="twitter-color-svgrepo-com.svg" alt="" style="width:30px;height:30px;"/></a>
</div>

<div class="row">
<ul>
<li><a href="#">Home</a></li>
<li><a href="#">Menu</a></li>
<li><a href="#">Contact Us</a></li>
<li><a href="#">Cart</a></li>
</ul>
</div>
</div>
</footer>

		</body>
		</html>
