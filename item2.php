<?php

session_start();
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
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
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<html>
		<head>
		<link rel = "stylesheet" href = "style.css">
		<?php
		if(!empty($_SESSION["shopping_cart"])) {}
		$cart_count = count(array_keys($_SESSION["shopping_cart"]));
		?>
		<div class="cart_div">
		<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
		</div>

		</head>
	
		<body>
		<nav>
			<p><a href ="Index.html" class ="shinshi"> SHINSHI </a></p> 
				<ul class = "menu">
					<li><a href = "Index.html"> Home </a> </li>
					<li><a href = "shop.html"> Shop </a></li>
					<li><a href = "about.html"> About Us </a></li>
					<li><a href = "#"> Contact Us </a></li>
				</ul>
				
				<ul class = "accountMenu">
					<li><img src = "profile.jpg"> </li>
					<li><img src = "cart.jpg"> </li>
				</ul>
		</nav>
		
		<div class = "item-big-container">
			<div class = "item-image-container">
				<div class = "item-image">
					<img src = "model temp.jpg"> 
					<div class = "item-slider">
					
					</div>
				</div>
				
		
			</div>
			
			<div class = "item-details-container">
				<div class = "item-description">
					<h1> OSAMA  </h1>
					<h1> Top  </h1><br><br>
					<p> RM 128.00 </p><br><br>
					<p> Made out of linen cotton </p><br><br><br><br>
					
						<div class = "quantity">
							<p> Quantity : </p>
							<input type = "number"> 
						</div>
						<button = "submit"> Add to cart </button>
			 <form method='post' action=''>
			  <input type='hidden' name='code' value="Bag01" />
			 
			  <button type='submit' class='buy' >Buy Now</button>
			  </form>
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
		

		
		</body>

</html>