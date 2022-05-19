
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
					<li><img src = "profile.jpg"> </li>
					<li><a href="cart.php"><img src="cart.jpg" alt="cart" ></a></li>
				</ul>
		</nav>
<h2>Edit Profile</h2>
<form action="insertEdit.php">
			<input type='hidden' name='id' value='<?php echo "$id";?>'/> 
           <label for="fname"><i class="fname"></i> Full Name:</label>
            <input type="text" id="fname" name="fname" placeholder="John M. Doe"><br><br>
			
			 <label for="email"><i class="email"></i> Email:</label>
            <input type="text" id="email" name="email" placeholder="John@gmail.com"><br><br>
			
			<label for="phone"><i class="phone"></i> Phone  number :</label>
            <input type="text" id="phone" name="phone" placeholder="0123456789"><br><br>
			
			
			<input type="submit" id="submit" value="save changes"> <button onclick="location.href='profile.php'" type="button">cancel</button>
			
			
</form>
</body>



</html>