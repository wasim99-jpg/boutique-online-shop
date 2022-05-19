<?php

session_start();
include('config.php');
//$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($link,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "Product is added to your cart!";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "Product is already added to your cart!";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "Product is added to your cart!";
	}

	}
}
?>
<html>
	<head>
		<link rel = "stylesheet" href = "style1.css">
		<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Text&family=Josefin+Sans:wght@500&family=Medula+One&family=Mina&family=Raleway:wght@100;200;300&display=swap" rel="stylesheet">

	</head>
	
	<body>
		<nav>
			<p><a href ="Index.html" class ="shinshi"> SHINSHI </a></p> 
				<ul class = "menu">
					<li><a href = "Index.html"> Home </a> </li>
					<li><a href = "shop.html"> Shop </a></li>
					<li><a href = "about.html"> About Us </a></li>
					<li><a href = "contactus.html"> Contact Us </a></li>
				</ul>
				
				<ul class = "accountMenu">
					<li><a href = "profile.php"> <img src = "profile.jpg"> </a></li>
					<li><a href = "cart.php"> <img src = "cart.jpg"></a> </li>
				</ul>
		</nav>
		
		<div class = "item-big-container">
			<div class = "item-image-container">
				<div class = "item-imageslider-container">
					<div class = "item-image">
						<img src = "model temp.jpg"> 
					</div>
					<div class = "item-image">
						<img src = "model hover.jpg"> 
					</div>
					
					<a class = "prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class = "next" onclick="plusSlides(1)">&#10095;</a>
					
					<div class = "item-slider">
						<div class = "item-slider-image">
							<img class="demo cursor" src = "model temp.jpg" onclick = "currentSlide(1)"> 
						</div>
						<div class = "item-slider-image">
							<img class="demo cursor" src = "model hover.jpg" onclick = "currentSlide(2)"> 
						</div>
					</div>
				</div>
			</div>
			
			<div class = "item-details-container">
				<div class = "item-description">
					<h1> OSAMA  </h1>
					<h1> Top  </h1><br><br>
					<p> RM 128.00 </p><br><br>
					<p> Made out of linen cotton </p><br><br><br><br>
					<div class = "item-button-container">
						<a href="shop.html" class = "item-button"> Add to cart! </a>  
					</div>
				</div>
			</div>
		</div>
		
		<div class = "item-size-container">
			<table>
			  <tr>
				<th>Measurement/Size</th>
				<th>Freesize</th>
			  </tr>
			  <tr>
				<th>Shoulder</td>
				<td>48cm</td>
			  </tr>
			  <tr>
				<th>Bust</td>
				<td>48cm </td>
			  </tr>
			  <tr>
				<th>Length of Sleeve</td>
				<td>48cm </td>
			  </tr>
			  <tr>
				<th>Length of Dress</td>
				<td>48cm </td>
			  </tr>
			</table>

		
		</div>
		
		<script>
			var slideIndex = 1;
			showSlides(slideIndex);

			// Next/previous controls
			function plusSlides(n) 
			{
			  showSlides(slideIndex += n);
			}

			// Thumbnail image controls
			function currentSlide(n) 
			{
			  showSlides(slideIndex = n);
			}

			function showSlides(n) 
			{
				var i;
				var slides = document.getElementsByClassName("item-image");
				var dots = document.getElementsByClassName("demo");
				if (n > slides.length) 
				{
					slideIndex = 1
				}
				if (n < 1) 
				{
					slideIndex = slides.length
				}
				for (i = 0; i < slides.length; i++) 
				{
					slides[i].style.display = "none";
				}
				for (i = 0; i < dots.length; i++) 
				{
					dots[i].className = dots[i].className.replace(" active", "");
				}
				slides[slideIndex-1].style.display = "block";
				dots[slideIndex-1].className += " active";
			}
		</script>
	</body>


</html>