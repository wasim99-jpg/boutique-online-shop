<?php
session_start();

$link = mysqli_connect("localhost","root","","shinshi");

//check connection

if($link ==false){
	die("ERROR! couldnt connect.". mysqli_connect_error());
}

$sql = "SELECT * FROM address WHERE userID = '".$_SESSION['id']."'";
$result = $link->query($sql);
$query1 = "SELECT * FROM address where userID='".$_SESSION["id"]."'";
		$result1 = $link->query($query1);
	
	 $rowcount=mysqli_num_rows($result1);
		if($rowcount==0){
			$street='';
	$postcode='';
	$city='';
	$state='';
	
		}else{
while(($row = $result->fetch_assoc()) !== null){
	$street=$row['street'];
	$postcode=$row['postcode'];
	$city=$row['city'];
	$state=$row['state'];
	
	
		}}


?>
<html>
<head>
	<link rel = "stylesheet" href = "style.css ?v=<?php echo time(); ?>">
	<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Text&family=Josefin+Sans:wght@500&family=Medula+One&family=Mina&family=Raleway:wght@100;200;300&display=swap" rel="stylesheet">

<script>
function payment(){
	
	
	alert("Payment Successful");
	
	window.location.replace("cuba.php");
}
</script>
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
					<li><a href="cart.php"><img src="cart.jpg" alt="cart" ></a></li>
				</ul>
		</nav>
		<br>
		
	<div class = "payment-big-container">
		<h1>-Check out-</h1><br><br>
			<form>
				<h2>Address</h2><br>
				<div class = "payment-address-details">
					<label for="street"> Street Address</label>
					<input type="text" id="street" name="street" value="<?php echo $street;?>" class = "payment-input"><br><br>
				
					<label for="postcode"> Postcode</label>
					<input type="text" id="postcode" name="postcode" value="<?php echo $postcode;?>" class = "payment-input2"><br><br>

					<label for="city"> City</label>
					<input type="text" id="city" name="city" value="<?php echo $city;?>" class = "payment-input3"><br><br>

					<label for="state"> State</label>
					<input type="text" id="state" name="state" value="<?php echo $state;?>" class = "payment-input4"><br><br>
				</div>
				<br><br>
				<h2>Credit card</h2><br>
				<div class = "payment-address-details">
					
					<label for="cc"> Credit card number</label>
					<input type="text" id="cc" name="cc"  value="" placeholder="xxxx xxxx xxxx xxxx"class = "payment-input5"><br><br>

					<label for="expMonth"> Exp Month</label>
					<input type="text" id="expMonth" name="expMonth" value="" placeholder="01" class = "payment-input6"><br><br>
					
					<label for="expYear"> Exp Year</label>&nbsp;&nbsp;
					<input type="text" id="expYear" name="expYear" value="" placeholder="00"class = "payment-input8"><br><br
					
					><label for="cvv"> CVV</label>
					<input type="text" id="cvv" name="cvv" value="" placeholder="000"class = "payment-input7"><br><br>

					<br>
				</div>
				<div class = "checkout-button-container">
					<input type="button" id="submit" name="submit" value="Place order" onclick="payment()" class = "edit-button">
				</div>

			</form>
	</div>
</body>
</html>