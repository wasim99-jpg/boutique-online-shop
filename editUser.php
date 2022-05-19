
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
					<li><a href = "profile.php"> <img src = "profile.jpg"> </a> </li>
					<li><a href="cart.php"><img src="cart.jpg" alt="cart" ></a></li>
				</ul>
		</nav>
	<div class = "edit-big-container">
		<h2>-Edit Profile-</h2>
		<div class = "edit-form">
		<form action="insertEdit.php">
			<div class = "edit-margin">
				<input type='hidden' name='id' value='<?php echo "$id";?>'/> 
			   <label for="fname"><i class="fname"></i> Full Name</label>
				<input type="text" id="fname" name="fname" placeholder="John M. Doe" class = "input-form"><br>
			</div>
			<div class = "edit-margin">
				 <label for="email"><i class="email"></i> Email</label>
				<input type="text" id="email" name="email" placeholder="John@gmail.com" class = "input-form-2"><br>
			</div>
			<div class = "edit-margin">
				<label for="phone"><i class="phone"></i> Phone No </label>
				<input type="text" id="phone" name="phone" placeholder="0123456789" class = "input-form-3"><br><br>
			</div>
			
			<div class = "edit-button-container">
				<input type="submit" id="submit" value="Save Changes" class = "edit-button"> 
				<button onclick="location.href='profile.php'" type="button" class = "edit-button">Cancel</button>
			</div>
		</form>
		</div>
	</div>
</body>



</html>