
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
<link rel = "stylesheet" href = "style.css">
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
					<li><a href="profile.php"><img src = "profile.jpg"> </li>
					<li><a href="cart.php"><img src="cart.jpg" alt="cart" ></a></li>
				</ul>
		</nav>
<h2>Edit Profile</h2>
<form action="insertAddress.php">
			<input type='hidden' name='id' value='<?php echo "$id";?>'/> 
           <label for="street"><i class="street"></i> Street Address:</label>
            <input type="text" id="street" name="street" placeholder="no. 1,jalan 1 , taman saga"><br><br>
			
			 <label for="postcode"><i class="postcode"></i> Postcode:</label>
            <input type="text" id="postcode" name="postcode" placeholder="10000"><br><br>
			
			<label for="city"><i class="city"></i> City:</label>
            <input type="text" id="city" name="city" placeholder="Ampang"><br><br>
			
			<label for="state"><i class="state"></i> State:</label>
            <input type="text" id="state" name="state" placeholder="selangor"><br><br>
			
			<input type="submit" id="submit" value="save changes"> <button onclick="location.href='profile.php'" type="button">cancel</button>
			
			
</form>
</body>



</html>