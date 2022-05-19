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
<link rel = "stylesheet" href = "style.css">
<script>
function payment(){
	
	
	alert("Payment Successfull");
	
	window.location.replace("Index.php");
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
					<li><a href = "#"> Contact Us </a></li>
				</ul>
				
				<ul class = "accountMenu">
					<li><img src = "profile.jpg"> </li>
					<li><a href="cart.php"><img src="cart.jpg" alt="cart" ></a></li>
				</ul>
		</nav>
		<br>
<h1>Check out</h1><br><br>
<form>
<h2>Address</h2>
<label for="street"> Street Address</label><br>
<input type="text" id="street" name="street" value="<?php echo $street;?>"><br><br>

<label for="postcode"> Postcode</label><br>
<input type="text" id="postcode" name="postcode" value="<?php echo $postcode;?>"><br><br>

<label for="city"> City</label><br>
<input type="text" id="city" name="city" value="<?php echo $city;?>"><br><br>

<label for="state"> State</label><br>
<input type="text" id="state" name="state" value="<?php echo $state;?>"><br><br>

<h2>Credit card</h2>
<label for="cc"> Credit card number</label><br>
<input type="text" id="cc" name="cc"  value=""><br><br>

<label for="expMonth"> Exp Month</label><br>
<input type="text" id="expMonth" name="expMonth" value=""><br><br>

<label for="cvv"> CVV</label><br>
<input type="text" id="cvv" name="cvv" value=""><br><br>

<label for="expYear"> Exp Year</label><br>
<input type="text" id="expYear" name="expYear" value=""><br><br><br>

<input type="button" id="submit" name="submit" value="Place order" onclick="payment()">


</form>

</body>
</html>