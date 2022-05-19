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
body{
	font-family: 'Raleway', sans-serif;
	font-size: 21px ;
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
button
{
	width: 100px ;
	font-size: 20px ;
	padding: 5px ;
	border: 2px solid gray ;
	text-align: center ;
	text-decoration: none ;
	color: #323232 ;
	transition: all 0.2s;
	background: none ;
}

button:hover 
{
	background: #84563c ;
	color: white ;
	border: 2px solid #84563c ;
}
.logout {
	position:absolute;
	text-align:center;
	padding: 5px 5px 5px 5px;
	
	
} 
.profile{
	position:relative;
	
	
}

</style>
<link rel = "stylesheet" href = "style.css ?v=<?php echo time(); ?>">
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Text&family=Josefin+Sans:wght@500&family=Medula+One&family=Mina&family=Raleway:wght@100;200;300&display=swap" rel="stylesheet">

</head>
<body>
<nav>
			<p><a href ="Index.php" class ="shinshi"> SHINSHI </a></p> 
				<ul class = "menu">
					<li><a href = "Index.html"> Home </a> </li>
					<li><a href = "shop.html"> Shop </a></li>
					<li><a href = "about.html"> About Us </a></li>
					
				</ul>
				
				<ul class = "accountMenu">
					<li><a href="profile.php"><img src = "profile.jpg"> </a></li>
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
	&emsp;Username :&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['username']; ?> <button class="edit" onclick="location.href='editUser.php'"style="position: absolute; right: 30px;  type="button">
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
			&emsp;Street &emsp;&nbsp;&nbsp;&ensp;:&emsp; <button style="position: absolute; right: 30px;" onclick="location.href='editAddress.php'" type="button">
         edit</button><br>
	&emsp;Postcode&nbsp; &nbsp;:&emsp;<br>
	&emsp;City &emsp;&emsp;&ensp;&nbsp;&nbsp;:&emsp;<br>
	&emsp;State &nbsp;&nbsp;&nbsp;&nbsp;&ensp;&nbsp;&nbsp;&nbsp;:&emsp;<br> 
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
	
	&emsp;Street &emsp;&nbsp;&nbsp;&ensp;:&emsp;<?php echo $row['street']; ?> <button style="position: absolute; right: 30px;" onclick="location.href='editAddress.php'" type="button">
         edit</button><br>
	&emsp;Postcode&nbsp; &nbsp;:&emsp;<?php echo $row['postcode']; ?><br>
	&emsp;City &emsp;&emsp;&ensp;&nbsp;&nbsp;:&emsp;<?php echo $row['city']; ?><br>
	&emsp;State &nbsp;&nbsp;&nbsp;&nbsp;&ensp;&nbsp;&nbsp;&nbsp;:&emsp;<?php echo $row['state']; ?><br> 
		
	
		
      <?php
	  
	}
}

			?>
		


 <br>
</div>
<br>
<button style="position: absolute; right: 280px;" class="logout" onclick="location.href='logout.php'" type="button">
         logout</button>
		 


</body>
</html>