<?php
session_start();
include('config.php');
if(!isset($_SESSION["loggedin"]) ){
    header("location: login.php");
    exit;
}


?>

<html>
<head>
<style>
body
{
	font-family: 'Raleway', sans-serif;
	font-size:20px;
	
}
h2{
	font-family: 'Raleway', sans-serif;
		font-size: 30px ;
		font-weight: 500 ;
}

 div 
{
	  margin: auto;
  width: 70%;
  border: 1px solid gray;
  padding: 10px;
  line-height: 1.6;
}
button{
	position:absolute;
	text-align:right;
	padding: 5px 5px 5px 5px;
	
}
.logout {
	
	text-align:left;
	padding: 5px 5px 5px 5px;
	
	
} 

</style>
<link rel = "stylesheet" href = "style.css">
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Text&family=Josefin+Sans:wght@500&family=Medula+One&family=Mina&family=Raleway:wght@100;200;300&display=swap" rel="stylesheet">

</head>
<body>
<nav>
			<p><a href ="Index.php" class ="shinshi"> SHINSHI </a></p> 
				<ul class = "menu">
					<li><a href = "Index.php"> Home </a> </li>
					<li><a href = "shop.html"> Shop </a></li>
					<li><a href = "about.html"> About Us </a></li>
					<li><a href = "#"> Contact Us </a></li>
				</ul>
				
				<ul class = "accountMenu">
					<li><a href="profile.php"><img src = "profile.jpg"> </li>
					<li><a href="cart.php"><img src="cart.jpg" alt="cart" ></a></li>
				</ul>
		</nav>
 

<br>
<div class="profile">


<h2>Personal Details</h2><br>
<hr>
<br>

<?php
$query = "SELECT * FROM users1 where username='".$_SESSION["username"]."'";
		$result = $link->query($query);
		while(($row = $result->fetch_assoc()) !== null){
    ?>
	&emsp;Username :&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['username']; ?> <button class="edit" onclick="location.href='editUser.php'" type="button">
         edit</button><br>
	
	<?php if(isset($row['fname'])===false){?>
   
      &emsp;Name :<br>
	  &emsp;Email :<br>
	  &emsp;Phone no. :<br>
	<?php }else{?>
	
	&emsp;Name &ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['fname']; ?><br>
	&emsp;Email &emsp;&ensp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['email']; ?><br>
	&emsp;Phone no. :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['phone']; ?><br>
		
	
		
    
    <?php
	}
}

?>


		 <br><br>
<hr>
<br>
<h2>Biling/Shipping Address</h2>
<hr>
<br>
<?php

$query1 = "SELECT * FROM address where userID='".$_SESSION["id"]."'";
		$result1 = $link->query($query1);
	
	 $rowcount=mysqli_num_rows($result1);
		if($rowcount==0){
		?>
		 &emsp;street : <button onclick="location.href='editAddress.php'" type="button">
         edit</button><br>
	 &emsp; postcode :<br>
	  &emsp;city :<br>
	  &emsp;state :<br>
		<?php
	}
		
		while(($row = $result1->fetch_assoc()) !== null){
			
			
    ?>
	

	  
	<?php if($row==null){?>
		
      &emsp;street :<br>
	 &emsp; postcode :<br>
	  &emsp;city :<br>
	  &emsp;state :<br>
	  
	<?php }else{?>
	
	&emsp;street:<?php echo $row['street']; ?> <button onclick="location.href='editAddress.php'" type="button">
         edit</button><br>
	&emsp;postcode:<?php echo $row['postcode']; ?><br>
	&emsp;city :<?php echo $row['city']; ?><br>
	&emsp;state :<?php echo $row['state']; ?><br> 
		
	
		
      <?php
	  
	}
}

			?>
		


 <br>
</div>
<button class="logout" onclick="location.href='logout.php'" type="button">
         logout</button>
		 


</body>
</html>