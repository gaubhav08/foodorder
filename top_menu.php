<html>
    <head>
        <style>
             html{
        scroll-behavior: smooth;
      }
    body{font-family: 'Montserrat' sans-serif;
}

@media only screen and (min-width:1200px){
	.nav-item > .nav-link{padding: 5px 20px !important;
		display: block !important;}
}

@media only screen and (max-width:992px){
	.header-inner{background-color: white!important;
	}
	.nav-item > .nav-link{
		color: black!important}
		.logo{color: #000 !important;
			font-weight: 600!important;}
			.content-banner .first-title{font-size: 30px !important;
			}
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
margin-top:10px;
position: relative;
background:linear-gradient(to right,rgb(0 0 0 / 0.5),rgb(0 0 0 /0)),url('home2.jpg') repeat fixed 100%;
background-size: cover;
color: aliceblue;
}
#menu{
color: #ffffff;
height: 1300px;
background-color:#FF4301;
position: relative;
background-position: center center;
background-size: cover;
margin-top:-150px;
border-top:2px;
transform: skewY(-3deg);
}


.header{
position: relative;
width: 100%;
}

.header-inner{
position: absolute;
top: 0;
left: 0;
width:100%;
z-index: 99;
background-color: transparent;
}

.logo{
color:#ffffff;
}

.nav-item .nav-link{
display: block;
line-height: 36px;
text-transform: capitalize;
font-size: 16px;
font-weight: bold;
color: white;
transition: 0.15s;
}

.nav-item .nav-link:hover{
color: orange;
}
.header-btn{
color:#ffffff;
border-radius: 30px;
background-color:gray;
border:none;
font-weight: 500;
outline: none;
font-size: 15px;
padding:7px 22px;
transition: 0.5s;
}

.header-btn:hover{
background-color: #FE4066;
cursor: pointer;}

.navbar-scroll{background-color: #ffffff;
padding: 0;
position: fixed;
top:0;
z-index: 99;
box-shadow:0px 1px 10px rgba(0,0,0,0.4);
transition-duration: 0.6s; 
}

.navbar-scroll .nav-item .nav-link{
  color: black;
}

.navbar-scroll .header-btn{color: #ffffff;
background-color: #fe4066;
}

.navbar-scroll .logo{color: #000;
font-weight: 500;
}

.first-title{
	text-transform: capitalize;
}
.dropdown:hover .dropdown-menu{
	display:block;
}
.wel{
    color:orange;
}
</style>
</head>
<body>
<?php
if (isset($_SESSION["name"])) {
  ?>
<header class="header">
  <div class="header-inner">
    <div class="container-fluid px-lg-5">
      <nav class="navbar navbar-expand-lg my-navbar bg-transparent">
  <a class="navbar-brand" href="#"><span class="logo">
    <h1 class="img-fluid" style="width:30px; margin:-3px 0px 0px 0px;color:Orange;font-weight:bold;">FOOD</h1>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fas fa-bars" style="margin:5px 0px 0px 0px;"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#home">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#home">Menu</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#home">Contact Us</a>
      </li>
                <li class="nav-item">
                    <a class="nav-link" href="./cart.php"></span> Cart (<?php
						if(isset($_SESSION["cart"])){
						$count = count($_SESSION["cart"]); 
						echo "$count"; 
							}
						else
							echo "0";
						?>)
						</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php"><i class="fa fa-sign-out-alt"></i> Log Out</a>
                </li>
            </ul>
           <p class="wel"><span class="fa fa-user"></span> Welcome <?php echo $_SESSION["name"]; ?></p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
    </div>
</nav>
</header>

<?php        
}
?>
<script type="text/javascript">
    $(function(){
      var navbar = $('.header-inner');
      $(window).scroll(function(){
        if($(window).scrollTop() <=40){
          navbar.removeClass('navbar-scroll');
        }else{
          navbar.addClass('navbar-scroll');
        }
      });
    });
	
	 const loader = document.querySelector(".loader");
        window.onload = function(){
          setTimeout(function(){
            loader.style.opacity = "0";
            setTimeout(function(){
              loader.style.display = "none";
            }, 500);
          },1500);
        }
  </script>
 
  

  
  </body>
</html>