
<?php
include('config.php');
session_start();

$id1="SELECT id FROM users1 where username='".$_SESSION["username"]."'";
	$id2 = $link->query($id1);
	
		while ($row = $id2->fetch_assoc()) {
    $id= $row['id'];}
?>
<html>
<head>
	<link rel = "stylesheet" href = "style.css ?v=<?php echo time(); ?>">
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
					<li><a href="profile.php"><img src = "profile.jpg"> </li>
					<li><a href="cart.php"><img src="cart.jpg" alt="cart" ></a></li>
				</ul>
		</nav>
		<div class = "edit-big-container">
			<h2>-Edit Address-</h2>
			<div class = "edit-form-2">
				<form action="insertAddress.php">
				<input type='hidden' name='id' value='<?php echo "$id";?>'/> 
				<div class = "edit-margin">
					<label for="street"><i class="street"></i> Street Address</label>
					<input type="text" id="street" name="street" placeholder="no. 1,jalan 1 , taman saga" class = "input-form-4"><br>
				</div>
				<div class = "edit-margin">
					<label for="postcode"><i class="postcode"></i> Postcode</label>
					<input type="text" id="postcode" name="postcode" placeholder="10000" class = "input-form-5"><br>
				</div>
				<div class = "edit-margin">
					<label for="city"><i class="city"></i> City</label>
					<input type="text" id="city" name="city" placeholder="Ampang" class = "input-form-6"><br>
				</div>
				<div class = "edit-margin">
					<label for="state"><i class="state"></i> State</label>
					<input type="text" id="state" name="state" placeholder="selangor" class = "input-form-7"><br>
				</div>
				
				<div class = "edit-button-container-2">
					<input type="submit" id="submit" value="save changes" class = "edit-button"> 
					<button onclick="location.href='profile.php'" type="button" class = "edit-button">cancel</button>
				</div>
			</div>
		</div>
			
</form>
</body>



</html>