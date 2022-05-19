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
<script>
		function myFunction(){
			var val = "<?php echo $status ?>";
			alert(val);
		}
 

</script>
<html>
	<head>
		<title> TOMPAH Sandal | Shinshi </title>
		<link rel = "stylesheet" href = "style.css">
		<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Text&family=Josefin+Sans:wght@500&family=Medula+One&family=Mina&family=Raleway:wght@100;200;300&display=swap" rel="stylesheet">

	</head>
	
	<body>
		<nav>
			<p><a href ="Index.html" class ="shinshi"> SHINSHI </a></p> 
				<ul class = "menu">
					<li><a href = "Index.html"> Home </a> </li>
					<li><a href = "shop.html"> Shop </a></li>
					<li><a href = "about.html"> About Us </a></li>
				</ul>
				
				<ul class = "accountMenu">
					<li><a href = "profile.php"> <img src = "profile.jpg"> </a> </li>
					<li><a href = "cart.php"> <img src = "cart.jpg"></a> </li>
				</ul>
		</nav>
		
		<div class = "fade-container">
			<div class = "item-big-container">
				<div class = "item-image-container">
					<div class = "item-imageslider-container">
						<div class = "item-image">
							<img src = "item-sandal4.jpg"> 
						</div>
						<div class = "item-image">
							<img src = "item-sandal2.jpg"> 
						</div>
						<div class = "item-image">
							<img src = "item-sandal3.jpg"> 
						</div>
						<div class = "item-image">
							<img src = "item-sandal1.jpg"> 
						</div>
						<div class = "item-image">
							<img src = "item-sandal5.jpg"> 
						</div>
						
						<a class = "prev" onclick="plusSlides(-1)">&#10094;</a>
						<a class = "next" onclick="plusSlides(1)">&#10095;</a>
						
						<div class = "item-slider">
							<div class = "item-slider-image">
								<img class="demo cursor" src = "item-sandal4.jpg" onclick = "currentSlide(1)"> 
							</div>
							<div class = "item-slider-image">
								<img class="demo cursor" src = "item-sandal2.jpg" onclick = "currentSlide(2)"> 
							</div>
							<div class = "item-slider-image">
								<img class="demo cursor" src = "item-sandal3.jpg" onclick = "currentSlide(3)"> 
							</div>
							<div class = "item-slider-image">
								<img class="demo cursor" src = "item-sandal1.jpg" onclick = "currentSlide(4)"> 
							</div>
							<div class = "item-slider-image">
								<img class="demo cursor" src = "item-sandal5.jpg" onclick = "currentSlide(5)"> 
							</div>
						</div>
					</div>
				</div>
				
				<div class = "item-details-container">
					<div class = "item-description">
						<h1> TOMPAH Sandal  </h1><br><br>
						<p> RM 69.00 </p><br><br>
						<p> Simple sandals made from woven tape with fabric, jersey lining, ultralight durable phylon outsole and phylon midsole for stability and comfort. Has adjustable straps that makes it easy to fit your foot and easy to slip on. Perfect for travelling and your everyday use. </p>
						<br><br>
						<div class = "item-button-container">
							<form method='post' action=''  onsubmit="myFunction()">
			  <input type='hidden' name='code' value="sandals01" />
			 
			  <button id="submit" type='submit' class='item-button' >Add to cart </button>
			  </form>
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
					<th>Length</td>
					<td>24cm</td>
				  </tr>
				  <tr>
					<th>UK</td>
					<td>8.5 - 10</td>
				  </tr>
				  <tr>
				  <tr>
					<th>US</td>
					<td>10-11</td>
				  </tr>
				  <tr>
				  <tr>
					<th>EU</td>
					<td>43/44</td>
				  </tr>
				  <tr>
				</table>

			
			</div>
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
		
		<br><br><br>
	</body>


</html>